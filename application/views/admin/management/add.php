<?php $this->load->view('admin/components/page_head'); ?>

<!-- img preview --> 
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.min.js');?>"></script>
         
<?php $this->load->view('admin/components/page_subhead');?>
   

        
          <div class="span9">
      
         <h2>เพิ่มผู้จัดการระบบ </h2>
         <br />
        <?= form_open_multipart('admin/management/add', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
    <!-- // inputnormal -->
  <div class="well">
	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	    	
	    <div class="control-group">
		  <label class="control-label" for="name">Username :</label>
		  <div class="controls">
		    <input type="text" name="username" id="username" autocomplete="off" class="span4">
		    <?php echo form_error('username', '<p class="error">', '</p>'); ?>
		  </div>
		</div>
		
	    
    	<div class="control-group">
    	  <label class="control-label" for="name">Password : </label>
    	  <div class="controls">
    	    <input type="password" placeholder="" name="password"  class="span4" id="password">
    	  </div>
    	</div>
    	
    	<div class="control-group">
    	  <label class="control-label" for="name">Confirm Password : </label>
    	  <div class="controls">
    	    <input type="password" placeholder="" name="c_pass"  class="span4" id="c_pass">
    	  </div>
    	</div>
    	
    	<div class="control-group">
    	  <label class="control-label" for="name">Email : </label>
    	  <div class="controls">
    	    <input type="text" placeholder="" name="email" autocomplete="off" class="span4" id="email">
    	    <?php echo form_error('email', '<p class="error">', '</p>'); ?>
    	  </div>
    	</div>
    	
	    
    	<br/>
			
		    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
		    	<input type="reset" class="btn btn-large" value="Cancel">
			
	                    
     <?= form_close();?>
  </div> <!-- well -->    	                        	                    
<!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script> 
		                     
          	                     
      </div><!--/span-->
     
 </div> <!-- slide bar--> 
        

<?php $this->load->view('admin/components/page_tail'); ?>