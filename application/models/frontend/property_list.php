<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Property_list extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library("pagination");
    }
    
    public function list_more()
    {
    	$cate_id = $this->uri->segment(2);
    	// categoies get name
  	  	$query1="select * from category_job where cate_id=$cate_id";
  			$rscate=$this->db->query($query1);
  			
  			if($rscate->num_rows()==0){
				$data['rscate']=array();
			}else{
				$data['rscate']=$rscate;
			}

			foreach($rscate->result_array() as $fett)
			{
				$cate_name = unserialize($fett['cate_name']);	
			}
	    
		
		
		$query = $this->db->get_where('property', array('property_cate'=>$cate_id));
		$count = $query->num_rows(); 
				
		$config['base_url']=site_url()."property/$cate_id/".$cate_name[$this->session->userdata('language')]."";
		$config['total_rows']=$count;
		$config['per_page']=2;
		$config['uri_segment'] = 4;		
		
		$config['first_link'] = '«';
		$config['first_tag_open'] = '<span class="current">';
		$config['first_tag_close'] = '</span>';
		 
		$config['last_link'] = '»';
		$config['last_tag_open'] = '<span class="current">';
		$config['last_tag_close'] = '</span>';
		 
		$config['next_link'] = '›';
		$config['next_tag_open'] = '<span class="current">';
		$config['next_tag_close'] = '</span>';
		 
		$config['prev_link'] = '‹';
		$config['prev_tag_open'] = '<span class="current">';
		$config['prev_tag_close'] = '</span>';
		 
		$config['num_tag_open'] = '<span class="disabled">';
		$config['num_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		
		$data['rs_property']=$this->db->select('*')->from('property')->where('property_cate' , $cate_id)->limit($config['per_page'],$this->uri->segment(4))->get();
		
					
			return $data;
							
    }
    public function more()
    {
    	$cate_id = $this->uri->segment(2);
	    // property 	
		$query_property="select * from property where property_cate='$cate_id'";
  			$rs_property=$this->db->query($query_property);
  			
  			if($rs_property->num_rows()==0){
				$data['rs_property']=$rs_property;
			}else{
				$data['rs_property']=$rs_property;
			}
		
		
		// categoies get name
  	  	$query1="select * from category_job where cate_id=$cate_id";
  			$rscate=$this->db->query($query1);
  			
  			if($rscate->num_rows()==0){
				$data['rscate']=array();
			}else{
				$data['rscate']=$rscate;
			}
			
			return $data;
    }	
	
	public function detail_list()
    {
	    $property_id = $this->uri->segment(2);
	    // property 	
		$query_property="select * from property where property_id='$property_id'";
  			$rs_property=$this->db->query($query_property);
  			
  			if($rs_property->num_rows()==0){
				$data['rs_property']=array();
			}else{
				$data['rs_property']=$rs_property;
			}
			
			//return $data['rs_property'];
			
			foreach($rs_property->result_array() as $fett){
				$property_pr   = $fett['property_province'];
  				$property_am   = $fett['property_amphur'];
				$property_cate = $fett['property_cate'];
  				$property_type = $fett['property_type'];
			}
			
		// categoies get name
  	  	$query1="select * from category_job where cate_id=$property_cate";
  			$rscate=$this->db->query($query1);
  			foreach( $rscate->result_array() as $row)
  				{
  					$data['category_name'] = unserialize($row['cate_name']);
  				}
  			if($rscate->num_rows()==0){
				$data['rscate']=array();
			}else{
				$data['rscate']=$rscate;
			}
			//return $data['rscate'];
		// type get name 	
		$query2="select * from type_job where type_id='$property_type' AND type_status='yes' ";
			$rstype=$this->db->query($query2);
			
			if($rstype->num_rows()==0){
				$data['rstype']=array();
			}else{
				$data['rstype']=$rstype;
			}
			//return $data['rstype'];
		// province 
		$query_province="select * from province where province_id='$property_pr' ";
  			$rs_province=$this->db->query($query_province);
  				foreach( $rs_province->result_array() as $row)
  				{
  					$data['province_name'] = $row['province_name'];
  				}
  		// amphur 
		$query_amphur="select * from amphur where amphur_id='$property_am' ";
  			$rs_amphur=$this->db->query($query_amphur);
  				foreach( $rs_amphur->result_array() as $row)
  				{
  					$data['amphur_name'] = $row['amphur_name'];
  				}
  		// images frist
  		$query_property_img="select * from property_album where property_id='$property_id' order by property_album_num asc limit 1";
  			$rs_property_img=$this->db->query($query_property_img);
  				foreach( $rs_property_img->result_array() as $row)
  				{
  					$data['img_frist']=$row['property_album_name'];
  				}			
			return $data;
		
    }
    
	
	

} // end class	
	
?>