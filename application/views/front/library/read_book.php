<!DOCTYPE html>
<html>

<head>
	<title>Ebook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="<?= site_url();?>assetss/js/1.8.3-jquery.js"></script>
    <script src="<?= site_url();?>assetss/js/jquery-ui.min.js"></script>

    <script src="<?= site_url();?>assetss/js/flipbook.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= site_url();?>assetss/css/flipbook.style.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url();?>assetss/css/flipbook.skin.white.css">

    <script type="text/javascript">

        $(document).ready(function () {
            var book1 = $("#container").flipBook({
                pages:[
                	<?php
                		foreach($rs_ebook_img as $row){
                	?>
                    {src:"<?= site_url("images/ebook/img/$row[ebook_album_name]");?>"},
                    <? }?>

                ],

                //menu
                btnNext:true,
                btnPrev:true,
                btnZoomIn:true,
                btnZoomOut:true,
                btnToc:false,
                btnThumbs:false,
                btnShare:false,
                btnExpand:true,

                startPage:0,

                pageWidth:1000,
                pageHeight:1414,
                thumbnailWidth:100,
                thumbnailHeight:141,

                flipType:'3d',

                time1:500,
                time2:600

            });

        })
    </script>

</head>

<body>
<div id="container" style=""></div>

</body>

</html>
