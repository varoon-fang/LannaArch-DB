<?php

	$this->load->view('admin/components/page_head');

	$idd= $this->uri->segment(4);
 ?>
<!-- img preview -->
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.min.js');?>"></script>
<!-- Drag & Drop -->
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery-1.3.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery-ui-1.7.1.custom.min.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$(function() {
			$("#image_zone ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
				var order = $(this).sortable("serialize") + '&action=updateRecord';
				$.post("<?= site_url("admin/ebook/update_number");?>", order, function(theResponse){
					$("#contentRight").html(theResponse);
				});
			}
			});
		});

	});
	</script>
<?php $this->load->view('admin/components/page_subhead');?>


          <div class="span9">

         <h3><a href="<?= site_url("admin/ebook/view/$rs[ebook_group]");?>"><i class="icon-arrow-left back-link"></i></a> แก้ไขข้อมูลห้องสมุดหนังสือ</h3>
         <br />
         <? echo $this->session->flashdata('feedback_edit');?>

        <?= form_open("admin/ebook/edit/".$this->uri->segment(4), array('id' =>'contact-form', 'name' =>'myform'));?>

	      <!-- // inputnormal -->
		  <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>

    		<div class="control-group">
	    	  <label class="control-label" for="name">หมวดหมู่ :</label>
	    	  <div class="controls">
	    	    <select name="group" required="reauired">
	    	    	<?php
	    	    		foreach($list_cate->result_array() as $row)
	    	    		{
	    	    	?>
	    	    	<option value="<?= $row['ebook_group_id'];?>" <? if($row['ebook_group_id']==$rs['ebook_group']){ echo "selected";}else{}?>><?= $row['ebook_group_name'];?></option>
	    	    	<? }?>
	    	    </select>
	    	  </div>
	    	</div>

	    	 <div class="control-group">
	    	  <label class="control-label" for="name">คณะฯ : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…"  name="major" value="<?= $rs['ebook_major'];?>" class="span6" id="major">
	    	  </div>
	    	</div>

	    	<div class="control-group">
	    	  <label class="control-label" for="name">ชื่อหนังสือ : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…"  name="title_th" value="<?= $rs['ebook_title'];?>" class="span6" id="title_th">
	    	  </div>
	    	</div>

	    	<div class="control-group">
	    	  <label class="control-label" for="name">ชื่อผู้วิจัย : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…"  name="research" value="<?= $rs['ebook_researcher'];?>" class="span6" id="research">
	    	  </div>
	    	</div>

	    	<div class="control-group">
	    	  <label class="control-label" for="name">ปีที่วิจัย : </label>
	    	  <div class="controls">
	    	    <select name="year">
	    	    	<?php
	    	    		$now=date("Y");
	    	    		for($i=$now;$i>=2000;$i--){
		    	    ?>
		    	    	<option value="<?= $i;?>" <? if($rs['ebook_research_year']==$i){ echo "selected";}?>><?= $i;?></option>
	    	    	<? }?>
	    	    </select>
	    	  </div>
	    	</div>
		</div> <!-- well -->
				<br/>
				<div class="well">
					<p><span class="badge badge-inverse">2.</span> <strong>( ข้อมูลไฟล์เอกสาร )</strong></p>
					<?php
						if($rs['ebook_example']=="" OR $rs['ebook_example']=="NULL"){
					?>
					<div class="control-group">
					<label class="control-label">เพิ่มไฟล์ตัวอย่างงานวิจัย</label>
						<div class="controls">
							<a data-toggle="modal" class="btn btn-warning" href="#PopExamModel"><span class="icon-plus icon-white"></span> Add </a>
						</div>
					</div>
					<?	}else{ ?>
						<div class="control-group">
						<label class="control-label">ไฟล์ตัวอย่างงานวิจัย</label>
							<div class="controls">
								<p><a href="<?= site_url("images/ebook/$rs[ebook_example]");?>" target="_blank"><?= $rs[ebook_example];?></a></p>
								<a class="btn btn-danger" onclick="return confirm('Delete ?')" href="<?= site_url("admin/ebook/delete_file_example/$rs[ebook_example]");?>">Delete</a>
							</div>

						</div>
					<? }?>

					<?php
						if($rs['ebook_pdf']=="" OR $rs['ebook_pdf']=="NULL"){
					?>
					<div class="control-group">
					<label class="control-label">เพิ่มไฟล์งานวิจัย</label>
						<div class="controls">
							<a data-toggle="modal" class="btn btn-warning" href="#PopPDFModel"><span class="icon-plus icon-white"></span> Add </a>
						</div>
					</div>
					<?	}else{ ?>
						<div class="control-group">
						<label class="control-label">ไฟล์งานวิจัย</label>
							<div class="controls">
								<p><a href="<?= site_url("images/ebook/$rs[ebook_pdf]");?>" target="_blank"><?= $rs[ebook_pdf];?></a></p>
								<a class="btn btn-danger" onclick="return confirm('Delete ?')" href="<?= site_url("admin/ebook/delete_file/$rs[ebook_pdf]");?>">Delete</a>
							</div>

						</div>
					<? }?>
				</div><!-- well-->

				<!--=====Picture Addd=======-->
	    	<div class="well">
              <p><span class="badge badge-inverse">3.</span> <strong>( ข้อมูลรูปภาพ )</strong></p>
                 <br />

               	      		<? echo $this->session->flashdata('feedback');?>
							 <ul class="thumbnails">
								 <li class="span4">
									 <a data-toggle="modal" class="btn btn-large btn-primary" href="#loginModal"><span class="icon-plus icon-white"></span> Add </a>

								 <? if($numrow=="0"){ }else{?>
		                   	       <input type="submit" name="del_img" onclick="return confirm('Delete?')"  class="btn btn-large btn-danger" value="Delete Check">

		                   	     <? }?>
		                   	     </li>
		                   	 </ul>
							<div id="image_zone">
								<ul class="thumbnails" >
								<?php
									$i=0;
									foreach($rs_ebook_img->result_array() as $fett){
									$i++;
										$name_img = $fett['ebook_album_name'];
										$id_img = $fett['ebook_album_id'];
								?>
								<li class="span2" id="recordsArray_<?= $id_img; ?>" >
								    <div class="thumbnail">
								    <img src="<?= site_url("images/ebook/img/$name_img");?>" alt="<?=$name_img;?>">
									    <div class="caption">
									    <p><label class="checkbox"><input name="img_id[]" type="checkbox" value="<?= $id_img?>" />Delete</label></p>
											<p align="center"><a href="<?= site_url("admin/ebook/delete_image/$id_img");?>" onclick="return confirm('Delete?')" class="btn btn-warning btn-block">Delete</a></p>
									    </div>
								    </div>
							    </li>
		            			<? }?>
								</ul>
							</div>

             </div> <!-- well -->

	    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Edit">
	    	<input type="reset" class="btn btn-large" value="Cancel">

	     <?= form_close();?>

      </div><!--/span-->

