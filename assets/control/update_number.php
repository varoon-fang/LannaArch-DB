<?php 
	include_once("connect.php");


$action 				= mysql_real_escape_string($_POST['action']); 
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecord"){
			
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		
		$query = "update 3d_album set 3d_album_num = " . $listingCounter . " where 3d_album_id = " . $recordIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;	
	}
	
//	echo '<pre>';
//	print_r($updateRecordsArray);
//	print_r($text.$status);
//	echo '</pre>';
//	echo 'If you refresh the page, you will see that records will stay just as you modified.';
}
?>