<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

     public function __construct()
     {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("category_model");
        
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }

	 public function index() 
	 {
    	
    	$this->load->view('backoffice/category/preview');
     }
      
     public function save_preview() 
     {
    	
    	$change = new Category_model();
	        if ($change->insert_preview()) {
	            redirect('backoffice/category');
	        }
	        
    	//$this->category_model->insert_preview();
     }
    
	 public function add()
     {
    	if($this->input->post('send')!=NULL)
    	{
    		$add = new Category_model();
	        if ($add->insert()) {
	        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Insert data Successful.</strong>
			    </div>');
			    
	            redirect('backoffice/category');
	        }else{
		        redirect('backoffice/catagory/add');
	        }
    	}
    	
	    $this->load->view('backoffice/category/add', $this->session->set_flashdata());
	    
	 } // end function
	
     public function edit($id)
     {
		
		if($this->input->post('send')!=NULL)
    	{
    		$edit = new Category_model();
	        if ($edit->edit_data($id)) {
	        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Edit data Successful.</strong>
			    </div>');
			    
	            redirect('backoffice/category');
	        }
    	}
    			
		$sql="select * from category_job where cate_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
			$this->load->view('backoffice/category/edit', $data); 
	}// end function edit
    
	 function edit_pic($id){
	
		$this->category_model->update_pic();
	
	} //end function edit pic


     public function delete($id)
     {
    	$post = new Category_model();
        if ($post->delete_data($id)) {
            redirect('backoffice/category/');
        }
        
     }
    
  	
  
}// end class