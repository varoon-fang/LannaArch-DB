<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
    {
        // Call the constructor
        parent::__construct();
        	$this->load->helper('text');
    }

	function index()
	{
		$this->data['meta_title'] = "ศูนย์สถาปัตยกรรมล้านนา คุ้มเจ้าบุรีรัตน์ (เจ้าน้อยมหาอินทร์ ณ เชียงใหม่)";
		// banner
		$sql = "select * from banner_head order by banner_head_id desc ";
		$res=$this->db->query($sql);
		$data['rs_banner'] = $res->result_array();

		// activity
		$sql_act = "select * from activity order by activity_id desc limit 4 ";
		$res_act=$this->db->query($sql_act);
		$data['rs_activity'] = $res_act->result_array();

		// ebook
		$sql_book = "select * from ebook order by ebook_id desc limit 6 ";
		$res_book=$this->db->query($sql_book);
		$data['rs_ebook'] = $res_book->result_array();

		// gallery
		$sql_gallery = "select * from gallery order by gallery_id desc limit 4 ";
		$res_gallery=$this->db->query($sql_gallery);
		$data['rs_gallery'] = $res_gallery->result_array();

		//view mode
		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/landingpage', $data);
		$this->load->view('front/temp/footer');
	}
}

