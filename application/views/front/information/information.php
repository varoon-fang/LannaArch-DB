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
			// information group
			foreach($rs_information as $rows){
					$information_group = $rows['information_group'];

				$sql_group = "select * from information_group where information_group_id='$information_group'";
				$res_group = $this->db->query($sql_group);
					foreach($res_group->result_array() as $rows)
					{
						$information_group_id = $rows['information_group_id'];
						$information_group_name = $rows['information_group_name'];

					}

			?>
		 <div class="content-section">

		  <br class="clearfix">

		   		          <div class="row h1Tab bgH1Zone">
		   		              <span class="pull-left"><h1 class="pull-left"><?= $information_group_name;?></h1> </span>
		   		              <span class="pull-right moreLink"><a href="<?= site_url("arch/information_more/$information_group_id/");?>">เพิ่มเติม &gt;&gt;</a></span>
		   		          </div><!--end row-->
		   		          <br class="clearfix">

   		    	<div class="row ">
   		    		<?php
	   		    		// information list
						$book_list = "select * from information where information_group='$information_group_id' order by information_id desc limit 4 ";
						$res_book_list=$this->db->query($book_list);
							foreach($res_book_list->result_array() as $row)
							{
								 $information_id = $row['information_id'];
								 $information_name = $row['information_title'];
								 $information_detail = strip_tags($row['information_detail']);
							 // information img
							$book_img = "select * from information_album where information_id='$information_id' order by information_album_num asc limit 1 ";
							$res_book_img=$this->db->query($book_img)->result_array();
								foreach($res_book_img as $row)
								{
									$information_img = $row['information_album_name'];
								}

	   		    	?>
   		    		<!--====== items ======-->
   		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
   		    			<a href="<?= site_url("arch/information_detail/$information_id");?>"><img src="<?= site_url("images/information/thumbs/$information_img");?>" alt="<?= $information_name;?>" class="img-responsive "/></a>
   		    	        <h2><?= word_limiter($information_name, 5);?></h2>
   		    	        <p><?= word_limiter($information_detail, 10);?></p>

   		    		</div><!-- /.col-lg-3 -->
   					<? }?>
				</div> <!-- end row -->
				<? }?>
			</div> <!-- end content-section -->
		</section><!--end subContent-->
    </div>
   <!-- FOOTER -->