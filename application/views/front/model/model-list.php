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
	                 <span class="pull-left"><h1 class="pull-left">หุ่นจำลอง</h1> </span>
	     		</div><!--end row-->

      <br class="clearfix">


	      <section id="subContent" >

	    	  <br class="clearfix">


	    	 <div class="content-section">
	    		    	<div class="row ">
							<?php
		   		    			foreach($rs_model as $row){
		   		    				 // gallery img
									$model_img = "select * from models_album where models_id='$row[models_id]' order by models_album_num asc limit 1 ";
									$res_model_img=$this->db->query($model_img)->result_array();
										foreach($res_model_img as $rows)
										{
											$models_img = $rows['models_album_name'];
										}
		   		    		?>

	    		    		<!--====== items ======-->
	    		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
	    		    			<a href="<?= site_url("architecture/model_detail/$row[models_id]/".url_title($row['model_title'])."");?>"><img src="<?= site_url("images/models/resize/$models_img");?>" alt="<?= $row['gallery_title'];?>" class="img-responsive "/></a>
								<h2><?= character_limiter($row['models_title'], 10);?></h2>
								<p><?= word_limiter($row['models_from'], 10);?></p>

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