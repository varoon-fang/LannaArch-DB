<?php 
//error_reporting(0);

$db=1;

if($db==1){
// local
	$host = "localhost"; 
	$userwd = "root"; //user 
	$passwd = "root"; //pass 
	$dbname = "lanna_arch"; 
}else{
// Server
	$host = "localhost"; 
	$userwd = "admin_abcd"; //user 
	$passwd = "*sql-abcd*"; //pass 
	$dbname = "db_abcd"; 

}
mysql_connect($host,$userwd,$passwd) or die ("Not Connect MYSQL"); 

mysql_select_db($dbname) or die ("NOT Connect Database"); 
mysql_query("SET NAMES utf8");




?>
