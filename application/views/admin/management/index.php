<?php 
	$this->load->view('admin/components/page_head'); 
	$this->load->view('admin/components/page_subhead');
?>
<!-- data table -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#examples').dataTable( {
			"aaSorting": [[ 0, "asc" ]],
			"sPaginationType": "full_numbers",
			"aoColumnDefs": [
		        { 'bSortable': false, 'aTargets': [ 1, 4 ] }
		    ]
		} );
	} );

</script>	
        
<div class="span9">
      
         <h2>แสดงข้อมูลผู้ดูแลระบบ</h2>
         <? echo $this->session->flashdata('feedback');?> 
         <br />
       		<a href="<?= site_url('admin/management/add');?>">
		 	<button type="button" class="btn btn-warning"><i class="icon-plus"> เพิ่มผู้ดูแล</i></button>
	 	</a>
		 <br /><br />
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         <th width="15%" class="hidden-phone">ID</th>
                         <th width="10%">Status</th>
                         <th width="25%">Name</th>
                         <th width="25%">Type</th>
                         <th width="35%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			 foreach($rs as $row){  
    		 	$id = $row->admin_id;
    		 	$user = $row->admin_user;
    		 	$type = $row->admin_type;
    		 	$status = $row->admin_status;
    		 	
      ?>
            <tr>
			<td class="hidden-phone"><?= $id?></td>
			<td><? if($status=="yes"){ echo "<i class='icon-ok-sign'></i>";}else{ echo "<i class='icon-minus-sign'></i>";}?> </td>
			<td><?= $user?> </td>
			<td><?= $type?> </td>
			<td class="center">
				<a href="<?= site_url();?>admin/management/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>	
				<? if($status=='admin'){ }else{ ?>
				<a href="<?= site_url();?>admin/management/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $user;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
				<? }?>
			</td>
			
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
 
 </div> <!-- slide bar--> 
     

        

<?php $this->load->view('admin/components/page_tail'); ?>