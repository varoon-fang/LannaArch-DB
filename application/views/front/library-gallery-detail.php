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
	                 <span class="pull-left"><h1 class="pull-left"><a href="<?= site_url("gallery");?>">ห้องสมุดภาพวาด</a> &gt; <a href="<?= site_url("gallery/more/".$res_gallery['gallery_group']."");?>"><?= $res_group['gallery_group_name'];?></a> &gt; <?= $res_gallery['gallery_title'];?></h1> </span>
	     		</div><!--end row-->

      <br class="clearfix">


      <div class="bookLibrarySearch well bgNavZoneSub">

      <h4><span class="pull-left">ชื่อภาพ <?= $res_gallery['gallery_title'];?></span></h4>
      <h4><span class="pull-right">ที่มาของภาพ : <?= $res_gallery['gallery_from'];?></span></h4>
      <br />
      </div>

	      <section id="subContent" >
	    	  <br class="clearfix">
		    	 <div class="content-section">

	    		    	<div class="row ">
	    		    		<?php
							 	foreach($rs_gallery_album as $row){
						 	?>
	    		    		<!--====== items ======-->
	    		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
	    		    			<a href="<?= site_url("images/gallery/resize/$row[gallery_album_name]");?>" class="fancybox">
	    		    				<img src="<?= site_url("images/gallery/thumbs/$row[gallery_album_name]");?>" class="img-responsive piclist"/>
    		    				</a>
	    		    		</div><!-- /.col-lg-3 -->
	    		    		<? }?>
	    		    	</div><!-- /.row -->
					</div>

	 		<!-- ==========Page Nation=========== -->
		 <div class="row">
			 <div class="text-center">
			    <ul class="pagination">
				     <li><?php echo $this->pagination->create_links(); ?></li>
			    </ul>
		  </div>
		 </div><!--end row -->


	  </section><!--end subContent-->

    </div>
    </div>

   <!-- FOOTER -->
