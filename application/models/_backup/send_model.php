<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Send_model extends CI_Model {
	
 function mail(){	
 
	$company = $this->input->post('company');
	$name	 = $this->input->post('name');
	$email = $this->input->post('email');
	$website = $this->input->post('website');
	$phone = $this->input->post('tel');
	$detail = $this->input->post('message');
	
	$to = "regulators13@gmail.com".',';
   			 	
	//define the subject of the email
	$subject = "Contact Us "; 
	//define the message to be sent. Each line should be separated with \n
	$messages = "Company : ".$user ." \n\n 
				 Name: ". $name ."\n\n 
				 Email: ". $email ."\n\n
				 Website: ". $website ."\n\n
				 Phone: ". $phone ."\n\n
				 Description: ". $detail ."\n\n
				 "; 
	
	$headers = 'Content-type: text/plain; charset=UTF-8' . "\r\n";
	
	
		if(mail($to, $subject, $messages, $headers)){
	     	echo "<script>alert('Send data success.');</script>";
			echo "<script>window.location.href = '" . base_url() . "home';</script>";
		}else{
			redirect('contact', 'refresh');
		}
	}
}