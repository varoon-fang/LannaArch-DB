<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Category_list extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    	
	public function cate_list()
	{
		// categoies get all
    	$sql="select * from category_job where cate_preview='1' order by cate_id asc";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs;
			}
		
			return $data['rs'];
	}
	
	public function type_list()
	{	
		// type get all 	
		$sql2="select * from type_job where type_status='yes' order by type_id asc";
			$rs_type=$this->db->query($sql2);
			
			if($rs_type->num_rows()==0){
				$data['rs_type']=array();
			}else{
				$data['rs_type']=$rs_type;
			}

		return $data['rs_type'];
	}
	

} // end class	
	
?>