<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Arch extends CI_Controller {
	function __construct()
    {
        // Call the constructor
        parent::__construct();

        	$this->load->helper('text');
    }

	//------------------------ layout --------------------------
	function structure()
	{
		$this->data['meta_title'] = "ห้องสมุดสถาปัตยกรรม | แบบสถาปัตยกรรม";

		// layout group
		$sql_layout = "select * from layout_arch group by layout_group desc";
		$res_layout=$this->db->query($sql_layout);
		$data['rs_layout'] = $res_layout->result_array();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/arch/structure', $data);
		$this->load->view('front/temp/footer');
	}

	function structure_more()
	{
		$page_id = $this->uri->segment(3);
		$get_page = $this->uri->segment(5);
		$this->load->library("pagination");

		$query = $this->db->get_where('layout_arch', array('layout_group'=>$page_id));
		$count = $query->num_rows();

		$config['base_url']=site_url()."arch/structure_more/$page_id/page";
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

		$data['rs_layout']= $res = $this->db->select('*')->from('layout_arch')->where('layout_group', $page_id)->limit($config['per_page'],$get_page)->get()->result_array();
			foreach($res as $fett){
				$layout_group= $fett['layout_group'];
			}
		// layout group
		$sql_group = "select * from layout_group where layout_group_id='$layout_group'";
		$res_group=$this->db->query($sql_group)->row_array();
		$data['res_group'] = $res_group;

		$this->data['meta_title'] = "ห้องสมุดออนไลน์ | $res_group[layout_group_name]";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/arch/structure-list', $data);
		$this->load->view('front/temp/footer');
	}

	function structure_detail()
	{
		$page_id = $this->uri->segment(3);

		// layout
		$sql_layout = "select * from layout_arch where layout_id='$page_id'";
		$res_layout = $this->db->query($sql_layout)->row_array();
		$data['res_layout'] = $res_layout;

		// layout group
		$sql_group = "select * from layout_group where layout_group_id='$res_layout[layout_group]'";
		$res_group=$this->db->query($sql_group)->row_array();
		$data['res_group'] = $res_group;

		// layout image
		$sql_img = "select * from layout_album where layout_id='$page_id' order by layout_album_num asc limit 1";
		$data['res_img'] =$res_img=$this->db->query($sql_img)->row_array();

		$this->data['meta_title'] = "ห้องสมุดออนไลน์ | ". $res_layout['layout_title'] ."";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/arch/structure-detail', $data);
		$this->load->view('front/temp/footer');
	}


}// end class
