<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lang extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('lang_model');
			
	}
	
    function index() {
    	
    	$this->load->view('backoffice/lang/view');
    }
    
    function add(){
		
		$this->lang_model->insert();
	    	
	    $this->load->view('backoffice/lang/add');
	    
    }// end add
    
 	function edit($id){
    		$this->lang_model->update();
    		
		$rs = $this->db->get_where("tb_lang", array('lang_id' => $id));
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}  	

			$this->load->view('backoffice/lang/edit', $data); 
			
			
    }// end function edit
     	    
    function delete($id){
    
	    $this->db->where('lang_id', $id);
			if($this->db->delete("tb_lang"))
			{
			  redirect('backoffice/lang/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Delete data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/lang/';</script>";
			} 
			
    }  // end delete 
  
}// end class