<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Structure extends CI_Controller {
	function __construct()
    {
        // Call the constructor
        parent::__construct();

        	$this->load->helper('text');
    }

	//------------------------ Gallery --------------------------
	function index()
	{
		$this->data['meta_title'] = "ห้องสมุดออนไลน์ | ห้องสมุดภาพ";

		// gallery group
		$sql_gallery = "select * from gallery group by gallery_group desc";
		$res_gallery=$this->db->query($sql_gallery);
		$data['rs_gallery'] = $res_gallery->result_array();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/library-gallery', $data);
		$this->load->view('front/temp/footer');
	}

	function more()
	{
		$page_id = $this->uri->segment(3);
		$get_page = $this->uri->segment(5);
		$this->load->library("pagination");

		$query = $this->db->get_where('gallery', array('gallery_group'=>$page_id));
		$count = $query->num_rows();

		$config['base_url']=site_url()."gallery/more/$page_id/page";
		$config['per_page']=2;
		$config['total_rows']=$count;
		$config['page_query_string']= false;
		$config['uri_segment'] = 5;

		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '›';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '‹';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';


		$this->pagination->initialize($config);

		$data['rs_gallery']= $res = $this->db->select('*')->from('gallery')->where('gallery_group', $page_id)->limit($config['per_page'],$get_page)->get()->result_array();
			foreach($res as $fett){
				$gallery_group= $fett['gallery_group'];
			}
		// gallery group
		$sql_group = "select * from gallery_group where gallery_group_id='$gallery_group'";
		$res_group=$this->db->query($sql_group)->row_array();
		$data['res_group'] = $res_group;

		$this->data['meta_title'] = "ห้องสมุดออนไลน์ | $res_group[gallery_group_name]";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/library-gallery-list', $data);
		$this->load->view('front/temp/footer');
	}

	function detail()
	{
		$page_id = $this->uri->segment(3);
		$get_page = $this->uri->segment(5);
		$this->load->library("pagination");

		$query = $this->db->get_where('gallery_album', array('gallery_id'=>$page_id));
		$count = $query->num_rows();

		$config['base_url']=site_url()."gallery_detail/$page_id/page";
		$config['per_page']=12;
		$config['total_rows']=$count;
		$config['page_query_string']= false;
		$config['uri_segment'] = 5;

		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '›';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '‹';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';


		$this->pagination->initialize($config);

		$data['rs_gallery_album']= $res = $this->db->select('*')->from('gallery_album')->where('gallery_id', $page_id)->limit($config['per_page'],$get_page)->get()->result_array();


		// gallery
		$sql_gallery = "select * from gallery where gallery_id='$page_id'";
		$res_gallery = $this->db->query($sql_gallery)->row_array();
		$data['res_gallery'] = $res_gallery;

		// gallery group
		$sql_group = "select * from gallery_group where gallery_group_id='$res_gallery[gallery_group]'";
		$res_group=$this->db->query($sql_group)->row_array();
		$data['res_group'] = $res_group;

		$this->data['meta_title'] = "ห้องสมุดออนไลน์ | ". $res_gallery['gallery_title'] ."";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/library-gallery-detail', $data);
		$this->load->view('front/temp/footer');
	}


}// end class
