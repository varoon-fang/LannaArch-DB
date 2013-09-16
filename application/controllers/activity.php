<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

	function index()
	{
		$this->data['meta_title'] = "กิจกรรม";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/activity');
		$this->load->view('front/temp/footer');
	}
}
