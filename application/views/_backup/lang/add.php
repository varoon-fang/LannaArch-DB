<?php 
	$this->load->view('admin/components/page_head'); 
 
	$this->load->view('admin/components/page_subhead');
?>
	
        
          <div class="span9">
      
         <h2>เพิ่มข้อมูล LANG</h2>
         <br />
        <?= form_open_multipart('admin/lang/add', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
	        <!-- // inputnormal -->
		  <div class="well">
        	          	                    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">หัวข้อ : </label>
	    	  <div class="controls">
	    	    <textarea name="title_th[thailand]"   placeholder="กรอกข้อความ..." class="span6"></textarea>
	    	  </div>
	    	</div>
	    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">รายละเอียด : </label>
	    	  <div class="controls">
	    	    <textarea name="detail_th[thailand]" rows="3" placeholder="กรอกข้อความ..." class="span6"></textarea>
	    	  </div>
	    	</div>
	    	
	    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">LANG Title : </label>
	    	  <div class="controls">
	    	    <textarea name="title_th[english]"  placeholder="กรอกข้อความ..." class="span6"></textarea>
	    	  </div>
	    	</div>
	    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">LANG Description : </label>
	    	  <div class="controls">
	    	    <textarea name="detail_th[english]" rows="3" placeholder="กรอกข้อความ..." class="span6"></textarea>
	    	  </div>
	    	</div>          	                    	   
	        
		
	    	<br/>
	    	<input type="submit" name="send"  class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		  </div> <!-- well -->                   
	     <?= form_close();?>
          	                        	                    
          	                     
          	                     
      </div><!--/span-->
     
 </div> <!-- slide bar--> 
        

<?php $this->load->view('admin/components/page_tail'); ?>