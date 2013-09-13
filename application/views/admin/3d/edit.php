<?php

	$this->load->view('admin/components/page_head');

	$idd= $this->uri->segment(4);
 ?>
<!-- img preview -->
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-fileupload.min.js');?>"></script>
<!-- Drag & Drop -->
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery-1.3.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery-ui-1.7.1.custom.min.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$(function() {
			$("#image_zone ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
				var order = $(this).sortable("serialize") + '&action=updateRecord';
				$.post("<?= site_url("admin/tree_d/update_number");?>", order, function(theResponse){
					$("#contentRight").html(theResponse);
				});
			}
			});
		});

	});
	</script>
<?php $this->load->view('admin/components/page_subhead');?>


          <div class="span9">

         <h3><a href="<?= site_url("admin/tree_d");?>"><i class="icon-arrow-left back-link"></i></a> แก้ไขข้อมูลภาพสามมิติ</h3>
         <br />
          <? echo $this->session->flashdata('feedback_edit');?>
        <?= form_open("admin/tree_d/edit/".$this->uri->segment(4), array('id' =>'contact-form', 'name' =>'myform'));?>

    <!-- // inputnormal -->
		  <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูล )</strong></p>

	    	<div class="control-group">
	    	  <label class="control-label" for="name">หัวข้อ : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…" name="title_th" value="<?= $rs['3d_title'];?>" class="span6" id="title_th">
	    	  </div>
	    	</div>

		    <div class="control-group">
			  <label class="control-label" for="name">รายละเอียด :</label>
			  <div class="controls">
			    <textarea id="detail_th" name="detail_th" rows="7"  class="span6" placeholder="กรอกข้อความ…"><?= $rs['3d_detail'];?></textarea>
			  </div>
			</div>
					<?php if(!$this->agent->is_mobile()){?>
		 	 			<script type="text/javascript">
							var editorObj=CKEDITOR.replace('detail_th',cke_config);
						</script>
					<? }?>


			<!--=====Picture Addd=======-->
	    	<div class="well">
              <p><span class="badge badge-inverse">2.</span> <strong>( ข้อมูลรูปภาพ )</strong></p>
                 <br />

               	      		<? echo $this->session->flashdata('feedback');?>
							 <ul class="thumbnails">
								 <li class="span4">
									 <a data-toggle="modal" class="btn btn-large btn-primary" href="#loginModal"><span class="icon-plus icon-white"></span> Add </a>

								 <? if($numrow=="0"){ }else{?>
		                   	       <input type="submit" name="del_img" onclick="return confirm('Delete?')"  class="btn btn-large btn-danger" value="Delete Check">

		                   	     <? }?>
		                   	     </li>
		                   	 </ul>
							<div id="image_zone">
								<ul class="thumbnails" >
								<?php
									$i=0;
									foreach($rs_3d_img->result_array() as $fett){
									$i++;
										$name_img = $fett['3d_album_name'];
										$id_img = $fett['3d_album_id'];
								?>
								<li class="span2" id="recordsArray_<?= $id_img; ?>" >
								    <div class="thumbnail">
								    <img src="<?= site_url("images/3d/resize/$name_img");?>" alt="<?=$name_img;?>">
									    <div class="caption">
									    <p><label class="checkbox"><input name="img_id[]" type="checkbox" value="<?= $id_img?>" />Delete</label></p>
											<p align="center"><a href="<?= site_url("admin/tree_d/delete_image/$id_img");?>" onclick="return confirm('Delete?')" class="btn btn-warning btn-block">Delete</a></p>
									    </div>
								    </div>
							    </li>
		            			<? }?>
								</ul>
							</div>

             </div> <!-- well -->

      </div> <!-- well -->
				<br/>

	    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Edit">
	    	<input type="reset" class="btn btn-large" value="Cancel">

	     <?= form_close();?>

  <!-- Upload image -->
    <div class="modal hide" id="loginModal">
    	<div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">✕</button>
	    	<h3>Upload images</h3>
	    	<p><span class="label label-warning">คำเตือน</span> ขนาดรูปไม่ต่ำกว่า 800 x 533 px </p>
    	</div>

    <div class="modal-body" style="text-align:center;">
	    <div class="row-fluid">
		    <div class="span9">
			    <div id="modalTab">
				    <div class="tab-content">
					    <div class="tab-pane active" id="login">
    <?= form_open_multipart('admin/tree_d/edit_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

	   	<input  type="hidden" value="<?= $rs['3d_id'];?>" name="id_3d" >

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

	    <input type="submit" name="upload_img" class="btn btn-meduim btn-primary btn-progress" data-loading-text="Loading now..." value="Confirm Upload">
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




<?php $this->load->view('admin/components/page_tail'); ?>