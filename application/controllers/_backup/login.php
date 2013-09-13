<?php

class Login extends CI_Controller {

	function index()
	{
		$this->load->view('login');
		
		if($this->input->post('submit')!=NULL){
		
		
		
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('member_user = ' . "'" . $this->input->post('username') . "'"); 
		$this->db->where('member_pass = ' . "'" . MD5($this->input->post('password')) . "'"); 
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			//return $query->result();
			
			$arr = array(
			 'code' => 1,
			 'description' => 'Success.'
			);
			echo "<script>alert('Login Success.');</script>";
		    echo "<script>window.location.href = '" . base_url() . "login';</script>";
		}
		else
		{
			$arr = array(
			 'code' => 0,
			 'description' => 'Username / Email Error.'
			);
			//return false;
			echo "<script>alert('Username / Email Error.');</script>";
		    echo "<script>window.location.href = '" . base_url() . "login';</script>";
		}
		echo json_encode($arr);
		
	  }// end submit 
	}// end function
}// end class
?>