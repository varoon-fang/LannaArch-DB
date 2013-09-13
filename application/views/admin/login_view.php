<?php $this->load->view('admin/components/page_head'); ?>
<!-- auto close alert -->
<script>
	window.setTimeout(function() {
    $("#alert-message").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>

  <body>
  <div class="container">
       
        <div class="row">
    <div class="span4 offset4">
    	<div class="well">
	    	<legend>Sign in </legend>
	    	 <?php echo form_open('admin/verifylogin', array('name' =>'myform', 'id' => 'contact-form')); ?>
		    	
			    	<?php echo validation_errors('<p class="alert alert-error">', '</p>'); ?>
					<? echo $this->session->flashdata('feedback');?> 
				    
				    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input class="span3" placeholder="Username" type="text" required="required" autocomplete="off" name="username" >
				    </div>
				    <div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span><input class="span3" placeholder="*************" autocomplete="off" required="required" type="password" name="password">
				    </div>
				    <label></label><br />
		   		    <input name="submit" class="btn-primary btn btn-large" type="submit" value="Sign in"/>
		   		    <br /><br />
		   		    
		   		    <p><a  href="#forgotpassword" data-toggle="modal">Forgot Password ?</a></p>
			<?= form_close(); ?>
    </div>
    </div>
    </div>
 <div class="modal hide" id="forgotpassword">
	 <div class="modal-header">
		 <button type="button" class="close" onclick="location.href='<?= site_url();?>admin/login';" data-dismiss="modal">✕</button>
		 <h3>Forgot Password</h3>
	</div>
	
	<div class="modal-body" style="text-align:center;">
		<div class="row-fluid">
		<div class="span10 offset1">
		<div id="modalTab">
		<div class="tab-content">
		<div class="tab-pane active" id="login">
			<?= form_open('admin/forgot/forgot_pass', array('name' => 'myform1', 'id' => 'contact-form'));?>
			
				<div class="control-group">
		    	  <div class="controls">
		    	    <input type="text" class="span6" required="required" name="email" id="email"  placeholder="Email">
		    	  </div>
		    	</div>
				<p>
					<input type="submit" name="forgot" class="btn btn-primary" value="Send">
					<button data-dismiss="modal" class="btn btn-danger" onclick="location.href='<?= site_url();?>admin/login';">Close</button>
				</p>
			<?= form_close();?>
		</div>

		</div>
		</div>
		</div>
		</div>
		</div>
	</div>   
</div> <!-- end hidden content -->

    </div><!--/.fluid-container-->  
<!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script>  
</body>
</html>
