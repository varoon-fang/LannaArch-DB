<!-- NAVBAR
================================================== -->
    <body class="bgBodyZone">

        <!-- Menu Header
================================================== -->
        <?= $this->load->view('front/temp/menu');?>

        <!--======sub Nav=======-->
		 <?= $this->load->view('front/temp/submenu');?>

        <div class="container bgContentZone">

        <!--=========Content====================-->
    <div class="content-sub-section">

	   <br class="clearfix">

	   <div class="content-section">
	     		<div class="row h1Tab bgH1Zone">
	                 <span class="pull-left"><h1 class="pull-left"><a href="<?= site_url("architecture/model");?>">หุ่นจำลอง</a> &gt; <?= $rs_model['models_title'];?></h1> </span>
	     		</div><!--end row-->

      <br class="clearfix">


      <div class="bookLibrarySearch well bgNavZoneSub">

      <h3><span class="pull-left">ชื่อ <?= $rs_model['models_title'];?></span></h3>
      <br /><br />
      <h4>รายละเอียด :</h4> <?= $rs_model['models_detail'];?>
      <br />
      </div>

	      <section id="subContent" >
	    	  <br class="clearfix">
		    	 <div class="content-section">

	    		    	<div class="row ">
	    		    		<?php
							 	foreach($rs_model_album as $row){
						 	?>
	    		    		<!--====== items ======-->
	    		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
	    		    		    <a href="<?= site_url("images/models/resize/$row[models_album_name]");?>" data-fancybox-group="gallery" class="fancybox">
	    		    				<img src="<?= site_url("images/models/thumbs/$row[models_album_name]");?>" class="img-responsive piclist"/>
    		    				</a>
	    		    		</div><!-- /.col-lg-3 -->
	    		    		<? }?>
	    		    	</div><!-- /.row -->
					</div>


	  </section><!--end subContent-->

    </div>
    </div>

   <!-- FOOTER -->
