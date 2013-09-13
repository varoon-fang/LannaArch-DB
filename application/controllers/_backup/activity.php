<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {
	 function __construct(){
        parent::__construct();
         
    }
    
	 function index(){
		$this->load->view('activity');
		
	}
	
	 function detail(){
		$this->load->view('activity_detail');
	}	

}
?>