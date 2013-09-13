<?php $this->load->view('backoffice/components/page_head'); ?>

         
<?php $this->load->view('backoffice/components/page_subhead');?>
   

        
          <div class="span9">
      
         <h2>เพิ่มประเภท</h2>
         <br />
        <?= form_open_multipart('backoffice/type/add', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
    <!-- // inputnormal -->
  <div class="well">
	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	   
	    <div class="control-group">
		  <label class="control-label" for="name">ชื่อประเภท :</label>
		  <div class="controls">
		    <input type="text" name="title_th[thailand]" id="title_th" required="required" class="span6">
		  </div>
		</div>
        
        <div class="control-group">
    	  <label class="control-label" for="name">Type name :</label>
		  <div class="controls">
		    <input type="text" name="title_th[english]" id="title_th" required="required" class="span6">
		  </div>
		</div>
	</div> <!-- well -->  	 	
    	<br/>
			
		    	<input type="submit" name="submit" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
		    	<input type="reset" class="btn btn-large" value="Cancel">
			
	                   
     <?= form_close();?>
  </div> <!-- well -->    	                        	                    
<!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script> 
		                     
          	                     
      </div><!--/span-->
     
 <!-- </div> --> <!-- slide bar--> 
        

<?php $this->load->view('backoffice/components/page_tail'); ?>