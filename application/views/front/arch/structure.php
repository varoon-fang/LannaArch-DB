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
			// layout group
			foreach($rs_layout as $rows){
					$layout_group = $rows['layout_group'];

				$sql_group = "select * from layout_group where layout_group_id='$layout_group'";
				$res_group = $this->db->query($sql_group);
					foreach($res_group->result_array() as $rows)
					{
						$layout_group_id = $rows['layout_group_id'];
						$layout_group_name = $rows['layout_group_name'];

					}

			?>
		 <div class="content-section">

		  <br class="clearfix">

		   		          <div class="row h1Tab bgH1Zone">
		   		              <span class="pull-left"><h1 class="pull-left"><?= $layout_group_name;?></h1> </span>
		   		              <span class="pull-right moreLink"><a href="<?= site_url("architecture/structure_more/$layout_group_id/");?>">เพิ่มเติม &gt;&gt;</a></span>
		   		          </div><!--end row-->
		   		          <br class="clearfix">

   		    	<div class="row ">
   		    		<?php
	   		    		// layout list
						$book_list = "select * from layout_arch where layout_group='$layout_group_id' order by layout_id desc limit 4 ";
						$res_book_list=$this->db->query($book_list);
							foreach($res_book_list->result_array() as $row)
							{
								 $layout_id = $row['layout_id'];
								 $layout_name = $row['layout_title'];
								 $layout_detail = strip_tags($row['layout_detail']);
							 // layout img
							$book_img = "select * from layout_album where layout_id='$layout_id' order by layout_album_num asc limit 1 ";
							$res_book_img=$this->db->query($book_img)->result_array();
								foreach($res_book_img as $row)
								{
									$layout_img = $row['layout_album_name'];
								}

	   		    	?>
   		    		<!--====== items ======-->
   		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
   		    			<a href="<?= site_url("arch/structure_detail/$layout_id");?>"><img src="<?= site_url("images/layout_arch/thumbs/$layout_img");?>" alt="<?= $layout_name;?>" class="img-responsive "/></a>
   		    	        <h2><?= word_limiter($layout_name, 5);?></h2>
   		    	        <p><?= word_limiter($layout_detail, 10);?></p>

   		    		</div><!-- /.col-lg-3 -->
   					<? }?>
				</div> <!-- end row -->
				<? }?>
			</div> <!-- end content-section -->
		</section><!--end subContent-->
    </div>
   <!-- FOOTER -->