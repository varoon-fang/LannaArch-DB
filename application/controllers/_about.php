<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	function index()
	{
		$this->data['meta_title'] = "เกี่ยวกับเรา";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/about');
		$this->load->view('front/temp/footer');
	}
}
