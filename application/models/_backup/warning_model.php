<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Warning_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
    }
    	
	function insert(){
		 if($this->input->post('send')!=NULL){
        		
                 //add data		
			    	$data = array(
			    	   'warning_type' => $this->input->post('type_name'),
			    	   'warning_detail' => $this->input->post('detail_th'),
					);
				$query =$this->db->insert("warning_job", $data);
            if($query)
			{
			  	echo "<script>window.location.href = '" . base_url() . "backoffice/warning';</script>";	
			}else{
				echo "<script>alert('Insert data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/warning/add';</script>";
			}     
        }// eddn check submit
         
	}// end function
	
	function edit_data(){
		$id =$this->uri->segment(4);
		
		
    	if($this->input->post('send')!=NULL){
	    	$data = array(
	    	   'warning_type' => $this->input->post('type_name'),
	    	   'warning_detail' => $this->input->post('detail_th'),
			);
			
			$this->db->where('warning_id', $id);
			
			$query = $this->db->update("warning_job", $data);
			if($query)
			{
			  	echo "<script>window.location.href = '" . base_url() . "backoffice/warning';</script>";	
			}else{
				echo "<script>alert('Edit data fail.');</script>";
				//echo "<script>window.location.href = '" . base_url() . "backoffice/warning';</script>";
			}
		
		}
		
	}// end function
	
	
	
	function delete_data(){
			
		$this->db->where('warning_id', $this->id);
		return ($this->db->delete('warning_job'));
	} //end function
	

} // end class	
	
?>