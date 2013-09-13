<?php

class Member_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        if($this->session->userdata['logged_in']['member']=="no"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }
    
    function insert()
    {
        
       // if($this->input->post('registor')!=NULL){
       	$confirm= md5(date('Ymd-His'));
       	
	    	$data = array(
	    		'member_name'		=> $this->input->post('name'),
				'member_surname'	=> $this->input->post('surname'),
				'member_user'		=> $this->input->post('user'),
				'member_pass'		=> $this->input->post('pass'),
				'member_email'		=> $this->input->post('email'),
				'member_tel'		=> $this->input->post('tel'),
				'member_address'	=> $this->input->post('address'),
				'member_date'		=> date('Y-m-d H:i:s'),
				'member_status'		=> 'no',
				'member_img'		=> 'NULL',
				'member_confirm'	=> $confirm,
				
		   );
				//$this->db->insert("member", $data);
				if($this->db->insert("member", $data))
				{
				  redirect('register','refresh');
				  exit();	
				}else{
					echo "<script>alert('Insert data fail.');</script>";
				}
			//}
    }

    function update()
    {
        if($this->input->post('update')!=NULL){
        	$id= $this->uri->segment(4);
	    	$data = array(
				   'member_block' => $this->input->post('block'),
				);
    		
	    	
			$this->db->where('member_id', $id);
			
			if($this->db->update("member", $data))
			{
			  redirect("backoffice/member/",'refresh');
			  exit();	
			}else{
				echo "<script>alert('Edit data fail.');</script>";
			}
		} // end if check post 
    } // end function
    
    function update_bid()
    {
        // amount bid
			if($this->input->post('send')!=NULL){
        	$id= $this->input->post('user');
        	$bid_del= $this->input->post('b_amount');
        	$action = $this->input->post('bid');
        	
        	$query =	$this->db->get_where('bid', array('bid_member' => $id));
        		foreach ($query->result() as $row)
				{
				    $amount= $row->bid_amount;
				}
				if($action=="plus"){
					$bid_total = $amount+$bid_del;
				}else{
					$bid_total = $amount-$bid_del;
					
				}
				
	    	if($bid_total<0){
				echo "<script>alert('Can not remove Bid.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/member/edit/$id';</script>";
			}else{
				$data_bid = array(
				   'bid_amount' => $bid_total,
				);
				$this->db->where('bid_member', $id);
			}
			
			if($this->db->update('bid', $data_bid))
			{
			  redirect("backoffice/member/edit/$id",'refresh');
			  exit();	
			}else{
				echo "<script>alert('Edit data fail.');</script>";
			}
		}// end if check post 
    } // end function

}

?>