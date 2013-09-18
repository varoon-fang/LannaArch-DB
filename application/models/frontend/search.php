<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Model {

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

	public function major()
	{
		// major group
		$sql_major = "select * from ebook group by ebook_major";
		$res_major=$this->db->query($sql_major)->result_array();

		return $res_major;

	}



} // end class

?>