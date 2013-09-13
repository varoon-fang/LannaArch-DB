<?php 
	$this->load->view('backoffice/components/page_head'); 
	$this->load->view('backoffice/components/page_subhead');
?>
	
        
<div class="span9">
      
         <h2>แสดงข้อมูลแจ้งเตือน</h2>
         
         <br />
        
		
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         <th width="10%" class="hidden-phone">ID</th>
                         <th width="15%" class="hidden-phone">Type</th>
                         <th width="40%">Title</th>
                         <th width="35%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from warning_job order by warning_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->warning_id;
    		 	$type = $row->warning_type;
    		 	$detail = $row->warning_detail;
    		
      ?>
            <tr>
			<td class="hidden-phone"><?= $id?></td>
			<td><? if($type=='1'){ echo "บริษัท";}elseif($type=='2'){ echo "ตัวแทน";}elseif($type=='3'){ echo "บุคคลทั่วไป";}else{ echo "-";}?></td>
			<td><?= word_limiter($detail,20);?> </td>
			<td class="center">
				<a href="<?= site_url();?>backoffice/warning/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>
	                                  <a href="<?= site_url();?>backoffice/warning/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $title_th['english'];?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
			</td>
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
        

<?php $this->load->view('backoffice/components/page_tail'); ?>