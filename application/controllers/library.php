<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Library extends CI_Controller {
	function __construct()
    {
        // Call the constructor
        parent::__construct();

        	$this->load->helper('text');
        	$this->load->model('backend/ebook_model');
        	$this->load->model('frontend/search');
    }

	function index()
	{

		$this->data['meta_title'] = "ห้องสมุดออนไลน์ | ห้องหนังสือ";
		$data['list_cate'] = $this->ebook_model->list_cate();
		$data['list_major'] = $this->search->major();
		// ebook group
		$sql_book = "select * from ebook group by ebook_group desc";
		$res_book=$this->db->query($sql_book);
		$data['rs_ebook'] = $res_book->result_array();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/library/library-book', $data);
		$this->load->view('front/temp/footer');
	}

	function more()
	{
		$page_id = $this->uri->segment(3);
		$get_page = $this->uri->segment(5);
		$this->load->library("pagination");

		$query = $this->db->get_where('ebook', array('ebook_group'=>$page_id));
		$count = $query->num_rows();

		$config['base_url']=site_url()."library/more/$page_id/page";
		$config['per_page']=1;
		$config['total_rows']=$count;
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

		$data['rs_ebook']= $res_book = $this->db->select('*')->from('ebook')->where('ebook_group', $page_id)->limit($config['per_page'],$get_page)->get()->result_array();
			foreach($res_book as $fett){
				$ebook_group= $fett['ebook_group'];
			}
			// ebook group
		$sql_book_group = "select * from ebook_group where ebook_group_id='$ebook_group'";
		$res_book_group=$this->db->query($sql_book_group)->result_array();
			foreach($res_book_group as $row){
				$data['ebook_group_name'] = $row['ebook_group_name'];
			}

		$this->data['meta_title'] = "ห้องสมุดออนไลน์ | $row[ebook_group_name]";

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/library/library-book-list', $data);
		$this->load->view('front/temp/footer');
	}

	function search_book()
	{
		$this->data['meta_title'] = "ห้องสมุดออนไลน์ | ค้นหาหนังสือ";

		$data['list_cate'] = $this->ebook_model->list_cate();
		$data['list_major'] = $this->search->major();
		$data['search_result'] = $this->search->search_more();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/library/search-book-list', $data);
		$this->load->view('front/temp/footer');
	}

	function detail()
	{
		 $ebook_id = $this->uri->segment(3);
			// ebook
			$sql_book = "select * from ebook where ebook_id='$ebook_id'";
			$res_book=$this->db->query($sql_book);
			$data['rs_ebook'] = $res_book->row_array();
				foreach($res_book->result_array() as $fett){
					$ebook_group= $fett['ebook_group'];
				}

			//ebook group
			$sql_book_group = "select * from ebook_group where ebook_group_id='$ebook_group'";
			$res_group = $this->db->query($sql_book_group);
			$data['rs_ebook_group'] = $res_group->row_array();

			// ebook img
			$book_img = "select * from ebook_album where ebook_id='$ebook_id' order by ebook_album_num asc limit 1 ";
			$res_book_img=$this->db->query($book_img)->row_array();
			$data['rs_ebook_img'] = $res_book_img;

			$this->data['meta_title'] = "ห้องสมุดออนไลน์ | ".$this->uri->segment(4)."";

			$this->load->view('front/temp/header', $this->data);
			$this->load->view('front/library/library-book-detail', $data);
			$this->load->view('front/temp/footer');
	}

	function read_book($ebook_id)
	{
		$ebook_id = $this->uri->segment(3);
		// ebook
		$sql_book = "select * from ebook where ebook_id='$ebook_id'";
			$res_book=$this->db->query($sql_book);
			$data['rs_ebook'] = $res_book->row_array();

		// ebook img
			$book_img = "select * from ebook_album where ebook_id='$ebook_id' order by ebook_album_num asc ";
			$data['rs_ebook_img'] = $res_book_img=$this->db->query($book_img)->result_array();


			$this->load->view('front/library/read_book', $data);
	}




}// end class
