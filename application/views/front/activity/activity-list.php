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
	                 <span class="pull-left"><h1 class="pull-left"><a href="<?= site_url("activity");?>">กิจกรรม</a> &gt; <?= $res_group['activity_group_name'];?></h1> </span>
	     		</div><!--end row-->

      <br class="clearfix">


	      <section id="subContent" >

	    	  <br class="clearfix">


	    	 <div class="content-section">
	    		    	<div class="row ">
							<?php
		   		    			foreach($rs_activity as $row){
		   		    				 // activity img
									$book_img = "select * from activity_album where activity_id='$row[activity_id]' order by activity_album_num asc limit 1 ";
									$res_book_img=$this->db->query($book_img)->result_array();
										foreach($res_book_img as $rows)
										{
											$activity_img = $rows['activity_album_name'];
										}
		   		    		?>

	    		    		<!--====== items ======-->
	    		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
	    		    			<a href="<?= site_url("activity/detail/$row[activity_id]/".url_title($row['activity_title'])."");?>"><img src="<?= site_url("images/activity/resize/$activity_img");?>" alt="<?= $row['activity_title'];?>" class="img-responsive "/></a>
								<h2><?= word_limiter($row['activity_title'], 5);?></h2>
								<p><?= word_limiter($row['activity_detail'], 10);?></p>

	    		    		</div><!-- /.col-lg-3 -->
							<? }?>
	    		    	</div><!-- /.row -->
		    </div><!-- end content-section -->

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