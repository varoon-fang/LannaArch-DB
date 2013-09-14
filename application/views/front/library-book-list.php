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
		 <div class="bookLibrarySearch well bgNavZoneSub">
			 <h3>ค้นหา</h3>

			 <form class="form-inline" role="form">
			  	<input class="form-control" id="focusedInput" type="text" value="This is focused...">

			  	<div class="form-group ">
			  	    <label for="exampleInputEmail1">หมวดหมู่</label>
			  	    <select class="form-control ">
			  	      <option>หนังสือ</option>
			  	      <option>2</option>
			  	      <option>3</option>
			  	      <option>4</option>
			  	      <option>5</option>
			  	    </select>
			  	  </div>


			  	    <div class="form-group">
			  	        <label for="exampleInputEmail1">วันที่</label>
			  	        <select class="form-control">
			  	          <option>หนังสือ</option>
			  	          <option>2</option>
			  	          <option>3</option>
			  	          <option>4</option>
			  	          <option>5</option>
			  	        </select>
			  	      </div>

			  	      	      <div class=" form-group ">

			  	      			  	          <div class="form-inline">

			  	      					  	      <div class="checkbox">
			  	      					  	          <label>
			  	      					  	            <input type="checkbox"> ผู้แต่ง
			  	      					  	          </label>
			  	      					  	          <label>
			  	      					  	            <input type="checkbox"> อ้างอิง
			  	      					  	          </label>
			  	      					  	        </div>

			  	      			  	         </div>

			  	                            </div>


			  	      <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>
    			 </form>
		 </div>
		 <div class="content-section">
		   		<div class="row h1Tab bgH1Zone">
	                <span class="pull-left"><h1 class="pull-left"><a href="<?= site_url("library");?>">ห้องสมุดออนไลน์</a>  &gt;  <?= $ebook_group_name;?></h1></span>
   		        </div>
   		        <br class="clearfix">
   		    	<div class="row ">
   		    		<?php
   		    			foreach($rs_ebook as $row){
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