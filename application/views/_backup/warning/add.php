<?php 
	$this->load->view('backoffice/components/page_head'); 
	$this->load->view('backoffice/components/page_subhead');
?>
	
        
          <div class="span9">
      
         <h2>เพิ่มข้อมูลแจ้งเตือน</h2>
         <br />
        <?= form_open('backoffice/warning/add', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
	        <!-- // inputnormal -->
		  <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	    	          	                    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">ประเภท : </label>
	    	  <div class="controls">
	    	    <input type="radio" name="type_name" value="1" checked="checked"> บริษัท
	    	    <input type="radio" name="type_name" value="2" > ตัวแทน
	    	    <input type="radio" name="type_name" value="3" > บุคคลทั่วไป 
	    	  </div>
	    	</div>
	    
	    	
	    	
	    	 <div class="control-group">
		  <label class="control-label" for="name">รายละเอียด :</label>
		  <div class="controls">
		    <textarea id="detail_th" name="detail_th" rows="7"  class="span9" placeholder="กรอกข้อความ…"></textarea>
		  </div>
		</div>
	 	 			<?php if(!$this->agent->is_mobile()){?>
	 	 			<script type="text/javascript">
						var editorObj=CKEDITOR.replace('detail_th',cke_config); 
					</script>
				<? }?>
			
		</div>
		
	    	<br/>
	    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		                    
	     <?= form_close();?>
          	                        	                    
          	                     
          	                     
      </div><!--/span-->
     
        

<?php $this->load->view('backoffice/components/page_tail'); ?>