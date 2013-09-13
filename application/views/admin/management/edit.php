<?php 

	$this->load->view('admin/components/page_head'); 

	$idd= $this->uri->segment(4);
 ?>
<!-- img preview --> 
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.min.js');?>"></script>		

<?php $this->load->view('admin/components/page_subhead');?>
	
        
          <div class="span9">
      
         <h1>แก้ไขข้อมูลผู้ดูแลระบบ</h1>
         <br />
        <?= form_open("admin/management/edit/".$this->uri->segment(4), array('id' =>'contact-form', 'name' =>'myform'));?>
	   
    <!-- // inputnormal -->
  <div class="well">
	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
		<div class="control-group">
		  <label class="control-label" for="name">Username :</label>
		  <div class="controls">
		    <input type="text" name="username" id="username" value="<?= $rs['admin_user'];?>" class="span4">
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
    	    <input type="text" placeholder="" name="email" value="<?= $rs['admin_email'];?>" class="span4" id="email">
    	    <?php echo form_error('email', '<p class="error">', '</p>'); ?>
    	  </div>
    	</div>
    	
    	<div class="control-group">
    	  <label class="control-label" for="name">สถานะ : </label>
    	  <div class="controls">
    	     <input type="radio" name="status" value="yes" <? if($rs['admin_status']=="yes"){ echo "checked"; }?> class="span1" id="status"> : Enable
    	     <input type="radio" name="status" value="no" <? if($rs['admin_status']=="no"){ echo "checked"; }?> class="span1" id="status"> : Disable
    	  </div>
    	</div>  
				<br/>
                 
	    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Edit">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		  </div> <!-- well -->                   
	     <?= form_close();?>
	      	                     
      </div><!--/span-->
     
 </div> <!-- slide bar--> 
      

<?php $this->load->view('admin/components/page_tail'); ?>