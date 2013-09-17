<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Information_lanna extends CI_Controller {
	function __construct()
	  {
	    parent::__construct();
	    	$this->data['meta_title'] = "ข้อมูลล้านนา";
	  }

	function index()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/lanna');
		$this->load->view('front/temp/footer');
	}

	function composer()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/nan');
		$this->load->view('front/temp/footer');
	}

}
