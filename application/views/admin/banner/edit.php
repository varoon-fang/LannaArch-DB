<?php 

	$this->load->view('admin/components/page_head'); 

	 $idd= $this->uri->segment(4);
	  $query = $this->db->get_where('product_album', array('product_id' => "$idd"));
		$count= 3- $count_img = $query->num_rows();
			
?>
<script type="text/javascript">
	$(function(){
    $("input[type='submit']").click(function(){
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length)><?= "$count"?>){
         alert("You can only upload a maximum of <?= "$count"?> files");
        return false;
        }
    });    
});
</script>
		

<?php $this->load->view('admin/components/page_subhead');?>
	
        
          <div class="span9">
      
         <h1>แก้ไขข้อมูลสินค้า</h1>
         <br />
        <?= form_open("admin/product/edit/".$this->uri->segment(4), array('id' =>'contact-form', 'name' =>'myform'));?>
	   
	        <!-- // inputnormal -->
		  <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูลผลงาน )</strong></p>
	    	          	                    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">หัวข้อ : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…" name="title_th" value="<?= $rs['product_title'];?>" class="span9" id="title_th">
	    	  </div>
	    	</div>
	    	
	    	 <div class="control-group">
		  <label class="control-label" for="name">รายละเอียด :</label>
		  <div class="controls">
		    <textarea id="detail_th" name="detail_th" rows="7"  class="span9" placeholder="กรอกข้อความ…"><?= $rs['product_detail'];?></textarea>
		  </div>
		</div>
	 	 			<script type="text/javascript">
						var editorObj=CKEDITOR.replace('detail_th',cke_config); 
						</script>
		
	    	          	                    	   
<!--=====Picture Addd=======-->
	    	<div class="well">
                                                 
              <h3>Management image </h3> <p>( Upload All images press Shift or Ctrl )</p><br/>
              <p><span class="label label-warning">Recommend</span> <b>Horizontal size not less than 700 x 511 px And Vertical size not less than 511 x 700 px <br /> File Size limit 1 Mb.</b></p>
               	    <div class="row-fluid">
               	      <ul class="thumbnails">
               	      
	       	          		
						<?php
	   	          		$query = $this->db->get_where('product_album', array('product_id' => $this->uri->segment(4)));
	   	          			$numrow= $query->num_rows();
	   	          			foreach ($query->result() as $row)
							{
							     $img= $row->product_img;
							    
							
	   	          		?>
							<li class="span3">
                   	            <img src="<?= site_url();?>images/product/resize/<?= $img;?>" alt="<?= $img;?>"><br />
                   	             <p><label class="checkbox"><input name="img_id[]" type="checkbox" value="<?= $row->product_album;?>" />Delete</label></p>			
            				</li>
							<?  } // end foreach ?>
							<? if($count=="0"){ }else{?>
					        <li class="span3">
							 <a data-toggle="modal" class="btn btn-primary" href="#loginModal"><span class="icon-plus icon-white"></span> Add </a>	
							</li> 
							<? }?>		
                   	      </ul>
                   	     <? if($numrow=="0"){ }else{?>
                   	      <input type="submit" name="del_img" class="btn btn-danger" value="Delete">
                   	     <? }?>
               	    </div>
                   	      
                     </div>
				<br/>
                 
	    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Edit">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		  </div> <!-- well -->                   
	     <?= form_close();?>
	     
  <!-- Upload image -->  
    <div class="modal hide" id="loginModal">
    	<div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">✕</button>
	    	<h3>Upload images</h3>
    	</div>
    
    <div class="modal-body" style="text-align:center;">
	    <div class="row-fluid">
		    <div class="span9">
			    <div id="modalTab">
				    <div class="tab-content">
					    <div class="tab-pane active" id="login">
    <?= form_open_multipart('admin/product/edit_pic', array('id' =>'contact-form', 'name' =>'myform'));?>
   
	   	<input  type="hidden" value="<?= $rs['product_id'];?>" name="id_product" >
            <div class="fileupload fileupload-new" data-provides="fileupload">
			<div class="input-append">
			<div class="uneditable-input span2"><i class="icon-file fileupload-exists"></i>
				<span class="fileupload-preview"></span>
			</div>
			<span class="btn btn-file"><span class="fileupload-new">Select Multi File</span>
			<span class="fileupload-exists">Change</span>
			<input type="file" multiple="multiple" name="userfile[]" id="multiUpload" />
			</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
			</div>
			</div>
	   
	    <p>
	    
	    <input type="submit" name="upload_img" class="btn btn-large btn-primary btn-progress" data-loading-text="Loading now..." value="Confirm Upload">
	    <button onclick="javascript:window.location.reload();" class="btn btn-danger" data-dismiss="modal">Close</button>
	    </p>
    <?= form_close();?>
    
    </div>
    					</div>
				    </div>
			    </div>
		    </div>
	    </div>
    </div>         	                        	                    
          	                     
          	                     
      </div><!--/span-->
     
 </div> <!-- slide bar--> 
        

<?php $this->load->view('admin/components/page_tail'); ?>