<?php 
	$this->load->view('backoffice/components/page_head'); 
?>

<link rel="stylesheet" href="<?= site_url();?>assets/css/bootstrap-multiselect.css" type="text/css">

<!-- Js -->
<script type="text/javascript" src="<?= site_url();?>assets/js/bootstrap-multiselect.js"></script>

<style type="text/css">
    .add-styling .multiselect {
        width: 500px;
        text-align: left;
    }
    .add-styling .multiselect b.caret {
        position: absolute;
        right: 5px;
    }
    .add-styling .multiselect-group {
        font-weight: bold;
        text-decoration: underline;
    }
    .add-styling .multiselect-all {
        font-weight: bold;
    }
    .add-styling .multiselect-search {
        color: red;
    }
</style>
		
 <script type="text/javascript">
    $(document).ready(function() {
        /*
for (var i = 1; i <= 20; i++) {
        	$('#example29').append('<option value="' + i + '">' + i + '</option>');
        }
*/
        
        $('#example29').multiselect({
        	includeSelectAllOption: true,
        	enableFiltering: true
        });
    });
</script>
<?php $this->load->view('backoffice/components/page_subhead');?>
	
        
          <div class="span9">
      
         <h1>แจ้งข้อความเตือน</h1>
         <br />
        <?= form_open("backoffice/member/mailto", array('id' =>'contact-form', 'name' =>'myfrom'));?>
	   
	        <!-- // inputnormal -->
		  <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูลสมาชิก )</strong></p>
	    	
	    	 <div class="control-group">
			  <label class="control-label" for="name">อีเมล์สมาชิก :</label>
			  <div class="controls">
					<select id="example29" multiple="multiple" name="m_mail[]">
						<?php 
							$sql="select * from member where member_status='yes' order by member_id desc";
							  $rs=$this->db->query($sql)->result();
							foreach($rs as $row){
						?>
						<option value="<?=$row->member_email;?>"><?= $row->member_email;?></option>
							
						<? }?>
					</select>
			  </div>
			</div>
		          	                    	
	    	<div class="control-group">
	    	  <label class="control-label" for="name">หัวข้อ : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…" name="title_th" value="<?= $rs['product_name'];?>" class="span9" id="title_th">
	    	  </div>
	    	</div>
	    	
	    <div class="control-group">
		  <label class="control-label" for="name">รายละเอียด :</label>
		  <div class="controls">
		    <textarea id="detail_th" name="detail_th" rows="7"  class="span9" placeholder="กรอกข้อความ…">
		    
		    </textarea>
		  </div>
		</div>
	 	 			 	      
     
				<br/>
                 
	    	<input type="submit" name="send" id="button-progress" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Send">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		  </div> <!-- well -->                   
	     <?= form_close();?>
	             	                     
          	                     
      </div><!--/span-->
     
 </div> <!-- slide bar--> 
        
<!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script> 

<?php $this->load->view('backoffice/components/page_tail'); ?>