<?php if( !defined('BASEPATH')) exit('No direct script access allowed');

class Models extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("backend/models_model");
        
        if($this->session->userdata['logged_in']['status']!="yes"){
			redirect('admin/dashboard');
			exit;	
		}
    }

	public function index() 
	{
    	$sql="select * from models ";
			$res=$this->db->query($sql);
				$data['res_models'] = $res;
				
    	$this->load->view('admin/models/index', $data);
    }
    
	public function add()
    {
	   	
    	$this->load->view('admin/models/add');
	   
	    $add_head = new models_model();
	        if($add_head->insert()) 
	        {
	        	redirect('admin/models', $data);
	         } 
	} // end function
	
    function edit($id)
	{
		$sql="select * from models where models_id='$id' ";
			$rs=$this->db->query($sql);
			
			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/models'</script>";
			}
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
		$sql2="select * from models_album where models_id='$id' order by models_album_num asc ";
			$res=$this->db->query($sql2);
			
				$data['rs_models_img']=$res;
			
		$this->load->view('admin/models/edit', $data);
		
	    $add_head = new models_model();
	        if($add_head->edit_data($id)) 
	        {
	        	redirect("admin/models/edit/$id", $data);
	         } 
	}// end function edit
    
	public function edit_pic($id){
		$id_models = $this->input->post('id_models');
		$post = new models_model();
        if ($post->update_pic($id)) {
            redirect("admin/models/edit/$id_models");
        }
	
	} //end function edit pic
	
	public function delete_image($id)
    {
    	$sql2="select * from models_album where models_album_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$id_models = $row['models_id'];
			}
        $post = new models_model();
        if ($post->delete_img($id)) {
            redirect("admin/models/edit/$id_models");
        }
    }
    
	public function delete($id)
    {
        $post = new models_model();
        if ($post->delete_data($id)) {
            redirect('admin/models/');
        }
    }   
    
   public function upload(){
    	
    	$this->models_model->delete_data();
   } 	
  
}// end class