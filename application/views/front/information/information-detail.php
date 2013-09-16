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
	                 <span class="pull-left"><h1 class="pull-left"><a href="<?= site_url("architecture/information");?>">ข้อมูลทั่วไป</a> &gt; <a href="<?= site_url("architecture/information_more/".$res_information['information_group']."");?>"><?= $res_group['information_group_name'];?></a> &gt; <?= $res_information['information_title'];?></h1> </span>
	     		</div><!--end row-->

      <br class="clearfix">

	  <div class="bookLibrarySearch well bgNavZoneSub">
      <p><?= $res_information['information_date'];?></p>
     <h5> <?= $res_information['information_detail'];?></h5>

      <br />
      </div>

	      <section id="subContent" >
	    	  <br class="clearfix">
		    	 <div class="content-section">

	    		    	<div class="row ">
	    		    		<?php
							 	foreach($rs_information_album as $row){
						 	?>
	    		    		<!--====== items ======-->
	    		    		<div class="col-lg-3 col-sm-3  col-xs-6 ">
	    		    			<a href="<?= site_url("images/information/resize/$row[information_album_name]");?>" class="fancybox">
	    		    				<img src="<?= site_url("images/information/thumbs/$row[information_album_name]");?>" class="img-responsive piclist"/>
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
