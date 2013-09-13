<?php $this->load->view('admin/components/page_head'); ?>

<!-- img preview --> 
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.min.js');?>"></script>
         
<?php $this->load->view('admin/components/page_subhead');?>
   

        
          <div class="span9">
      
         <h2>Template Website </h2>
         <?= $this->session->flashdata('feedback');?>
         <br />
        <?= form_open_multipart('admin/template/change', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
    <!-- // inputnormal -->
  <div class="well">
	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	   
	    <ul class="thumbnails">
	    	<?php 
		   		foreach($rs_temp->result_array() as $row){
		   			$id = $row['temp_id'];
			   		$img = $row['temp_img'];
			   		$status = $row['temp_status'];
		   		
	   		?>
			<li class="span4">
			  <div class="thumbnail">
			    <img src="<?= site_url("images/template/$img");?>" alt="ALT NAME">
			    <div class="caption">
			    <p>สถานะ :
			      <input type="radio" name="temp_name" <?if($status=="yes"){ echo "checked";}?> value="<?= $id;?>" >
			    </p>
			    </div>
			  </div>
			</li>
			  <? }?>
			 
			</ul>		
	   	
    	<br/>
			
		    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
		    	<input type="reset" class="btn btn-large" value="Cancel">
			
	                  
     <?= form_close();?>
  </div> <!-- well -->    	                        	                    
		                     
          	                     
      </div><!--/span-->
     
 <!-- </div> --> <!-- slide bar--> 
        

<?php $this->load->view('admin/components/page_tail'); ?>