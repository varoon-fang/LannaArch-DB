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
	                 <span class="pull-left"><h1 class="pull-left"><a href="<?= site_url("gallery");?>">ห้องสมุดภาพวาด</a> &gt; <?= $res_group['gallery_group_name'];?></h1> </span>
	     		</div><!--end row-->

      <br class="clearfix">


	      <section id="subContent" >

	    	  <br class="clearfix">


	    	 <div class="content-section">
	    		    	<div class="row ">
							<?php
		   		    			foreach($rs_gallery as $row){
		   		    				 // gallery img
									$book_img = "select * from gallery_album where gallery_id='$row[gallery_id]' order by gallery_album_num asc limit 1 ";
									$res_book_img=$this->db->query($book_img)->result_array();
										foreach($res_book_img as $rows)
										{
											$gallery_img = $rows['gallery_album_name'];
										}
		   		    		?>

	    		    		<!--====== items ======-->
	    		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
	    		    			<a href="<?= site_url("gallery/detail/$row[gallery_id]/".url_title($row['gallery_title'])."");?>"><img src="<?= site_url("images/gallery/resize/$gallery_img");?>" alt="<?= $row['gallery_title'];?>" class="img-responsive "/></a>
								<h2><?= word_limiter($row['gallery_title'], 5);?></h2>
								<p><?= word_limiter($row['gallery_from'], 10);?></p>

	    		    		</div><!-- /.col-lg-3 -->
							<? }?>
	    		    	</div><!-- /.row -->
		    </div><!-- end content-section -->

	 		<!-- ==========Page Nation=========== -->
		 <div class="row">
			 <div class="text-center">
			    <ul class="pagination">
				     <?php echo $this->pagination->create_links(); ?>
			    </ul>
		  </div>
		 </div><!--end row -->



	  </section><!--end subContent-->

    </div>
    </div>

   <!-- FOOTER -->