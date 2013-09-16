<!-- NAVBAR
================================================== -->
    <body class="bgBodyZone">

        <!-- Menu Header
================================================== -->
        <?= $this->load->view('front/temp/menu');?>

        <div class="container bgContentZone">
        <!--=========Content====================-->
    <div class="content-sub-section">


    	  <section id="subContent" >

		   <?php
			// activity group
			foreach($rs_activity as $rows){
					$activity_group = $rows['activity_group'];

				$sql_group = "select * from activity_group where activity_group_id='$activity_group'";
				$res_group = $this->db->query($sql_group);
					foreach($res_group->result_array() as $rows)
					{
						$activity_group_id = $rows['activity_group_id'];
						$activity_group_name = $rows['activity_group_name'];

					}

			?>
		 <div class="content-section">

		  <br class="clearfix">

		   		          <div class="row h1Tab bgH1Zone">
		   		              <span class="pull-left"><h1 class="pull-left"><?= $activity_group_name;?></h1> </span>
		   		              <span class="pull-right moreLink"><a href="<?= site_url("activity/more/$activity_group_id/");?>">เพิ่มเติม &gt;&gt;</a></span>
		   		          </div><!--end row-->
		   		          <br class="clearfix">

   		    	<div class="row ">
   		    		<?php
	   		    		// activity list
						$book_list = "select * from activity where activity_group='$activity_group_id' order by activity_id desc limit 4 ";
						$res_book_list=$this->db->query($book_list);
							foreach($res_book_list->result_array() as $row)
							{
								 $activity_id = $row['activity_id'];
								 $activity_name = $row['activity_title'];
								 $activity_detail = strip_tags($row['activity_detail']);
							 // activity img
							$book_img = "select * from activity_album where activity_id='$activity_id' order by activity_album_num asc limit 1 ";
							$res_book_img=$this->db->query($book_img)->result_array();
								foreach($res_book_img as $row)
								{
									$activity_img = $row['activity_album_name'];
								}

	   		    	?>
   		    		<!--====== items ======-->
   		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
   		    			<a href="<?= site_url("activity/detail/$activity_id");?>"><img src="<?= site_url("images/activity/thumbs/$activity_img");?>" alt="<?= $activity_name;?>" class="img-responsive "/></a>
   		    	        <h2><?= word_limiter($activity_name, 5);?></h2>
   		    	        <p><?= word_limiter($activity_detail, 10);?></p>

   		    		</div><!-- /.col-lg-3 -->
   					<? }?>
				</div> <!-- end row -->
				<? }?>
			</div> <!-- end content-section -->
		</section><!--end subContent-->
    </div>
   <!-- FOOTER -->