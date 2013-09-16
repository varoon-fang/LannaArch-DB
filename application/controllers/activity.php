<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {
	function __construct()
    {
        // Call the constructor
        parent::__construct();

        	$this->load->helper('text');
    }

	//------------------------ activity --------------------------
	function index()
	{
		$this->data['meta_title'] = "กิจกรรม";

		// activity group
		$sql_activity = "select * from activity group by activity_group desc";
		$res_activity=$this->db->query($sql_activity);
		$data['rs_activity'] = $res_activity->result_array();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/activity/activity', $data);
		$this->load->view('front/temp/footer');
	}

	function more()
	{
		$page_id = $this->uri->segment(3);
		$get_page = $this->uri->segment(5);
		$this->load->library("pagination");

		$query = $this->db->get_where('activity', array('activity_group'=>$page_id));
		$count = $query->num_rows();

		$config['base_url']=site_url()."activity/more/$page_id/page";
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

		$data['rs_activity']= $res = $this->db->select('*')->from('activity')->where('activity_group', $page_id)->limit($config['per_page'],$get_page)->get()->result_array();
			foreach($res as $fett){
				$activity_group= $fett['activity_group'];
			}
		// activity group
		$sql_group = "select * from activity_group where activity_group_id='$activity_group'";
		$res_group=$this->db->query($sql_group)->row_array();
		$data['res_group'] = $res_group;

		$this->data['meta_title'] = "กิจกรรม | $res_group[activity_group_name]";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/activity/activity-list', $data);
		$this->load->view('front/temp/footer');
	}

	function detail()
	{
		$page_id = $this->uri->segment(3);
		$get_page = $this->uri->segment(5);
		$this->load->library("pagination");

		$query = $this->db->get_where('activity_album', array('activity_id'=>$page_id));
		$count = $query->num_rows();

		$config['base_url']=site_url()."activity_detail/$page_id/page";
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

		$data['rs_activity_album']= $res = $this->db->select('*')->from('activity_album')->where('activity_id', $page_id)->limit($config['per_page'],$get_page)->get()->result_array();


		// activity
		$sql_activity = "select * from activity where activity_id='$page_id'";
		$res_activity = $this->db->query($sql_activity)->row_array();
		$data['res_activity'] = $res_activity;

		// activity group
		$sql_group = "select * from activity_group where activity_group_id='$res_activity[activity_group]'";
		$res_group=$this->db->query($sql_group)->row_array();
		$data['res_group'] = $res_group;

		$this->data['meta_title'] = " กิจกรรม | ". $res_activity['activity_title'] ."";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/activity/activity-detail', $data);
		$this->load->view('front/temp/footer');
	}


}// end class
