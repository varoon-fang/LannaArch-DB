<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Society extends CI_Controller {
	function __construct()
	  {
	    parent::__construct();
	    	$this->data['meta_title'] = "วัฒนธรรมและประเพณี";
	  }

	function jan_1()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/society/jan-1');
		$this->load->view('front/temp/footer');
	}

	function jan_2()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/society/jan-2');
		$this->load->view('front/temp/footer');
	}

}
