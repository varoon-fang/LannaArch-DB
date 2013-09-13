<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Ebook extends CI_Controller {

     function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');

		$this->load->model("backend/ebook_model");

		if($this->session->userdata['logged_in']['status']!="yes"){
			redirect('admin/dashboard');
			exit;
		}
    }

// ------------------------ Category Mode ------------------------
function category()
	{

		$sql_cate="select * from ebook_group ";
			$rs=$this->db->query($sql_cate);

			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->result_array();
			}

		$this->load->view('admin/ebook/view_cate', $data);
	}

function add_category()
	{
	 	$this->load->view('admin/ebook/add_cate', $this->data);
	    $add_head = new ebook_model();
	        if($add_head->insert_cate())
	        {
	        	redirect('admin/ebook/category', $data);
	        }
	}

function edit_category($id)
	{
		//$id = $this->uri->segment(4);

		$sql_cate="select * from ebook_group where ebook_group_id='$id'  ";
			$rs=$this->db->query($sql_cate);
			foreach($rs->result_array() as $row){
				$data['title_name'] = $row['ebook_group_name'];
			}

	 	$this->load->view('admin/ebook/edit_cate', $data);

	    $add_head = new ebook_model();
	        if($add_head->edit_cate($id))
	        {
	        	redirect('admin/ebook/category', $data);
	         }
	}

function del_category($id)
	{
	 	$post = new ebook_model();
        if ($post->delete_cate($id)) {
            redirect('admin/ebook/category', $data);
        }
    }

// ------------------------ ebook Mode ------------------------
function index()
	 {
	 	$sql="select * from ebook group by ebook_group asc ";
			$res=$this->db->query($sql);
				$data['rs_ebook'] = $res;

    	$this->load->view('admin/ebook/index', $data);
    }

function view($group_id)
	 {
	 	$sql2="select * from ebook where ebook_group='$group_id' ";
			$rs=$this->db->query($sql2);

			$data['rs_ebook'] = $rs->result_array();


    	$this->load->view('admin/ebook/list_more', $data);
    }


	function search()
	{
		if($this->input->post('submit')!=NULL)
		{
			//$sql="select * from property where property_amphur='$list_id' ";
			//$res=$this->db->query($sql);
			$data_search = ($this->input->post('search'));
			$this->db->like('property_title', $data_search);
			$query_cate = $this->db->or_like('property_detail', $data_search)->get('property');

		if($query_cate->num_rows()==0){
			$data['res']=array();
		}else{
            $data['res']=$query_cate->result_array();
		}
			$this->load->view('admin/property/search-data', $data);
		}



	}

function add_file()
    {
    	$data['list_cate'] = $this->ebook_model->list_cate();
    	$this->load->view('admin/ebook/add', $data);
	    $add_head = new ebook_model();
	        if($add_head->insert_file())
	        {
	        	redirect('admin/ebook', $data);
	         }
	} // end function

function add()
    {
    	$data['list_cate'] = $this->ebook_model->list_cate();
    	$this->load->view('admin/ebook/add', $data);
	    $add_head = new ebook_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/ebook', $data);
	         }
	} // end function

function edit($id)
	{
		$data['list_cate'] = $this->ebook_model->list_cate();
		$sql="select * from ebook where ebook_id='$id' ";
			$rs=$this->db->query($sql);

			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/ebook'</script>";
			}

			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}
		$sql2="select * from ebook_album where ebook_id='$id' order by ebook_album_num asc ";
			$res=$this->db->query($sql2);

				$data['rs_ebook_img']=$res;

		$this->load->view('admin/ebook/edit', $data);

	    $add_head = new ebook_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/ebook/edit/$id", $data);
	         }
	}// end function edit

public function edit_pic($id){

    	$id_edook = $this->input->post('id_ebook');
			$post = new ebook_model();
	        if ($post->update_pic($id)) {
	            redirect("admin/ebook/edit/$id_edook");
	        }

	} //end function edit pic

public function upload_pdf()
	{
		$post = new ebook_model();
        $id = $this->input->post('id_ebook');
        if ($post->update_file_pdf()) {
            redirect("admin/ebook/edit/$id");
        }

	} //end function

public function upload_example()
	{
		$post = new ebook_model();
        $id = $this->input->post('id_ebook');
        if ($post->update_file_example()) {
            redirect("admin/ebook/edit/$id");
        }

	} //end function

public function delete($id)
    {
    	$sql2="select * from ebook where ebook_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$ebook_group = $row['ebook_group'];
			}
        $post = new ebook_model();
        if($post->delete($id)) {
            redirect("admin/ebook/view/$ebook_group");
        }
    }

public function delete_image($id)
    {
    	$sql2="select * from ebook_album where ebook_album_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$ebook_id = $row['ebook_id'];
			}
    	$post = new ebook_model();
        if ($post->delete_img($id)) {
            redirect("admin/ebook/edit/$ebook_id");
        }
    }

public function delete_file($id)
    {
    	$sql2="select * from ebook where ebook_pdf='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$ebook_id = $row['ebook_id'];
			}
    	$post = new ebook_model();
        if ($post->delete_pdf($id)) {
            redirect("admin/ebook/edit/$ebook_id");
        }
    }

public function delete_file_example($id)
    {
    	$sql2="select * from ebook where ebook_example='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$ebook_id = $row['ebook_id'];
			}
    	$post = new ebook_model();
        if ($post->delete_example($id)) {
            redirect("admin/ebook/edit/$ebook_id");
        }
    }

public function update_number()
	{
		$this->ebook_model->change_num();
    }

}// end class