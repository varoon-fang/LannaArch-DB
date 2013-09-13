<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Template extends CI_Controller{
	function __construct(){
        parent::__construct();
		//$this->load->model("backend/template_model");
		
		if($this->session->userdata['logged_in']['status']!="yes"){
			redirect('admin/dashboard');
			exit;	
		}
    }
    
   public function index()
   {
   		$sql_temp="select * from template order by temp_id asc ";
			$rs=$this->db->query($sql_temp);
			
				$data['rs_temp']=$rs;
	
	   $this->load->view('admin/template/index', $data);
   }
   
   public function change()
   {
   	 	$sql_temp="select * from template where temp_status='yes'";
			$rs=$this->db->query($sql_temp);
				foreach($rs->result_array() as $row){
					$id_temp =$row['temp_id']; 
					
					$data = array(
				   		'temp_status' => 'no',
				   );
				   
				   $this->db->where('temp_id' , $id_temp);
					$this->db->update('template', $data);
				}
			
   	   $id= $this->input->post('temp_name');
   		
	   $data = array(
	   		'temp_status' => 'yes',
	   );
	   
	   $this->db->where('temp_id' , $id);
	   $query = $this->db->update('template', $data);
	   
	   if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Change template successful.</strong>
		    </div>');
        	
	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Change template Unsuccessful!</strong>
		    </div>');
        	
	    }
	    redirect('admin/template', $data);
   }
   
}// end class 
?>