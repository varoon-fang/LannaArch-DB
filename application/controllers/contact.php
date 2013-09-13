<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	function index()
	{
		$this->data['meta_title'] = "ติดต่อเรา";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/contactus');
		$this->load->view('front/temp/footer');
	}
}
