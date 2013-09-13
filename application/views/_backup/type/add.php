<?php $this->load->view('backoffice/components/page_head'); ?>
         
<?php $this->load->view('backoffice/components/page_subhead');?>
   

        
          <div class="span9">
      
         <h2>เพิ่มข้อมูลหมวดหมู่งาน </h2>
         <br />
        <?= form_open_multipart('backoffice/type/add', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
    <!-- // inputnormal -->
  <div class="well">
	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	   
	    <div class="control-group">
		  <label class="control-label" for="name">ชื่อหมวดหมู่ :</label>
		  <div class="controls">
		   <select name="cate_id" id="cate_id" class="span4" required="required">
		   		<option value="">เลือก</option>
		   		<?php
		   			$sql="select * from category_job order by cate_name asc";
	   					$rs=$this->db->query($sql)->result();
    		
			    		 foreach($rs as $row){  
		   		?>
		   		<option value="<?= $row->cate_id;?>"><?= $row->cate_name;?></option>
		   		<? }?>
		   </select>
		  </div>
		</div>
		
		 <div class="control-group">
		  <label class="control-label" for="name">ชื่อประเภท :</label>
		  <div class="controls">
		    <input type="text" name="title_th" id="title_th" required="required" class="span6">
		  </div>
		</div>
	</div> <!-- well --> 	 	
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
     
 <!-- </div> --> <!-- slide bar--> 
        

<?php $this->load->view('backoffice/components/page_tail'); ?>