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
		 <h1>หุ่นจำลอง</h1>
		 		<div class="content-section">
		 		   		<div class="row ">
			 		   		<?php
			 		   			foreach($rs_3d as $row){
				 		   			$id = $row['3d_id'];
				 		   			// album
									$sql_album = "select * from 3d_album where 3d_id='$id' order by 3d_album_num asc limit 1";
									 $res_album = $this->db->query($sql_album)->row_array();

			 		   		?>
		 		   			   <div class="col-lg-6 col-sm-6  col-xs-12 ">
		 		   			   	   <a class="fancybox fancybox.iframe" href="<?= site_url("architecture/hologram_detail/$id");?>">
		 		   			   	        <img src="<?= site_url("images/3d/resize/".$res_album['3d_album_name']."");?>" alt="<?= $row['3d_title'];?>" class="img-responsive"></a>
		 		   			   	        <h2><?= $row['3d_title'];?></h2>
		 		   			   	        <p><?= word_limiter($row['3d_detail'], 20);?></p>

		 		   			   </div><!-- /.col-lg-3 -->
	 		   			   <? }?>
		  		 		 </div>
		 				<!-- ==========Page Nation=========== -->


		 <div class="row">

		 <div class="text-center">

					    <ul class="pagination">
					        <?php echo $this->pagination->create_links(); ?>
					    </ul>

		  </div>

		  </div><!--end row -->

     </div>


	  </section><!--end subContent-->

</div>

   <!-- FOOTER -->