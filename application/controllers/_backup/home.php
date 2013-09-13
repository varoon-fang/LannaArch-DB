<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('geo_model');
        $this->load->model('front/banner_top');
        $this->load->helper('text');
        
        
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
	
    function index()
    {
    	$data['options'] = $this->geo_model->getOptions();	
    	$data['meta_title'] = "เว็บไซต์ รับประกาศ ฝากขายบ้าน ที่ดิน คอนโด อาพาร์ทเม้นท์ อสังหาริมทรัพย์ เชียงใหม่";
    	$data['banner_index'] = $this->banner_top->banner_main();
    	$data['banner'] = $this->banner_top->banner_list();
    	$data['banner_rignt_top'] = $this->banner_top->banner_right();
		$data['banner_rignt_buttom'] = $this->banner_top->banner_buttom();
    	
    	
    	// categoies
    	$sql="select * from category_job where cate_preview='1' order by cate_id asc";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs;
			}
		// type 	
		$sql2="select * from type_job where type_status='yes' order by type_id asc";
			$rs_type=$this->db->query($sql2);
			
			if($rs_type->num_rows()==0){
				$data['rs_type']=array();
			}else{
				$data['rs_type']=$rs_type;
			}
		// nation 	
		$sql3="select * from geography order by geo_id asc";
			$rs_geo=$this->db->query($sql3);
			
			if($rs_geo->num_rows()==0){
				$data['rs_geo']=array();
			}else{
				$data['rs_geo']=$rs_geo;
			}  
			 	
        $this->load->view('landingpage', $data);
    }
    
   

}

?>