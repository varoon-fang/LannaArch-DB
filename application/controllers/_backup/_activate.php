<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Activate extends CI_Controller {

	public function index()
	{
		$active = $this->input->get('id_active');
		$account = $this->input->get('account');
		
      	$this->db->select('*');
		$this->db->from('member');
		$this->db->where('member_name = ' . "'" . base64_decode($account) . "'"); 
		$this->db->where('member_pass = ' . "'" . $active . "'"); 
						
			$query = $this->db->get();
				foreach($query->result() as $row)
				{
					$id= $row->member_id;	
				}

       		if($query->num_rows() == 1){
	   		
		   		$data = array(
	    		 'member_status'	=> 'yes',
				);
				
		   		$this->db->where('member_id', $id);
				if($this->db->update("member", $data))
				{
				  echo "<script>alert('Activate data Complete.');</script>";
					echo "<script>window.location.href = '" . base_url() . "register';</script>";

				}else{
					echo "<script>alert('Activate data fail.');</script>";
					echo "<script>window.location.href = '" . base_url() . "register';</script>";
				}// end if insert
		}else{
				echo "<script>alert('Account fail.');</script>";
				//echo "pass:". $active;
				//echo "user:". ($account);
				echo "<script>window.location.href = '" . base_url() . "register';</script>";
		}// end select member
	}

	

}
?>