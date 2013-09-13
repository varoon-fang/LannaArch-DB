<?php
$this->load->view('admin/components/page_head');
$this->load->view('admin/components/page_subhead');
?>
<!-- img preview -->
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.min.js');?>"></script>


<div class="span9">

         <h2>เพิ่มข้อมูลกิจกรรม</h2>
         <br />
        <?= form_open_multipart('admin/activity/add', array('id' =>'contact-form', 'name' =>'myform'));?>

	      <!-- // inputnormal -->
		  <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>

			<div class="control-group">
	    	  <label class="control-label" for="name">หมวดหมู่ : </label>
	    	  <div class="controls">
	    	    <select name="group" required="reauired">
	    	    	<option value="">เลือกหมวดหมู่</option>
	    	    	<?php
	    	    		foreach($list_cate->result_array() as $row)
	    	    		{
	    	    	?>
	    	    	<option value="<?= $row['activity_group_id'];?>"><?= $row['activity_group_name'];?></option>
	    	    	<? }?>
	    	    </select>
	    	  </div>
	    	</div>

	    	<div class="control-group">
	    	  <label class="control-label" for="name">หัวข้อ : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…"  name="title_th"  class="span6" id="title_th">
	    	  </div>
	    	</div>

	    <div class="control-group">
		  <label class="control-label"  >รายละเอียด :</label>
		  <div class="controls">

		    <textarea id="detail_th" name="detail_th" rows="7"  class="span6" placeholder="กรอกข้อความ…"></textarea>
		    <div id="detail_th"></div>
		  </div>
		</div>

				<?php if(!$this->agent->is_mobile()){?>
	 	 			<script type="text/javascript">
						var editorObj=CKEDITOR.replace('detail_th',cke_config);
					</script>
				<? }?>
		    		</div> <!-- well -->
	        	   	<!--=====Picture Addd=======-->
	    	<div class="well">
	                	<p><span class="label label-warning">คำเตือน</span> ขนาดรูปไม่ต่ำกว่า 800 x 533 px </p>

					  <label class="control-label" for="name">รูปภาพ :</label>

	                    	<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
							<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-file"><span class="fileupload-new">Select Multi File</span>
							<span class="fileupload-exists">Change</span>
							<input type="file" multiple="multiple" name="userfile[]" id="multiUpload" />
							</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
							</div>

			 </div>

	    	<br/>

		    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
		    	<input type="reset" class="btn btn-large" value="Cancel">


     <?= form_close();?>


      </div><!--/span-->

<!--  </div>  --><!-- slide bar-->
<!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script>

<?php $this->load->view('admin/components/page_tail'); ?>