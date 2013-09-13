<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Banner_top extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function banner_main()
	{
		// banner top
	 	$query_banner1="select * from banner_head order by RAND() limit 1";
  			$rs_banner1=$this->db->query($query_banner1);
  				foreach( $rs_banner1->result_array() as $row)
  				{
  					$banner1=$row['banner_head_name'];
  				}
  				return $banner1;
	}
		
	public function banner_list()
	{
		// banner top
	 	$query_banner="select * from banner_top order by RAND() limit 1";
  			$rs_banner=$this->db->query($query_banner);
  				foreach( $rs_banner->result_array() as $row)
  				{
  					$banner=$row['banner_top_name'];
  				}
  				return $banner;
	}
	
	public function banner_right()
	{
		// banner top
	 	$query_banner2="select * from banner_buttom order by RAND() limit 2";
  			$rs_banner2=$this->db->query($query_banner2);
  				
  				return $rs_banner2;
	}
	
	public function banner_buttom()
	{
		// banner top
	 	$query_banner3="select * from banner_size order by RAND() limit 3";
  			$rs_banner3=$this->db->query($query_banner3);
  				
  				return $rs_banner3;
	}
	
	

} // end class	
	
?>