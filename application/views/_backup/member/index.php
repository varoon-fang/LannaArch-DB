<?php 
	$this->load->view('backoffice/components/page_head'); 
	$this->load->view('backoffice/components/page_subhead');
?>
	
 <script type="text/javascript">
	function selectToggle(toggle, form) {
	     var myForm = document.forms[form];
	     for( var i=0; i < myForm.length; i++ ) { 
	          if(toggle) {
	               myForm.elements[i].checked = "checked";
	          } 
	          else {
	               myForm.elements[i].checked = "";
	          }
	     }
	}		
</script>
       
<div class="span9">
      
         <h2>แสดงข้อมูลสมาชิก</h2>
         
         <br />
		
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         
                         <th width="10%">รหัส</th>
                         <th width="20%">Status / Block</th>
                         <th width="30%">Name / Bid</th>
                         <th width="20%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from member where member_delete='no' order by member_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->member_id;
    		 	$username = $row->member_user;
    		 	$status= $row->member_status;
    		 	$block= $row->member_block;
    		 	
    		 $sql="select * from bid where bid_member= $id";
				$rs=$this->db->query($sql)->result();
					foreach($rs as $row){  
						$bid= $row->bid_amount;
					}
      ?>
            <tr>
            <td><?= $id?></td>
			<td><? if($status=='yes'){ echo '<i class="icon-ok-circle"></i>';}else{ echo '<i class="icon-minus-sign"></i>';}?>
			/			
			<? if($block=='yes'){ echo '<i class="icon-lock"></i>';}else{ echo '<i class="icon-unlock"></i>';}?></td>			
			<td><?= "$username / $bid";?> </td>
			<td class="center">
				<a href="<?= site_url();?>backoffice/member/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-search icon-white"></span> <strong> View</strong></a>
	            <a href="<?= site_url();?>backoffice/member/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $name;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong>Delete</strong></a>
			</td>
		</tr>
			<? }?>
           </tbody>
         </table> 
       
</div>  <!--/span-->
 
 </div> <!-- slide bar--> 
     

        

<?php $this->load->view('backoffice/components/page_tail'); ?>