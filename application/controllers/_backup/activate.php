<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Activate extends CI_Controller {

	function index(){
		
		
		$email = base64_decode($_GET['u']);
		$pass  = base64_decode($_GET['f_pass']);
		
		$sql="select * from member where member_email='$email'";
		$rs=$this->db->query($sql);
		
		$data['rs']=$rs->row_array();	
		
			foreach($rs->result() as $row){
				$id_db = $row->member_id;
				$email_db = $row->member_email;
				$user_db = $row->member_username;
			}
			
			if($email==$email_db){
				
				$update = array(
					'member_status' => 'yes',
				);
				
				$this->db->where('member_id', $id_db);
				
				if($this->db->update('member', $update)){
				
					// alert
					$arr = array(
					 'code' => 0,
					 'description' => "ทำการยืนยันการเข้าใช้งานเรียบร้อย" 
					);
				}else{
					// alert
					$arr = array(
					 'code' => 1,
					 'description' => "การยืนยันล้มเหลว" 
					);
				}
			}else{
				
				$arr = array(
				 'code' => 1,
				 'description' => 'ไม่สามารถยืนยันการเข้าใช้งานได้'
				);
			}
			
			$this->load->view('activate', $data);
			/*
header('Content-Type: application/json');
			echo json_encode($arr);
*/
	}// end function
}// end class