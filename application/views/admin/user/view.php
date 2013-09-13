<?php 
	$this->load->view('admin/components/page_head'); 
	$this->load->view('admin/components/page_subhead');
?>
	
        
          <div class="span9">
      
         <h1>บัญชีผู้ใช้งาน</h1>
         <? echo $this->session->flashdata('feedback');?> 
         <br />
        <?= form_open("admin/profile/update/", array('id' =>'contact-form', 'name' =>'myform'));?>
        <?php
			$sql="select * from admin where admin_id=". $this->session->userdata['logged_in']['id']." limit 1 ";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->admin_id;
    		 	$username = $row->admin_user;
    		 	$email = $row->admin_email;
    		 } 
      ?>
	        <!-- // inputnormal -->
		  <div class="well">
        	<p><span class="badge badge-inverse">1.</span> <strong>( ข้อมูลผู้ใช้งาน )</strong></p>
	    	          	                    	
	    	<div class="control-group">
	    	  <label class="control-label">Username : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…" name="username" value="<?= $username;?>" class="span6" id="username">
	    	  </div>
	    	</div>
	    	
	    	 <div class="control-group">
	    	  <label class="control-label">Email : </label>
	    	  <div class="controls">
	    	    <input type="text" placeholder="กรอกข้อความ…" name="email" value="<?= $email;?>" class="span6" id="email">
	    	  </div>
	    	</div>
	    	
	    	<div class="control-group">
	    	  <label class="control-label">New Password : </label>
	    	  <div class="controls">
	    	    <input type="password" placeholder="กรอกรหัสผ่านใหม่…" name="password" value="" class="span6" id="password">
	    	  </div>
	    	</div>
	    	<input type="hidden" value="<?= $id;?>" name="profiles">
                 <br />
	    	<input type="submit" name="send" class="btn btn-large btn-success btn-progress" data-loading-text="Loading now..." value="Confirm Edit">
	    	<input type="reset" class="btn btn-large" value="Cancel">
		  </div> <!-- well -->                   
	     <?= form_close();?>
        	                     
          	                     
      </div><!--/span-->
     
 </div> <!-- slide bar--> 
        

<?php $this->load->view('admin/components/page_tail'); ?>