<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct(){
        parent::__construct();
     	   $this->load->library('email');
    }
	
	function confirm_password(){
	
		$email= base64_decode($this->input->get('u'));
		$pass= base64_decode($this->input->get('f_pass'));
		
			$sql= "select * from member where member_email='$email' ";
				$rs= $this->db->query($sql);
				
				foreach($rs->result() as $fett){
					$email_db = $fett->member_email;
				}
			
		if($email==$email_db){
			
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
	
			//$to .= 'regulators13@gmail.com'.',';
			$to .= "$email" .','; // note the comma
			
			
			//define the subject of the email
			$subject = "Forgot Password Mobid"; 
			//define the message to be sent. Each line should be separated with \n
				
			$messages = "Username : $user \n\n Password : $new_pass "; 
			
			mail($to, $subject, $messages );
			
			$update = mysql_query("update member set member_pass='". md5($new_pass)."' where member_id=$id ");
			$update_pass = mysql_query("update member set member_pass_forgot=NULL where member_id=$id ");
			// alert
			$arr = array(
			 'code' => 0,
			 'description' => "เปลี่ยนรหัสผ่านเรียบร้อย" 
			);
			
		}else{
			
			$arr = array(
			 'code' => 1,
			 'description' => 'อีเมล์ของท่านไม่ถูกต้อง'
			);
		}
		
		/*
header('Content-Type: application/json');
		echo json_encode($arr);
*/		
	
		$this->load->view('con_pass');
	}// end confirm
	 function update(){
		
		$id=$this->input->get('id');
		$email=$this->input->get('mail');
		$pass=$this->input->get('pass');
		$tel=$this->input->get('tel');
		
		$query= $this->db->get_where('member', array('member_email' => $email));
	
		foreach($query->result() as $row){
			$email_db = $row->member_email;
			$tel_db = $row->member_tel;
		}
	
		$num= $query->num_rows();

if($id==""){
	$arr = array(
	 'code' => 0,
	 'description' => 'ไม่พบข้อมูล',
	);
}else{

if($num >= 1 AND $email==$email_db){
	$arr = array(
	 'code' => 1,
	 'description' => 'อีเมล์นี้มีผู้ใช้งานแล้ว',
	);
		
}else{
			
	if($email!=""){
			
				$update = array(
					'member_email' => $email,
					'member_status' => 'no',
					
				);
				
				$this->db->where('member_id', $id);
				$this->db->update('member', $update);
					
				// mail sender
				$pass_forgot= base64_encode(md5(date("YmdHis")));
				$email_forgot= base64_encode($email);
					
				$to .= "$email" .','; // note the comma
				$subject = "Change Email Mobid"; 
				$messages = "กรุณายืนยันการเปลี่ยนอีเมล์ \n\n http://www.project.rgb7.com/mobid/activate.php?u=$email_forgot&c_email=$pass_forgot ";
				
				mail($to, $subject, $messages );
	
				
				$data = array(
				 'id' => $id,
				 'email' => $email,
				 );
				
				$arr = array(
				 'code' => 0,
				 'description' => "ท่านได้ทำการเปลียนอีเมล์ &nbsp; กรุณายืนยันข้อมูลและเข้าใช้งานอีกครั้ง",
				);
			
		}// end change email
	
		if($pass!=""){
			//update data 
			$change_pass = array(
				'member_pass' => md5($pass),
			);
			
			$this->db->where('member_id', $id);
			$this->db->update('member', $change_pass);
				
			
			$arr = array(
			 'code' => 0,
			 'description' => "ท่านทำการเปลียนรหัสผ่านใหม่เรียบร้อย"
			);
			
		} // end change pass 
				
		if($tel!=""){
			//update data 
			$change_tel = array(
				'member_tel' => $tel,
			);
			
			$this->db->where('member_id', $id);
			$this->db->update('member', $change_tel);
				
			$arr = array(
			 'code' => 0,
			 'description' => "ท่านได้ทำการเปลี่ยนเบอร์โทรศัพท์เรียบร้อย"
			);
			$data = array(
				 'id' => $id,
				 'tel' => $tel,
				 );
			
		} // end change telephone 
	}// end check mail
} // end check id

$arr['data'] = $data;
		
		header('Content-Type: application/json');
		echo json_encode($arr);
		
	} // end function	

} // end class
?>