
<!-- NAVBAR
================================================== -->
  <body class="bgBodyZone">

  <!-- Menu Header
  ================================================== -->
  <?= $this->load->view('front/temp/menu');?>



    <div class="container bgContentZone">



        <!-- Carousel
        ================================================== -->

        <div class="row">


        <div id="myCarousel" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators">
          	<?php
          		$i=0;
          		foreach($rs_banner as $fett){
			  		$i++;
          	?>
            <li data-target="#myCarousel" data-slide-to="<?= $i;?>" <? if($i==1){ echo 'class="active"';}else{}?>></li>
			<? }?>
          </ol>
          <div class="carousel-inner">
			<?php
          		$j=0;
          		foreach($rs_banner as $fett){
			  		$j++;
          	?>
            <div class="item <? if($j==1){ echo 'active';}else{}?>">

              <img src="<?= site_url("images/banner/resize/$fett[banner_head_name]");?>" alt="slide">

            </div>
			<? }?>

          </div>

          <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div><!-- /.carousel -->


     </div>

       <!--=========Activity===========-->
    <div class="content-section">

    <section id="landingActivity">




     <div class="row h1Tab bgH1Zone">

            <span class="pull-left"><h1 class="pull-left">ภาพกิจกรรม </h1></span>
           <span class="pull-right moreLink"><a href="<?= site_url("activity/more");?>">เพิ่มเติม &gt;&gt;</a></span>

      </div>

      <br class="clearfix">
	   <div class="row ">
		   <?php
		   		foreach($rs_activity as $row){
		   			$act_id = $row['activity_id'];
		   			// activity album
				$sql_act_pic = "select * from activity_album where activity_id='$act_id' order by activity_album_num asc limit 1 ";
				$res_act_pic=$this->db->query($sql_act_pic)->result_array();
					foreach($res_act_pic as $row2)
					{
						  $act_img = $row2['activity_album_name'];
					}

		   ?>
		   <div class="col-lg-3 col-sm-3  col-xs-6 ">
		   		<a href="<?= site_url("activity/detail/$act_id/".url_title($row['activity_title'])."");?>">
			        <img src="<?= site_url("images/activity/thumbs/$act_img");?>"  alt="<?= $row['acitivity_title'];?>" class="img-responsive">
		   		</a>
		        <h2><?= $row['activity_title'];?></h2>

		        <p><?= word_limiter($row['activity_detail'], 10);?></p>

		   </div><!-- /.col-lg-3 -->
		   <? }?>
		</div><!-- /.row -->


    </section><!--end activity-->

    </div>


     <!--========ฺBook Electronic===========-->
    <div class="content-section">

        <section id="landingBookOnline">

         <div class="row h1Tab bgH1Zone">

                <span class="pull-left"><h1 class="pull-left">หนังสืออิเล็กทรอนิกส์</h1></span>
                <div class="pull-right moreLink"><a href="<?= site_url("ebook/more");?>">เพิ่มเติม &gt;&gt;</a></div>

          </div>

          <br class="clearfix">

    	  <div class="row ">
			  <?php
		   		foreach($rs_ebook as $row){
		   			$book_id = $row['ebook_id'];
				// ebook album
				$sql_book_pic = "select * from ebook_album where ebook_id='$book_id' order by ebook_album_num asc limit 1 ";
				$res_book_pic=$this->db->query($sql_book_pic)->result_array();
					foreach($res_book_pic as $row2)
					{
						  $ebook_img = $row2['ebook_album_name'];
					}

			   ?>
    	   <div class="col-md-2 col-lg-2 col-sm-2  col-xs-6 ">
    	        <a href="<?= site_url("library/detail/$book_id/".url_title($row['ebook_title'])."");?>">
	    	        <img src="<?= site_url("images/ebook/img/$ebook_img");?>" width="100%" height="291px" class="img-responsive" alt="<?= $rs_ebook['ebook_name'];?>">
    	        </a>
    	        <h2><?= $row['ebook_title'];?></h2>

    	   </div><!-- /.col-lg-2 -->
		   	<? }?>

    	    </div><!-- /.row -->


        </section><!--end activity-->

        </div><!--end content-section-->

          <!--=========Lib Online===========-->
         <div class="content-section">

         <section id="landingActivity">

          <div class="row h1Tab bgH1Zone">

                 <span class="pull-left"><h1 class="pull-left">ห้องสมุดภาพ </h1></span>
                <span class="pull-right moreLink"><a href="<?= site_url("gallery/more");?>">เพิ่มเติม &gt;&gt;</a></span>

           </div>

           <br class="clearfix">


     	    <div class="row ">
		 	 <?php
		   		foreach($rs_gallery as $row){
		   			$gallery_id = $row['gallery_id'];

				// ebook album
				$sql_gallery_pic = "select * from gallery_album where gallery_id='$gallery_id' order by gallery_album_num asc limit 1 ";
				$res_gallery_pic=$this->db->query($sql_gallery_pic)->result_array();
					foreach($res_gallery_pic as $row2)
					{
						  $gallery_img = $row2['gallery_album_name'];
					}

			   ?>
	     	   <div class="col-lg-3 col-sm-3  col-xs-6 ">
	     	   		<a href="<?= site_url("gallery/detail/$gallery_id/".url_title($row['gallery_title'])."");?>">
		     	        <img src="<?= site_url("images/gallery/resize/$gallery_img");?>"  alt="<?= $rs_gallery['gallery_title'];?>" class="img-responsive">
	     	   		</a>
	     	        <h2><?= $row['gallery_title'];?></h2>
	     	        <p><?= word_limiter($row['gallery_detail'], 10);?></p>

	     	   </div><!-- /.col-lg-3 -->
		 	   <? }?>

     	    </div><!-- /.row -->


         </section><!--end lib Online-->

     </div>

   <!-- FOOTER -->

