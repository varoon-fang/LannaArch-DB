<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Management_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
       
    }
    	
	function insert(){
		 if($this->input->post('send')!=NULL){
        
    		
    			
                 //add data		
			    	$data = array(
			    	   'admin_user' => $this->input->post('username'),
					   'admin_pass' => md5($this->input->post('password')),
					   'admin_email' => $this->input->post('email'),
					   'admin_status' =>  'yes',
					   'admin_type' => "user"
					   
					);
				$query = $this->db->insert("admin", $data);
		
          if($query){
          	//define the subject of the email
          	$to = $this->input->post('email');
   			$subject = "Register Management User"; 
			//define the message to be sent. Each line should be separated with \n
			$messages = "Username : ".$this->input->post('username') ." \nPassword: ". $this->input->post('password') ."\n Email: ". $this->input->post('email') ."\n
					 "; 
			
			$headers = 'Content-type: text/plain; charset=UTF-8' . "\r\n";
	
			mail($to, $subject, $messages, $headers);
			
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Insert data successful.</strong>
		    </div>');
        	
          }else{
          	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Insert data Unsuccessful!</strong>
		    </div>');
            
		  }
		  return ($query);
	  }
	}// end function
	
	function edit_data($id){
		//$id =$this->uri->segment(4);
		if($this->input->post('send')!=NULL){
	    	
                 //Edit data
                 if($this->input->post('password')==""){
	               $data = array(
			    	   'admin_user' => $this->input->post('username'),
					   'admin_email' => $this->input->post('email'),
					   'admin_status' => $this->input->post('status')
					);  
                 }else{
                 	
                 	//define the subject of the email
          	$to = $this->input->post('email');
   			$subject = "Change Password Management User"; 
			//define the message to be sent. Each line should be separated with \n
			$messages = "Username : ".$this->input->post('username') ." \nPassword: ". $this->input->post('password') ."\n Email: ". $this->input->post('email') ."\n
					 "; 
			
			$headers = 'Content-type: text/plain; charset=UTF-8' . "\r\n";
	
			mail($to, $subject, $messages, $headers);
				 //Edit data
	                 $data = array(
			    	   'admin_user' => $this->input->post('username'),
			    	   'admin_pass' => md5($this->input->post('password')),
					   'admin_email' => $this->input->post('email'),
					   'admin_status' => $this->input->post('status')
					);
                 }
                 		
			    	
			$this->db->where('admin_id', $id);
			$query = $this->db->update("admin", $data);
			if($query)
			{
			  $this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Edit data successful.</strong></div>');
        	
	          }else{
	          	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Edit data Unsuccessful!</strong> </div>');
			}
			return($query);
		}
	}// end function
	
	
	function delete_data(){
		$id= $this->uri->segment(4);
		
		$query = $this->db->get_where('admin', array('admin_id' => $id));

			foreach ($query->result() as $row)
			{
			     $status = $row->admin_status;
			          
			} 
		if($status=='admin'){
			echo "<script>alert('Can't Delete data admin.');</script>";
			echo "<script>window.location.href = '" . base_url() . "admin/management/';</script>";
		}else{	
			
		$this->db->where('admin_id', $id);
		if($this->db->delete('admin'))
			{
			  redirect('admin/management/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Delete data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "admin/management/';</script>";
			} 
		}// end if
	} //end function
	
	

} // end class	
	

?>