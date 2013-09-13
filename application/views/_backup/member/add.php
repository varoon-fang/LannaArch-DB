<?php 
	$this->load->view('backoffice/components/page_head'); 
 
	$this->load->view('backoffice/components/page_subhead');
?>
	
        
          <div class="span9">
      
         <h2>เพิ่มข้อมูล member</h2>
         <br />
        <?= form_open_multipart('backoffice/member/add', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
	        <!-- // inputnormal -->
		  <div class="well">
        	          	                    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">member Title : </label>
	    	  <div class="controls">
	    	    <textarea name="title_th" id="title_th"  placeholder="กรอกข้อความ..." class="span6"></textarea>
	    	  </div>
	    	</div>
	    	
	    	 <div class="control-group">
	    	  <label class="control-label" for="name">member Keyword : </label>
	    	  <div class="controls">
	    	    <textarea name="title" id="title" rows="3" placeholder="กรอกข้อความ..." class="span6"></textarea>
	    	  </div>
	    	</div>
		
	    	<div class="control-group">
	    	  <label class="control-label" for="name">member Description : </label>
	    	  <div class="controls">
	    	    <textarea name="detail_th" id="detail_th" rows="3" placeholder="กรอกข้อความ..." class="span6"></textarea>
	    	  </div>
	    	</div>          	                    	   
	        
		
	    	<br/>
	    	<input type="submit" name="send"  class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		  </div> <!-- well -->                   
	     <?= form_close();?>
          	                        	                    
          	                     
 <!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script>          	                     
      </div><!--/span-->
     
 </div> <!-- slide bar--> 
        

<?php $this->load->view('backoffice/components/page_tail'); ?>