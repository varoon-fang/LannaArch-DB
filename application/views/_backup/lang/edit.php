<?php 
	$this->load->view('admin/components/page_head'); 

	$this->load->view('admin/components/page_subhead');
?>
	
        
          <div class="span9">
      
         <h1>แก้ไขข้อมูล SEO </h1>
         <br />
         
        <?= form_open("admin/lang/edit/".$this->uri->segment(4), array('id' =>'contact-form', 'name' =>'myform'));?>
	   
	        <!-- // inputnormal -->
		  <div class="well">
        	   <?php
	        	   	$title=unserialize($rs['lang_title']);
	        	   	$detail=unserialize($rs['lang_detail']);
			   	?> 
        	        	                    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">หัวข้อ : </label>
	    	  <div class="controls">
	    	    <textarea name="title_th[thailand]" placeholder="กรอกข้อความ..." class="span6"><?= $title[$this->session->userdata('thailand', 'thailand')]; ?></textarea>
	    	  </div>
	    	</div>
	    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">รายละเอียด : </label>
	    	  <div class="controls">
	    	    <textarea name="detail_th[thailand]" rows="3" placeholder="กรอกข้อความ..." class="span6"><?= $detail[$this->session->userdata('thailand', 'thailand')];?></textarea>
	    	  </div>
	    	</div>
	    	
	    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">LANG Title : </label>
	    	  <div class="controls">
	    	    <textarea name="title_th[english]"  placeholder="กรอกข้อความ..." class="span6"><?= $title[$this->session->userdata('english', 'english')];?></textarea>
	    	  </div>
	    	</div>
	    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">LANG Description : </label>
	    	  <div class="controls">
	    	    <textarea name="detail_th[english]" rows="3" placeholder="กรอกข้อความ..." class="span6"><?= $detail[$this->session->userdata('english', 'english')];?></textarea>
	    	  </div>
	    	</div> 
		  	
				<br/>
                 
	    	<input type="submit" name="update" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Edit">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		  </div> <!-- well -->                   
	     <?= form_close();?>
	     
                     
          	                     
      </div><!--/span-->
     
 </div> <!-- slide bar--> 
        

<?php $this->load->view('admin/components/page_tail'); ?>