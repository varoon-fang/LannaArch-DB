<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Type extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Sub_model");
        
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }

	public function index() {
    	
    	$this->load->view('backoffice/sub_category/preview');
    }
    
    public function list_type($data) {
    	
    	$this->load->view('backoffice/sub_category/view', $data);
    }
    
	public function add()
    {
		if($this->input->post('submit')!=NULL)
		{
			$add = new Sub_model();
	        if($add->insert()) 
	        {
	        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Insert data Success.</strong>
			    </div>');
	            redirect('backoffice/type');
	        }
	        else
	        {
	        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Insert data Unsuccess!</strong>
			    </div>');
		      redirect('backoffice/type/add');  
	        }
		}
		
		$this->load->view('backoffice/sub_category/add');
	} // end function
	
    public function edit($id){
			
		$sql="select * from type_job where type_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/sub_category/edit', $data); 
		
		if($this->input->post('send')!=NULL)
		{
			$edit = new Sub_model();
			//$id = $this->uri->segment(4);
			if($edit->edit_data($id)) 
	        {
	        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Edit data Success.</strong>
			    </div>');
	            redirect('backoffice/type');
	        }
	        
		}
		
    }// end function edit
    
	public function edit_pic($id){
	
		$this->sub_model->update_pic();
	
	} //end function edit pic


    public function delete($id){
    	$post = new Sub_model();
        if ($post->delete_data($id)) {
            redirect('backoffice/type/');
        }
    	//$this->sub_model->delete_data();
    }
   	
  
}// end class