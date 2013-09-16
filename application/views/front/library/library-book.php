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
		<br>
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

		 <?php
		// ebook group
			foreach($rs_ebook as $rows){
					$ebook_group = $rows['ebook_group'];

				$sql_book_group = "select * from ebook_group where ebook_group_id='$ebook_group'";
				$res_group = $this->db->query($sql_book_group);
					foreach($res_group->result_array() as $rows)
					{
						$ebook_group_id = $rows['ebook_group_id'];
						$ebook_group_name = $rows['ebook_group_name'];

					}

			?>
			 <div class="content-section ">

		   		<div class="row h1Tab bgH1Zone">
	                <span class="pull-left"><h1 class="pull-left"><?= $ebook_group_name;?></h1></span>
	                <div class="pull-right moreLink"><a href="<?= site_url("library/more/$ebook_group_id");?>">เพิ่มเติม &gt;&gt;</a></div>
		   		</div>
		   		<br class="clearfix">
	   		    <div class="row ">
	   		    	<?php
	   		    		// ebook list
						$book_list = "select * from ebook where ebook_group='$ebook_group_id' order by ebook_id desc limit 4 ";
						$res_book_list=$this->db->query($book_list);
							foreach($res_book_list->result_array() as $row)
							{
								 $ebook_id= $row['ebook_id'];
								 $ebook_name= $row['ebook_title'];
							 // ebook img
							$book_img = "select * from ebook_album where ebook_id='$ebook_id' order by ebook_album_num asc limit 1 ";
							$res_book_img=$this->db->query($book_img)->result_array();
								foreach($res_book_img as $row)
								{
									$ebook_img = $row['ebook_album_name'];
								}

	   		    	?>
		   		    <!-- ===  items  === -->
		   		    <div class="col-md-2 col-lg-2 col-sm-2  col-xs-6 ">
		   		    	   <a href="<?= site_url("library/detail/$ebook_id/".url_title($ebook_name)."");?>">
		   		    	        <img src="<?= site_url("images/ebook/img/$ebook_img");?>" width="100%" height="291px" class="img-responsive" />
		   		    	        <p><?= $ebook_name;?></p>
		   		      </a>
		   		    </div><!-- /.col-lg-2 -->
		   			<? }?>
		   		</div><!-- /.row -->
		 </div>
		 <?
			} // end loop ebook group
		 ?>

 </section><!--end subContent-->

    </div>


   <!-- FOOTER -->