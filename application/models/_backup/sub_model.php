<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Sub_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
       
    }

	public function insert()
	{
		if($this->input->post('submit')!=NULL)
		{
			//add data		
			$data = array(
			   'type_name' => serialize($this->input->post('title_th')),
			);
			
			$query = $this->db->insert("type_job", $data);
			return ($query);
		}		         
	}// end function
	
	public function edit_data($id)
	{
		$data = array(
			   'type_name' => serialize($this->input->post('title_th')),//$this->input->post('title_th'),
	    	);
			
			$this->db->where('type_id', $id);
			$query = ($this->db->update("type_job", $data));
			return ($query);
		
	}// end function
	
	
	public function delete_data($id)
	{
        $data = array(
                'type_status' =>'no',
            );
		$this->db->where('type_id', $id);
		$query = $this->db->update('type_job', $data);
		 if($query)
	        {
	        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Delete data success!</strong>
			    </div>');
	        				
		    }else {
	        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Unsuccess!</strong>
			    </div>');
	        	
		    }
		return ($query);

	} //end function

} // end class	
	
?>