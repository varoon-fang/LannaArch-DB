<?php 
	$this->load->view('backoffice/components/page_head'); 

	$this->load->view('backoffice/components/page_subhead');
?>
	
        
          <div class="span9">
      
         <h1>แสดงข้อมูลสมาชิก</h1>
         <br />
        
	        <!-- // inputnormal -->
		  <div class="well">
			
			<?php 
			 $idd=$this->uri->segment(4);
				$sql="select * from member where member_id=$idd";
				  $rs=$this->db->query($sql)->result();
				foreach($rs as $row){
			?>
			<p>ผู้ใช้ : <?= $row->member_user;?></p>
			<p>อีเมล์ : <?= $row->member_email;?></p>
			<p>เบอร์ติดต่อ : <?= $row->member_tel;?></p>
			<!-- <p>ที่อยู่ : <?= $row->member_address;?></p> -->
			<?php 
			 	$sql="select * from bid where bid_member=$idd";
				  $rs=$this->db->query($sql)->result();
				foreach($rs as $fett){
					$bid = $fett->bid_amount; 
				}
			?>
			<p>จำนวน Bid  : <?= $bid;?></p>
			<?= form_open("backoffice/member/edit/$idd", array('id' => 'contact'));?>
				<div class="well">
					
			    	  <label class="control-label">Block :
			    	  <input type="checkbox" value="yes" name="block" <? if($row->member_block=="yes"){ echo "checked";}else{ };?>>
			    	  </label>
			    	  
					<br />
					<input type="submit" name="update" id="button-progress" class="btn btn-success" data-loading-text="Loading now..." value="Confirm Block">
				</div>
			
			<?= form_close();?>
			
			<?= form_open("backoffice/member/edit_bid/$idd", array('id' => 'contact-form'));?>
				<div class="well">
				
					<label class="control-label" ></label>
			    	  <input type="radio" name="bid" value="plus" > เพิ่ม Bid<br />
			    	  <input type="radio" name="bid" value="del" > ลบ Bid
			    	
			    	  <br /> <br />
			    	  
					 <div class="control-group">
					  <label class="control-label">จำนวน Bid :</label>
					  <div class="controls">
					    <input type="text" name="b_amount" id="b_amount" class="span4">
					  </div>
					</div>
					
					<input type="hidden" value="<?= $idd;?>" name="user">			    	  
					<br />
					<input type="submit" name="send" id="button-progress" class="btn btn-success" data-loading-text="Loading now..." value="Confirm Edit">
				</div>
			
			<?= form_close();?>
			<? }?>
			
<!-- Validate-->
<script src="<?php echo site_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/script.js');?>"></script>                  
	     </div> <!-- well -->                   
	      
                     
          	                     
      </div><!--/span-->
     
 </div> <!-- spde bar--> 
        

<?php $this->load->view('backoffice/components/page_tail'); ?>