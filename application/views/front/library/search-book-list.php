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
    <div class="content-sub-section bookOnline">

	  <section id="subContent" >
		 <br class="clearfix">
		 <?= $this->load->view('front/temp/search');?>

		 <div class="content-section">
		   		<div class="row h1Tab bgH1Zone">
	                <span class="pull-left"><h1 class="pull-left"><a href="<?= site_url("library");?>">ห้องสมุดออนไลน์</a>  &gt; ค้นหาหนังสือ &gt;<?= $search;?> </h1></span>
   		        </div>
   		        <br class="clearfix">
   		    	<div class="row ">
   		    		<?php
   		    			//echo $search_result->result_array()->num_rows();

   		    			foreach($search_result as $row){
   		    				 // ebook img
							$book_img = "select * from ebook_album where ebook_id='$row[ebook_id]' order by ebook_album_num asc limit 1 ";
							$res_book_img=$this->db->query($book_img)->result_array();
								foreach($res_book_img as $rows)
								{
									$ebook_img = $rows['ebook_album_name'];
								}
   		    		?>
   		    	   <!-- ===  items  === -->
   		    	   <div class="col-md-2 col-lg-2 col-sm-2  col-xs-6 ">
	   		    	   <a href="<?= site_url("library/detail/$row[ebook_id]/".url_title($row['ebook_title'])."");?>">
		   		    	        <img src="<?= site_url("images/ebook/img/$ebook_img");?>" width="100%" height="291px" class="img-responsive" />	   		    	        <p><?= $row['ebook_title'];?></p>
		    	        </a>
   		    	   </div><!-- /.col-lg-2 -->
   		    	   <? }?>

		    	 </div><!-- /.row -->
		 </div><!--end content-section-->
		<!-- ==========Page Nation=========== -->
		 <div class="row">
			 <div class="text-center">
				    <ul class="pagination">
				       <?php echo $this->pagination->create_links(); ?>
				    </ul>
			  </div>
		  </div><!--end row -->

	  </section><!--end subContent-->
    </div><!--end content-sub-section-->
   <!-- FOOTER -->