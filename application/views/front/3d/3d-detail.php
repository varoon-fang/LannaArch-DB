<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>360 degrees product view</title>

        <link href="<?= site_url();?>assetss/css/rgb7style.css" rel="stylesheet">

        <script type="text/javascript" src="<?= site_url();?>assetss/js/jquery-1.4.4.min.js" ></script>
        <script type="text/javascript" src="<?= site_url();?>assetss/js/j360.js" ></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#product').j360();
            });
        </script>


    </head>


    <body  style="width: 100%px; height: 500px; overflow: hidden;" class="3dPage">

        <center>
            <div id="product" style="width: 570px; height: 320px; overflow: hidden;">
				<?php
					foreach($rs_3d_album as $fett){
				?>
					<img src="<?= site_url("images/3d/resize/".$fett['3d_album_name']."");?>" width="570px" />
				<? }?>
            </div>
            <h3><?= $rs_3d['3d_title'];?></h3>
              <?= $rs_3d['3d_detail'];?>
        </center>
    </body>
</html>
