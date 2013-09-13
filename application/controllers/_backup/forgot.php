<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller{

	function index() 
	{
		function randomtext($len) {
	           srand( date("s") );
	           $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	           $chars.= "1234567890"; //  random
	           $ret_str = "";
	           $num = strlen($chars);
	           for($i=0; $i < $len; $i++) {
	           $ret_str.= $chars[rand()%$num];
	           }
	           return $ret_str;
	           }
	$new_pass=randomtext(8);
						
	$email=$this->input->get('email');
	
		$this->db->where('member_email', $email);
		$this->db->where('member_facebook', 'no');
		
		$query = $this->db->get('member');
		
		foreach($query->result() as $fett){
			$id = $fett->member_id;
			$email_db = $fett->member_email;
			$tel = $fett->member_tel;
			$user = $fett->member_user;
		}	
		
		if($email==$email_db){
			
			$update = array(
				'member_pass_forgot' => md5($new_pass),
			);
			
			$this->db->where('member_id', $id);
			$this->db->update('member', $update);
			
			// Mail sender 
			$pass_forgot= base64_encode(md5($new_pass));
			$email_forgot= base64_encode($email_db);
			
			$to .= "$email_db" .','; // note the comma
			$subject = "Forgot Password Mobid"; 
			$messages = " กรุณายืนยันการรับรหัสผ่านใหม่ \n http://www.project.rgb7.com/mobid/confirm_forgot.php?u=$email_forgot&f_pass=$pass_forgot "; 
			
			mail($to, $subject, $messages );
			
			$arr = array(
			 'code' => 0,
			 'description' => "กรุณาตรวจสอบข้อมูลผ่านทางอีเมล์ของท่าน" 
			);
			
		}else{
			
			$arr = array(
			 'code' => 1,
			 'description' => "ไม่มีอีเมล์ในระบบ",
			);
		}
		
		header('Content-Type: application/json');
		echo json_encode($arr);
		
	}// end function

}// end class