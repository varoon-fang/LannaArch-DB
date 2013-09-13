<?php $this->load->view('backoffice/components/page_head'); ?>
<!--
<script>
	$(function(){
    $("input[type='submit']").click(function(){
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length)>3){
         alert("You can only upload a maximum of 3 files");
        return false;
        }
    });    
});
</script>
-->
<!-- img preview --> 
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.min.js');?>"></script>

<?php $this->load->view('backoffice/components/page_subhead');?>
	
        
          <div class="span9">
      
         <h2>เพิ่มแบนด์เนอร์ 3</h2>
         <br />
		 <? echo $this->session->flashdata('feedback');?>
       
      <ul class="thumbnails">
      <?php
      		$i=0;
			$sql="select * from banner_buttom order by banner_buttom_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->banner_buttom_id;
    		 	$name = $row->banner_buttom_name;
    		  $i++;
      ?>
	    <li class="span3" <? if($i==1){ echo "style='margin-left:20px'";}else{};?> >
		    <div class="thumbnail">
		    <img src="<?= site_url();?>/images/banner/resize/<?=$name;?>" alt="<?=$name;?>">
			    <div class="caption">
					<p align="center"><a href="<?= site_url();?>/backoffice/banner/delete_banner3/<?= $id;?>" onclick="return confirm('Delete?')" class="btn btn-danger btn-block">Delete</a></p>
			    </div>
		    </div>
	    </li>
	    <? }?>
	    
	    </ul>
    
        <?= form_open_multipart('backoffice/banner/add_banner3', array('id' =>'contact-form', 'name' =>'myform'));?>
	   
	        <!-- // inputnormal -->
		   		    	          	                    	   
	        	   	<!--=====Picture Addd=======-->
	    	<div class="well">
	                	<p><span class="badge badge-inverse">1.</span><strong> ( อัพโหลดรูปภาพ )</strong></p>
	                	<p><span class="label label-info">คำแนะนำ</span> ขนาดรูปไม่ต่ำกว่า 221 x 314 px สามารถอัพได้หลายรูปด้วยการกด Shift และกดรูป </p>
	                	
					  <label class="control-label" for="name">รูปภาพ :</label>
					
	                    	<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
							<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-file"><span class="fileupload-new">Select Multi File</span>
							<span class="fileupload-exists">Change</span>
							<input type="file" multiple="multiple" name="userfile[]" id="multiUpload" />
							</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
							</div>
	
		
		
	    	<br/>
	    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Save">
	    	<input type="reset" class="btn btn-large" value="Cancel">
	    	</div>
		   <?= form_close();?>
          	                        	                    
          	                     
          	                     
      </div><!--/span-->
     
<!--  </div> --> <!-- slide bar--> 
        

<?php $this->load->view('backoffice/components/page_tail'); ?>