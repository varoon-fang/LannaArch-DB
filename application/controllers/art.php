<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Art extends CI_Controller {
	function __construct()
	  {
	    parent::__construct();
	    	$this->data['meta_title'] = "ศิลปกรรม";
	  }

	function index()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/art/art');
		$this->load->view('front/temp/footer');
	}

	function composer()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/art/composer');
		$this->load->view('front/temp/footer');
	}

}
