<?php 
	$this->load->view('backoffice/components/page_head'); 
	$this->load->view('backoffice/components/page_subhead');
?>
	
        
          <div class="span9">
      
         <h2>เพิ่มเมนู</h2>
         <br />
        <?= form_open('backoffice/menu/add', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
	        <!-- // inputnormal -->
		  <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	    	          	                    	
	    	
	    	 <div class="control-group">
			  <label class="control-label" for="name">ชื่อ :</label>
			  <div class="controls">
			    <input type="text" name="title" id="title_th" required="required" placeholder="กรอกข้อความ…" class="span9">
			  </div>
			</div>
	 	 	
	 	 	<div class="control-group">
			  <label class="control-label" for="name">มูลค่า :</label>
			  <div class="controls">
			    <input type="text" name="amount" id="amount" required="required" placeholder="กรอกข้อความ…" class="span9">
			  </div>
			</div>

		
		</div>
		
	    	<br/>
	    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		                    
	     <?= form_close();?>
       </div><!--/span-->
<!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script>    
        

<?php $this->load->view('backoffice/components/page_tail'); ?>