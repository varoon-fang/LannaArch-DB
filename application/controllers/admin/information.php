<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Information extends CI_Controller {
	
     function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');
		
		$this->load->model("backend/information_model");
		
		if($this->session->userdata['logged_in']['status']!="yes"){
			redirect('admin/dashboard');
			exit;	
		}
    }
 
// ------------------------ Category Mode ------------------------
function category() 
	{
	 	
		$sql_cate="select * from information_group ";
			$rs=$this->db->query($sql_cate);
						
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->result_array();
			}   
		
		$this->load->view('admin/information/view_cate', $data);
	}

function add_category() 
	{
	 	$this->load->view('admin/information/add_cate', $this->data);
	    $add_head = new information_model();
	        if($add_head->insert_cate()) 
	        {
	        	redirect('admin/information/category', $data);
	        } 
	}

function edit_category($id) 
	{
		//$id = $this->uri->segment(4);
		
		$sql_cate="select * from information_group where information_group_id='$id'  ";
			$rs=$this->db->query($sql_cate);
			foreach($rs->result_array() as $row){
				$data['title_name'] = $row['information_group_name'];
			}			
			
	 	$this->load->view('admin/information/edit_cate', $data);
	 	
	    $add_head = new information_model();
	        if($add_head->edit_cate($id)) 
	        {
	        	redirect('admin/information/category', $data);
	         } 
	}
		
function del_category($id) 
	{
	 	$post = new information_model();
        if ($post->delete_cate($id)) {
            redirect('admin/information/category', $data);
        }
    }

// ------------------------ information Mode ------------------------    	
function index() 
	 {
	 	$sql="select * from information group by information_group asc ";
			$res=$this->db->query($sql);
				$data['rs_information'] = $res;
				
    	$this->load->view('admin/information/index', $data);
    }
    
function view($group_id) 
	 {
	 	$sql2="select * from information where information_group='$group_id' ";
			$rs=$this->db->query($sql2);
			
			$data['rs_information'] = $rs->result_array();
					
					
    	$this->load->view('admin/information/list_more', $data);
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
    	$data['list_cate'] = $this->information_model->list_cate();	
    	$this->load->view('admin/information/add', $data);
	    $add_head = new information_model();
	        if($add_head->insert()) 
	        {
	        	redirect('admin/information', $data);
	         } 
	} // end function
	
function edit($id)
	{
		$data['list_cate'] = $this->information_model->list_cate();
		$sql="select * from information where information_id='$id' ";
			$rs=$this->db->query($sql);
			
			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/information'</script>";
			}
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
		$sql2="select * from information_album where information_id='$id' order by information_album_num asc ";
			$res=$this->db->query($sql2);
			
				$data['rs_act_img']=$res;
			
		$this->load->view('admin/information/edit', $data);
	    $add_head = new information_model();
	        if($add_head->edit_data($id)) 
	        {
	        	redirect("admin/information/edit/$id", $data);
	         } 
	}// end function edit
    
	public function upload_pic(){
		$post = new information_model();
        $id = $this->input->post('id_information');
        if ($post->update_pic()) {
            redirect("admin/information/edit/$id");
        }
		
	} //end function edit pic


    public function delete($id)
    {
    	$sql2="select * from information where information_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$information_group = $row['information_group'];
			}
        $post = new information_model();
        if($post->delete($id)) {
            redirect("admin/information/view/$information_group");
        }
    }
    
    public function delete_image($id)
    {
    	$sql2="select * from information_album where information_album_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$information_id = $row['information_id'];
			}
        $post = new information_model();
        if ($post->delete_img($id)) {
            redirect("admin/information/edit/$information_id");
        }
    }
     
    
    function upload(){
    	
    	$this->property_model->delete_data();
   } 	
  
}// end class