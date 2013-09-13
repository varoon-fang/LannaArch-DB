<?php
$this->load->view('admin/components/page_head');
$this->load->view('admin/components/page_subhead');
?>
<!-- img preview -->
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.min.js');?>"></script>


<div class="span9">

         <h2>เพิ่มข้อมูลห้องสมุดหนังสือ</h2>
         <br />
        <?= form_open_multipart('admin/ebook/add', array('id' =>'contact-form', 'name' =>'myform'));?>

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
	    	    	<option value="<?= $row['ebook_group_id'];?>"><?= $row['ebook_group_name'];?></option>
	    	    	<? }?>
	    	    </select>
	    	  </div>
	    	</div>

    	    <div class="control-group">
	    	  <label class="control-label" for="name">คณะฯ : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…"  name="major"  class="span6" id="major">
	    	  </div>
	    	</div>

	    	<div class="control-group">
	    	  <label class="control-label" for="name">ชื่อหนังสือ : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…"  name="title_th"  class="span6" id="title_th">
	    	  </div>
	    	</div>

	    	<div class="control-group">
	    	  <label class="control-label" for="name">ชื่อผู้วิจัย : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…"  name="research"  class="span6" id="research">
	    	  </div>
	    	</div>

	    	<div class="control-group">
	    	  <label class="control-label" for="name">ปีที่วิจัย : </label>
	    	  <div class="controls">
	    	    <select name="year">
	    	    	<option value="">เลือก</option>
	    	    	<?php
	    	    		$now=date("Y");
	    	    		for($i=$now;$i>=2000;$i--){
		    	    ?>
		    	    	<option value="<?= $i;?>"><?= $i;?></option>
	    	    	<? }?>
	    	    </select>
	    	  </div>
	    	</div>

		    		</div> <!-- well -->

	        	   	<!--=====Picture Addd=======-->
				   	<div class="well">
					  <label class="control-label" for="name">ไฟล์ตัวอย่างงานวิจัย (PDF) :</label>

	                    	<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
							<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-file"><span class="fileupload-new">Select file</span>
							<span class="fileupload-exists">Change</span>
							<input type="file" name="file_example" id="multiUpload" />
							</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
							</div>

					<label class="control-label" for="name">ไฟล์งานวิจัย (PDF) :</label>

	                    	<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
							<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-file"><span class="fileupload-new">Select file</span>
							<span class="fileupload-exists">Change</span>
							<input type="file" name="file_pdf" id="multiUpload" />
							</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
							</div>

					<label class="control-label" for="name">ไฟล์งานวิจัย (Images) :</label>

	                    	<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
							<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-file"><span class="fileupload-new">Select Multi File</span>
							<span class="fileupload-exists">Change</span>
							<input type="file" name="userfile[]" multiple="multiple" id="multiUpload" />
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