<!-- MODEL Upload PDF -->

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="PopPDFModel" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" onclick="javascript:window.location.reload();" type="button"></button>
					<h3>Upload</h3>
				</div>
				<div class="modal-body">
				<?= form_open_multipart('admin/ebook/upload_pdf', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs['ebook_id'];?>" name="id_ebook" >

		        	<div class="control-group">
						<label class="control-label">ไฟล์งานวิจัย</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="icon-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-file">
									<span class="fileupload-new">Select file</span>
									<span class="fileupload-exists">Change</span>
									<input type="file" name="file_pdf" class="default" />
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
						</div>
					</div>
					<br />
	    <input type="submit" name="upload_img" class="btn btn-primary" data-loading-text="Loading now..." value="Confirm Upload">
	    <button onclick="javascript:window.location.reload();" class="btn" data-dismiss="modal">Close</button>
    <?= form_close();?>
				</div>
			</div>
    <!-- END MODEL -->

<!-- MODEL Upload Image -->

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="PopExamModel" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" onclick="javascript:window.location.reload();" type="button"></button>
					<h3>Upload</h3>
				</div>
				<div class="modal-body">
				<?= form_open_multipart('admin/ebook/upload_example', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs['ebook_id'];?>" name="id_ebook" >

		        	<div class="control-group">
						<label class="control-label">ตัวอย่างงานวิจัย</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="icon-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-file">
									<span class="fileupload-new">Select file</span>
									<span class="fileupload-exists">Change</span>
									<input type="file" name="file_example" class="default" />
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
						</div>
					</div>
					<br />
	    <input type="submit" name="upload_img" class="btn btn-primary " data-loading-text="Loading now..." value="Confirm Upload">
	    <button onclick="javascript:window.location.reload();" class="btn" data-dismiss="modal">Close</button>
    <?= form_close();?>
				</div>
			</div>
    <!-- END MODEL -->

<!-- Upload image -->
    <div class="modal hide" id="loginModal">
    	<div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">✕</button>
	    	<h3>Upload images</h3>
    	</div>

    <div class="modal-body" style="text-align:center;">
	    <div class="row-fluid">
		    <div class="span9">
			    <div id="modalTab">
				    <div class="tab-content">
					    <div class="tab-pane active" id="login">
    <?= form_open_multipart('admin/ebook/edit_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

	   	<input  type="hidden" value="<?= $rs['ebook_id'];?>" name="id_ebook" >

        	<div class="fileupload fileupload-new" data-provides="fileupload">
			<div class="input-append">
			<div class="uneditable-input span2"><i class="icon-file fileupload-exists"></i>
				<span class="fileupload-preview"></span>
			</div>
			<span class="btn btn-file"><span class="fileupload-new">Select Multi File</span>
			<span class="fileupload-exists">Change</span>
			<input type="file" multiple="multiple" name="userfile[]" id="multiUpload" />
			</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
			</div>
			</div>


	    <p>

	    <input type="submit" name="upload_img" class="btn btn-meduim btn-primary btn-progress" data-loading-text="Loading now..." value="Confirm Upload">
	    <button onclick="javascript:window.location.reload();" class="btn btn-danger" data-dismiss="modal">Close</button>
	    </p>
    <?= form_close();?>

    </div>
    					</div>
				    </div>
			    </div>
		    </div>
	    </div>
    </div>


<?php $this->load->view('admin/components/page_tail'); ?>