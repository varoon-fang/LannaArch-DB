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

	function nan()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/nan');
		$this->load->view('front/temp/footer');
	}

	function phrae()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/phrae');
		$this->load->view('front/temp/footer');
	}

	function maehongson()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/maehongson');
		$this->load->view('front/temp/footer');
	}

	function phayao()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/phayao');
		$this->load->view('front/temp/footer');
	}

	function lampang()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/lampang');
		$this->load->view('front/temp/footer');
	}

	function chiangrai()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/chiangrai');
		$this->load->view('front/temp/footer');
	}

	function lamphun()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/lamphun');
		$this->load->view('front/temp/footer');
	}

	function chiangmai()
	{

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/lanna/chiangmai');
		$this->load->view('front/temp/footer');
	}

}
