
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>360 degrees product view</title>
        <script type="text/javascript" src="js/jquery-1.4.4.min.js" ></script>
        <script type="text/javascript" src="js/j360.js" ></script>
    </head>
    <body>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#product').j360();
            });
        </script>
        <center>
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
            <div id="product" style="width: 640px; height: 480px; overflow: hidden;">
                <?php
                	$sql = mysql_query("select * from 3d_album where 3d_id='13' order by 3d_album_num asc");
                		while($row=mysql_fetch_array($sql)){
                			$img =$row['3d_album_name'];
                ?>
                <img src="<?= "../../../images/3d/thumbs/$img";?>" />
                <? }?>
            </div>
        </center>
    </body>
</html>
