<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Lang_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function insert()
    {
        
        if($this->input->post('send')!=NULL){
	    	$data = array(
				   'lang_title' => serialize($this->input->post('title_th')),
				   'lang_detail' => serialize($this->input->post('detail_th')),
				);
				//$this->db->insert("seo", $data);
				if($this->db->insert("tb_lang", $data))
				{
				  redirect('admin/lang','refresh');
				  exit();	
				}else{
					echo "<script>alert('Insert data fail.');</script>";
				}
			}
    }

    function update()
    {
        if($this->input->post('update')!=NULL){
        	$id= $this->uri->segment(4);
	    	$data = array(
				   'lang_title' => serialize($this->input->post('title_th')),
				   'lang_detail' => serialize($this->input->post('detail_th')),
				);
    		
	    	
			$this->db->where('lang_id', $id);
			//$this->db->update("seo", $data);
			
			if($this->db->update("tb_lang", $data))
			{
			  redirect('admin/lang/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Edit data fail.');</script>";
			}
		} 
    }

}

?>