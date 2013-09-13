<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller {

	function index()
	{
		$this->data['meta_title'] = "ประวัติความเป็นมา";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/history');
		$this->load->view('front/temp/footer');
	}
}
