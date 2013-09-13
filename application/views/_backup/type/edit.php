<?php 

	$this->load->view('backoffice/components/page_head'); 

	$idd= $this->uri->segment(4);
 ?>

<?php $this->load->view('backoffice/components/page_subhead');?>
	
        
          <div class="span9">
      
         <h2><a href="<?= site_url("backoffice/type/list_type/".$this->uri->segment(4)."");?>"> << </a> แก้ไขข้อมูลหมวดหมู่งาน</h2>
         <br />
        <?= form_open("backoffice/type/edit/".$this->uri->segment(4), array('id' =>'contact-form', 'name' =>'myform'));?>
	   
    <!-- // inputnormal -->
  <div class="well">
	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	    
	    <div class="control-group">
		  <label class="control-label" for="name">ชื่อหมวดหมู่ :</label>
		  <div class="controls">
		   <select name="cate_id" id="cate_id" class="span4" required="required">
		   		<?php
		   			$sql="select * from category_job order by cate_name asc";
	   					$res=$this->db->query($sql)->result();
    		
			    		 foreach($res as $row){  
		   		?>
		   		<option <? if($rs['cate_id']==$row->cate_id){ echo "selected";}else{};?> value="<?= $row->cate_id;?>"><?= $row->cate_name;?></option>
		   		<? }?>
		   </select>
		  </div>
		</div>
		
		 <div class="control-group">
		  <label class="control-label" for="name">ชื่อประเภท :</label>
		  <div class="controls">
		    <input type="text" name="title_th" id="title_th" value="<?= $rs['type_name'];?>" required="required" class="span6">
		  </div>
		</div>
		
    	
     </div> <!-- well --> 
    	<br />
    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Change">
		    	<input type="reset" class="btn btn-large" value="Cancel">
		   
		                  
	     <?= form_close();?>
	     
          </div>

<?php $this->load->view('backoffice/components/page_tail'); ?>