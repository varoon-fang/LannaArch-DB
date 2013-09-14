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
	  <br>
	  <ol class="breadcrumb">
	    <li><a href="<?= site_url("libarary");?>">ห้องสมุดหนังสือ</a></li>
	    <li><a href="<?= site_url("libarary/more/$rs_ebook_group[ebook_group_id]");?>"><?= $rs_ebook_group['ebook_group_name'];?></a></li>
	    <li class="active"><?= $rs_ebook['ebook_title'];?></li>
	  </ol>

		 <div class="content-section">

		   		<br class="clearfix">
	   		    <div class="row ">

		   		    <!-- ===  items  === -->
		   		    <div class="col-md-3 col-lg-3 col-sm-3  col-xs-3 ">

		   		    	        <img src="<?= site_url("images/ebook/img/$rs_ebook_img[ebook_album_name]");?>" class="img-responsive" />
		   		    	        <p class="pull-right">
		   		    	          <a href="libary-book/book-example.html" target="_blank"><button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-eye-open"></span> อ่านหนังสือ</button></a>
		   		    	        <p>

		   		    </div><!-- /.col-lg-2 -->

		   		    <div class="col-md-9 col-lg-9  ">

		   		        <h2><?= $rs_ebook['ebook_title'];?> </h2>
		   		        <p>วันที่ : <?= $rs_ebook['ebook_date'];?></p>
		   		        <p>คณะ : <?= $rs_ebook['ebook_major'];?></p>
		   		        <p>ผู้วิจัย : <?= $rs_ebook['ebook_researcher'];?></p>
		   		        <p>ปีที่วิจัย : <?= $rs_ebook['ebook_research_year'];?></p>
		   		        <p class="pull-right">
		   		        <a href="<?= site_url("images/ebook/$rs_ebook[ebook_example]");?>" target="_blank"><button type="button" class="btn btn-default btn-md"><span class="glyphicon glyphicon-download"></span>ตัวอย่างงานวิจัย</button></a>
		   		           <!--  <a href="#" target="_blank"><button type="button" class="btn btn-default btn-md"><span class="glyphicon glyphicon-download"></span> Download</button></a> -->
		   		        <p>



		   		    </div>

		   		</div><!-- /.row -->
		 </div>


 </section><!--end subContent-->

    </div>


   <!-- FOOTER -->