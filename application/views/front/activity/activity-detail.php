<!-- NAVBAR
================================================== -->
    <body class="bgBodyZone">

        <!-- Menu Header
================================================== -->
        <?= $this->load->view('front/temp/menu');?>

        <div class="container bgContentZone">

        <!--=========Content====================-->
    <div class="content-sub-section">

	   <br class="clearfix">

	   <div class="content-section">
	     		<div class="row h1Tab bgH1Zone">
	                 <span class="pull-left"><h1 class="pull-left"><a href="<?= site_url("activity");?>">กิจกรรม</a> &gt; <a href="<?= site_url("activity/more/".$res_activity['activity_group']."");?>"><?= $res_group['activity_group_name'];?></a> &gt; <?= $res_activity['activity_title'];?></h1> </span>
	     		</div><!--end row-->

      <br class="clearfix">

	  <div class="bookLibrarySearch well bgNavZoneSub">
      <p><?= osdate("%d %B %Y, %H:%M", $res_activity['activity_date'], 'ISO-8859-7');?></p>
     <h5> <?= $res_activity['activity_detail'];?></h5>

      <br />
      </div>

	      <section id="subContent" >
	    	  <br class="clearfix">
		    	 <div class="content-section">

	    		    	<div class="row ">
	    		    		<?php
							 	foreach($rs_activity_album as $row){
						 	?>
	    		    		<!--====== items ======-->
	    		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
	    		    			<a href="<?= site_url("images/activity/resize/$row[activity_album_name]");?>" data-fancybox-group="activity" class="fancybox">
	    		    				<img src="<?= site_url("images/activity/thumbs/$row[activity_album_name]");?>" class="img-responsive piclist"/>
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
