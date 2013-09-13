<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->view('register');
		   
	if($this->input->post("registor")!=NULL){
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[member.member_user]');
			//$this->form_validation->set_rules('password', 'Password', 'required');
			//$this->form_validation->set_rules('c_pass', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[member.member_email]');
			//$this->form_validation->set_rules('c_email', 'Email Confirmation', 'required');
			//$this->form_validation->set_rules('name', 'Name', 'required');
			//$this->form_validation->set_rules('surname', 'Surname', 'required');
			//$this->form_validation->set_rules('tel', 'Telephone', 'required');
			//$this->form_validation->set_rules('address', 'Text', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$arr = array(
			 'code' => 0,
			 'description' => 'Username / Email Error.'
			);
			
			echo "<script>alert('Username / Email Error.');</script>";
		    echo "<script>window.location.href = '" . base_url() . "register';</script>";
			
			
		}else{
			//$this->Member_model->insert();
			$arr = array(
			 'code' => 1,
			 'description' => 'Success.'
			);
			
	    	$data = array(
	    		'member_name'		=> "NULL",
				'member_surname'	=> "NULL",
				'member_user'		=> $this->input->post('username'),
				'member_pass'		=> md5($this->input->post('password')),
				'member_email'		=> $this->input->post('email'),
				'member_tel'		=> $this->input->post('tel'),
				'member_address'	=> "NULL",
				'member_date'		=> date('Y-m-d H:i:s'),
				'member_status'		=> 'no',
				'member_img'		=> 'NULL',
				
		   );
				if($this->db->insert("member", $data))
				{
				  //send mail
				  $this->load->library('email');
				  	
				  	$confirm= base64_encode($this->input->post('name'));
				  	$active= md5($this->input->post('password'));
				  	
					$this->email->from('sendmail@rgb7.com', 'Register Member RGB7');
					$this->email->to($this->input->post('email'));
					
					$this->email->subject($this->input->post('name') .'Register website');
					$this->email->message("กรุณากดลิงค์เพื่อทำการยืนยัน http://project.rgb7.com/app/activate?account=$confirm&id_active=$active");
					
					$this->email->send();

				  echo "<script>alert('Insert data Success.');</script>";
				  echo "<script>window.location.href = '" . base_url() . "register';</script>";
				  //redirect('register','refresh');
				  exit();

				}else{
					echo "<script>alert('Insert data fail.');</script>";
				}
		} // end validate
	  } // end submit
	  	echo json_encode($arr);
	}// end function

	function packages(){
	$this->load->view('packages');
	}

}
?>