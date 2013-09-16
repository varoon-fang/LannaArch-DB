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
		  <br class="clearfix">

		 <div class="content-section">
		   		<div class="row h1Tab bgH1Zone">
		               <span class="pull-left">
		               		<h1 class="pull-left"><a href="<?= site_url("arch/structure");?>">แบบสถาปัตยกรรม</a> &gt; <a href="<?= site_url("arch/structure_more/$res_group[layout_group_id]");?>"> <?= $res_group['layout_group_name'];?></a> &gt; <?= $res_layout['layout_title'];?> </h1>
	               		</span>
		   		</div><!--end row-->

		   		          <br class="clearfix">

   		    	<div class="row ">

	   		    	<div class="col-lg-12 col-md-12 ">

	   		    	<!-- ===  items  === -->
	   		    			   		    <div class="col-md-3 col-lg-3 col-sm-3  col-xs-3 ">

	   		    			   		    	        <img src="<?= site_url("images/layout_arch/thumbs/$res_img[layout_album_name]");?>" alt="<?= $res_layout['layout_title'];?>" class="img-responsive "/>
	   		    			   		    	        <p class="pull-right">
	   		    			   		    	          <a href="libary-book/book-example.html" target="_blank"><button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-eye-open"></span> ดูแบบ</button></a>
	   		    			   		    	        <p>

	   		    			   		    </div><!-- /.col-lg-2 -->

	   		    			   		    <div class="col-md-9 col-lg-9  ">

	   		    			   		        <h2><?= $res_layout['layout_title'];?></h2>
	   		    			   		        <p>วันที่ : <?= $res_layout['layout_date'];?></p>
	   		    			   		        <p>ผู้วาด : <?= $res_layout['layout_writer'];?> </p>
	   		    			   		        <p>รายละเอียด : <?= $res_layout['layout_detail'];?></p>
	   		    			   		    </div>

	   		    	</div><!--end-->
	    	    </div><!-- /.row -->

		 </div>

	  </section><!--end subContent-->

    </div>


   <!-- FOOTER -->

