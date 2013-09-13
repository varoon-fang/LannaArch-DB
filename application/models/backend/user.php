<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{

	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('admin_user = ' . "'" . $username . "'");
		$this->db->where('admin_pass = ' . "'" . MD5($password) . "'");
		$this->db->limit(1);

		$query = $this->db->get();

		foreach($query->result_array() as $fet){
			$status = $fet['admin_status'];
		}
		if($query->num_rows()==1)
		{
			if($status=="yes"){
				return $query->result();
			}else{
				$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
				    <button class="close" data-dismiss="alert">&times;</button>
				    <strong>Account You Disable <br />Please contact Administer!</strong> </div>');
			return false;
			}
		}
		else
		{
			$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Invalid username or password!</strong> </div>');
			return false;
		}

	}
}
?>