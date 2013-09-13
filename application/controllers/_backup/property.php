<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Property extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('geo_model');
        $this->load->helper('text');
        $this->load->model('front/banner_top');
		$this->load->model('front/property_list');
		$this->load->model('front/category_list');
		$this->load->library("pagination");
        
        if($this->session->userdata('language') == null){
          $lang=  $this->session->set_userdata('language', 'thailand');
		}
		 
    }
	
	function getsuboptions($option_id){
		$this->geo_model->option_id = $option_id;
		$suboptions = $this->geo_model->getSubOptions();

		header('Content-Type: application/x-json; charset=utf-8');
      	echo json_encode($suboptions);
	}
	
    public function show()
    {
    	    	 
        $data['options'] = $this->geo_model->getOptions();
	   
    	$data = $this->property_list->list_more();
		
		$data['banner'] = $this->banner_top->banner_list();
		$data['banner_rignt_top'] = $this->banner_top->banner_right();
		$data['banner_rignt_buttom'] = $this->banner_top->banner_buttom();
    	$data['meta_title'] = "เว็บไซต์ รับประกาศ ฝากขายบ้าน ที่ดิน คอนโด อาพาร์ทเม้นท์ อสังหาริมทรัพย์ เชียงใหม่";


    	$data['rs'] = $this->category_list->cate_list();
    	$data['rs_type'] = $this->category_list->type_list();
    	
		// nation 	
		$sql3="select * from geography order by geo_id asc";
			$rs_geo=$this->db->query($sql3);
			
			if($rs_geo->num_rows()==0){
				$data['rs_geo']=array();
			}else{
				$data['rs_geo']=$rs_geo;
			}
		
  				 			 	
        $this->load->view('list-home', $data);
    }
    
    public function detail()
    {
    	$data = $this->property_list->detail_list();
    	
    	$data['meta_title'] = "เว็บไซต์ รับประกาศ ฝากขายบ้าน ที่ดิน คอนโด อาพาร์ทเม้นท์ อสังหาริมทรัพย์ เชียงใหม่";
		$data['banner'] = $this->banner_top->banner_list();
		$data['banner_rignt_top'] = $this->banner_top->banner_right();
		$data['banner_rignt_buttom'] = $this->banner_top->banner_buttom();
		
	    $data['rs'] = $this->category_list->cate_list();
    	$data['rs_type'] = $this->category_list->type_list();
    					
		// nation 	
		$sql3="select * from geography order by geo_id asc";
			$rs_geo=$this->db->query($sql3);
			
			if($rs_geo->num_rows()==0){
				$data['rs_geo']=array();
			}else{
				$data['rs_geo']=$rs_geo;
			} 
		$data['banner'] = $this->banner_top->banner_list();			 	
        
        $this->load->view('detail-home', $data);
        
	    
	    	
    }

}

?>