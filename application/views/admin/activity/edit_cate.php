<?php 

	$this->load->view('admin/components/page_head'); 

	$idd= $this->uri->segment(4);
 ?>	

<?php $this->load->view('admin/components/page_subhead');?>
	
        
          <div class="span9">
      
         <h2>แก้ไขข้อมูลหมวดหมู่กิจกรรม</h2>
         <br />
        <?= form_open("admin/activity/edit_category/".$this->uri->segment(4), array('id' =>'contact-form', 'name' =>'myform'));?>
	   
    <!-- // inputnormal -->
  <div class="well">
	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	   
	   <div class="control-group">
		  <label class="control-label" for="name">ชื่อหมวดหมู่ :</label>
		  <div class="controls">
		    <input type="text" name="title_th" id="title_th" value="<?= $title_name;?>" required="required" class="span6">
		  </div>
		</div>
		
     </div> <!-- well --> 
    	<br />
    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Change">
		    	<input type="reset" class="btn btn-large" value="Cancel">
		   
		                  
	     <?= form_close();?>
<!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script> 
	     
          </div>

<?php $this->load->view('admin/components/page_tail'); ?>