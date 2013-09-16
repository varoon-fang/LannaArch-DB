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


    	  <section id="subContent" >

		   <?php
			// gallery group
			foreach($rs_gallery as $rows){
					$gallery_group = $rows['gallery_group'];

				$sql_group = "select * from gallery_group where gallery_group_id='$gallery_group'";
				$res_group = $this->db->query($sql_group);
					foreach($res_group->result_array() as $rows)
					{
						$gallery_group_id = $rows['gallery_group_id'];
						$gallery_group_name = $rows['gallery_group_name'];

					}

			?>
		 <div class="content-section">

		  <br class="clearfix">

		   		          <div class="row h1Tab bgH1Zone">
		   		              <span class="pull-left"><h1 class="pull-left"><?= $gallery_group_name;?></h1> </span>
		   		              <span class="pull-right moreLink"><a href="<?= site_url("gallery/more/$gallery_group_id/");?>">เพิ่มเติม &gt;&gt;</a></span>
		   		          </div><!--end row-->
		   		          <br class="clearfix">

   		    	<div class="row ">
   		    		<?php
	   		    		// gallery list
						$book_list = "select * from gallery where gallery_group='$gallery_group_id' order by gallery_id desc limit 4 ";
						$res_book_list=$this->db->query($book_list);
							foreach($res_book_list->result_array() as $row)
							{
								 $gallery_id = $row['gallery_id'];
								 $gallery_name = $row['gallery_title'];
								 $gallery_detail = strip_tags($row['gallery_from']);
							 // gallery img
							$book_img = "select * from gallery_album where gallery_id='$gallery_id' order by gallery_album_num asc limit 1 ";
							$res_book_img=$this->db->query($book_img)->result_array();
								foreach($res_book_img as $row)
								{
									$gallery_img = $row['gallery_album_name'];
								}

	   		    	?>
   		    		<!--====== items ======-->
   		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
   		    			<a href="<?= site_url("gallery/detail/$gallery_id");?>"><img src="<?= site_url("images/gallery/resize/$gallery_img");?>" alt="<?= $gallery_name;?>" class="img-responsive "/></a>
   		    	        <h2><?= word_limiter($gallery_name, 5);?></h2>
   		    	        <p><?= word_limiter($gallery_detail, 10);?></p>

   		    		</div><!-- /.col-lg-3 -->
   					<? }?>
				</div> <!-- end row -->
				<? }?>
			</div> <!-- end content-section -->
		</section><!--end subContent-->
    </div>
   <!-- FOOTER -->