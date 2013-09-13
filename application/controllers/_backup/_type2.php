<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class type2 extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("type_model");
        
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }

	public function index() {
    	
    	$this->load->view('backoffice/type/index');
    }
    
    public function list_type($data) {
    	
    	$this->load->view('backoffice/type/view', $data);
    }
    
	public function add()
    {
	    $this->load->view('backoffice/type/add');
	    
		
		$this->type_model->insert();
	} // end function
	
    public function edit($id){
		$this->type_model->edit_data();
		
		//$id=$this->uri->segment(4);
			
		$sql="select * from type_job where type_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/type/edit', $data); 
			
			
		
    }// end function edit
    
	public function edit_pic($id){
	
		$this->type_model->update_pic();
	
	} //end function edit pic


    public function delete($id){
    	
    	$this->type_model->delete_data();
    }
    
   public function upload(){
    	
    	$this->type_model->delete_data();
   } 	
  
}// end class