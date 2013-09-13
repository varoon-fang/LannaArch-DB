<?php 
	$this->load->view('backoffice/components/page_head'); 
	$this->load->view('backoffice/components/page_subhead');
?>
        
          <div class="span9">
      
         <h1>แก้ไขข้อมูลแจ้งเตือน</h1>
         <br />
        <?= form_open("backoffice/warning/edit/".$this->uri->segment(4), array('id' =>'contact-form', 'name' =>'myform'));?>
				
	      <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>
	    	          	                    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">ประเภท : </label>
	    	  <div class="controls">
	    	    <input type="radio" name="type_name" value="1" <? if($rs['warning_type']=='1'){echo "checked";}else{}?>> บริษัท
	    	    <input type="radio" name="type_name" value="2" <? if($rs['warning_type']=='2'){echo "checked";}else{}?>> ตัวแทน
	    	    <input type="radio" name="type_name" value="3" <? if($rs['warning_type']=='3'){echo "checked";}else{}?>> บุคคลทั่วไป 
	    	  </div>
	    	</div>
	    
	    	
	    	
	    	 <div class="control-group">
		  <label class="control-label" for="name">รายละเอียด :</label>
		  <div class="controls">
		    <textarea id="detail_th" name="detail_th" rows="7"  class="span9" placeholder="กรอกข้อความ…"><?= $rs['warning_detail'];?></textarea>
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