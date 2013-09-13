<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
     function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');
		
		$this->load->model("backend/gallery_model");
		
		if($this->session->userdata['logged_in']['status']!="yes"){
			redirect('admin/dashboard');
			exit;	
		}
    }
 
// ------------------------ Category Mode ------------------------
function category() 
	{
	 	
		$sql_cate="select * from gallery_group ";
			$rs=$this->db->query($sql_cate);
						
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->result_array();
			}   
		
		$this->load->view('admin/gallery/view_cate', $data);
	}

function add_category() 
	{
	 	$this->load->view('admin/gallery/add_cate', $this->data);
	    $add_head = new gallery_model();
	        if($add_head->insert_cate()) 
	        {
	        	redirect('admin/gallery/category', $data);
	        } 
	}

function edit_category($id) 
	{
		//$id = $this->uri->segment(4);
		
		$sql_cate="select * from gallery_group where gallery_group_id='$id'  ";
			$rs=$this->db->query($sql_cate);
			foreach($rs->result_array() as $row){
				$data['title_name'] = $row['gallery_group_name'];
			}			
			
	 	$this->load->view('admin/gallery/edit_cate', $data);
	 	
	    $add_head = new gallery_model();
	        if($add_head->edit_cate($id)) 
	        {
	        	redirect('admin/gallery/category', $data);
	         } 
	}
		
function del_category($id) 
	{
	 	$post = new gallery_model();
        if ($post->delete_cate($id)) {
            redirect('admin/gallery/category', $data);
        }
    }

// ------------------------ gallery Mode ------------------------    	
function index() 
	 {
	 	$sql="select * from gallery group by gallery_group asc ";
			$res=$this->db->query($sql);
				$data['rs_gallery'] = $res;
				
    	$this->load->view('admin/gallery/index', $data);
    }
    
function view($group_id) 
	 {
	 	$sql2="select * from gallery where gallery_group='$group_id' ";
			$rs=$this->db->query($sql2);
			
			$data['rs_gallery'] = $rs->result_array();
					
					
    	$this->load->view('admin/gallery/list_more', $data);
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
	
	function add()
    {
    	$data['list_cate'] = $this->gallery_model->list_cate();	
    	$this->load->view('admin/gallery/add', $data);
	    $add_head = new gallery_model();
	        if($add_head->insert()) 
	        {
	        	redirect('admin/gallery', $data);
	         } 
	} // end function
	
function edit($id)
	{
		$data['list_cate'] = $this->gallery_model->list_cate();
		$sql="select * from gallery where gallery_id='$id' ";
			$rs=$this->db->query($sql);
			
			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/gallery'</script>";
			}
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
		$sql2="select * from gallery_album where gallery_id='$id' order by gallery_album_num asc ";
			$res=$this->db->query($sql2);
			
				$data['rs_act_img']=$res;
			
		$this->load->view('admin/gallery/edit', $data);
	    $add_head = new gallery_model();
	        if($add_head->edit_data($id)) 
	        {
	        	redirect("admin/gallery/edit/$id", $data);
	         } 
	}// end function edit
    
	public function upload_pic(){
		$post = new gallery_model();
        $id = $this->input->post('id_gallery');
        if ($post->update_pic()) {
            redirect("admin/gallery/edit/$id");
        }
		
	} //end function edit pic


    public function delete($id)
    {
    	$sql2="select * from gallery where gallery_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$gallery_group = $row['gallery_group'];
			}
        $post = new gallery_model();
        if($post->delete($id)) {
            redirect("admin/gallery/view/$gallery_group");
        }
    }
    
    public function delete_image($id)
    {
    	$sql2="select * from gallery_album where gallery_album_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$gallery_id = $row['gallery_id'];
			}
        $post = new gallery_model();
        if ($post->delete_img($id)) {
            redirect("admin/gallery/edit/$gallery_id");
        }
    }
     
    
    function upload(){
    	
    	$this->property_model->delete_data();
   } 	
  
}// end class