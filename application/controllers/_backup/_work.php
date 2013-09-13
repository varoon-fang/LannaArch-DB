<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model('Work_model');
    }

    public function index() {
    	
    	$this->load->view('backoffice/work/index');
    }
    
	public function add()
	{
		$this->load->view('backoffice/work/add');
		
		
		$this->Work_model->insert();
	
	} // end function
	
    public function edit($id){
    	
    	
		$this->Work_model->update_work();
		
			$rs = $this->db->get_where("work", array('work_id' => $id));
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}  	
							
			$this->load->view('backoffice/work/edit', $data); 
    }// end function edit
    
   public function edit_pic(){
    
		
		$this->Work_model->update_img();

   } //end function edit pic


    public function delete(){
    	
		$this->Work_model->delete_work();		
		 
    }
  
  public function update_number(){
	   //	$this->Product_model->update_num_pic();
	   
	   $action 				= mysql_real_escape_string($this->input->post('action')); 
	   $updateRecordsArray 	= $this->input->post('recordsArray');

			if ($action == "updateRecordsListings"){
						
				$listingCounter = 1;
				foreach ($updateRecordsArray as $recordIDValue) {
					
					//$query = "update work_album set work_num = " . $listingCounter . " where id = " . $recordIDValue;
					//mysql_query($query) or die('Error, insert query failed');
					
					$data = array(
						'work_num' => $listingCounter,
					);
					
					$this->db->where('work_album', $recordIDValue);
					$this->db->update("work_album", $data);
					
					$listingCounter = $listingCounter + 1;	
				}
			
			}
			
   	}  
   
 // -------------------------------- Group work -------------------------------- 
	public function add_group(){
	    $this->load->view('backoffice/work/group_add');
    
		
		$this->Work_model->insert_group();
	} // end function    
   
   public function view_group() {
    	
    	$this->load->view('backoffice/work/group_view');
    	
    } 
    
    public function edit_group($id){
    	
    	
		$this->Work_model->update_group();
    	
		$sql="select * from work_group where work_group_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/work/group_edit', $data); 
    }// end function edit 
  
   public function delete_group($id){
    	
		$this->Work_model->empty_group();		

    }
    
}// end class