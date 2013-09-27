<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Converts date words to given location and format
 *
 * @access	public
 * @param	mixed
 * @return	string
 */
if ( ! function_exists('osdate'))
{

	function osdate($format, $datetime, $encode)
	{
	
		$CI =& get_instance();
		
		setlocale(LC_ALL, $CI->config->item('language'));
	
		$date = strftime($format, strtotime($datetime));
		
		return iconv($encode, 'UTF-8', $date);
	
	}

}

/* End of file osdate_helper.php */
/* Location: ./system/helpers/osdate_helper.php */