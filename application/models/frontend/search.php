<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function search_more()
    {

    	 $title		= $this->input->get('title');
		 $category 	= $this->input->get('category');
		 $major 	= $this->input->get('major');
		 $year		= $this->input->get('year');
		 $detail 	= $this->input->get('detail');

		$sql_pages .= "select * from ebook where 1 ";

		if($title=="0" OR $title=="" ){

		}else{
			$sql_pages .= " AND property_geo='$title' ";

		}
		if($category=="0" OR $category=="" ){

		}else{
			$sql_pages .= " AND property_province='$category' ";
		}
		if($major=="0" OR $major=="" ){

		}else{
			$sql_pages .= " AND property_type= '$major' ";
		}
		if($year=="0" || $year==""){

		}else{
			$sql_pages .= " AND property_price <= '$year' ";
		}
		// reseacher or title
		if($detail=="0" || $detail==""){

		}elseif($detail=="1"){
			$sql_pages .= " AND property_price <= '$detail' ";
		}elseif($detail=="2"){
			$sql_pages .= " AND property_price <= '$detail' ";
		}

		$sql3= $sql_pages ;
		$query = $this->db->query($sql3);

		$count = $query->num_rows();

		$config['base_url']=site_url()."library/search?title=$title&category=$category&major=$major&year=$year&detail=$detail";

		$config['total_rows']=$count;
		$config['per_page']=2;
		$config['uri_segment'] = 4;
		$config['page_query_string'] = TRUE;

		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '›';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '‹';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$per_page= $this->input->get('per_page');

		if($title=="0" OR $title=="" ){

		}else{
			$this->db->where('property_geo' , $title);
		}
		if($category=="0" OR $category=="" ){

		}else{
			$this->db->where('property_province' , $category);
		}
		if($category=="0"){

		}else{
			$this->db->where('property_cate' , $category);
		}
		if($major=="0" ){

		}else{
			$this->db->where('property_type' , $major);
		}
		if($year=="0" || $year==""){

		}else{
			$this->db->where('property_price <=' , $year);
		}
		if($detail=="0" || $detail==""){

		}elseif($detail=="1"){
			$this->db->where('property_price <=' , $detail);
		}elseif($detail=="1"){
			$this->db->where('property_price <=' , $detail);
		}

		$this->db->select('*');
		$this->db->from('property');
		$this->db->limit($config['per_page'], $per_page);

		$data['rs_property']=$this->db->get();


			return $data;

    }
	public function major()
	{
		// major group
		$sql_major = "select * from ebook group by ebook_major";
		$res_major=$this->db->query($sql_major)->result_array();

		return $res_major;

	}



} // end class

?>