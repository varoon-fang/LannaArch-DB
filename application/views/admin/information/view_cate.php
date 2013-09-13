<?php 
	$this->load->view('admin/components/page_head'); 

      ?>

<!-- data table -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#examples').dataTable( {
			"aaSorting": [[ 0, "asc" ]],
			"sPaginationType": "full_numbers",
			"aoColumnDefs": [
		        { 'bSortable': false, 'aTargets': [ 2 ] }
		    ]
		} );
	} );

</script>


<?php
	$this->load->view('admin/components/page_subhead');
?>
	
       
<div class="span9">
      
         <h3>แสดงข้อมูลหมวดหมู่ข้อมูลทั่วไป</h3>
         <? echo $this->session->flashdata('feedback');?> 
         <br />
		 <a href="<?= site_url('admin/information/add_category');?>">
		 	<button type="button" class="btn btn-primary"><i class="icon-plus"> เพิ่มหมวดหมู่</i></button>
	 	</a>
		 <br /><br />
          <table id="examples" class="table table-hover" >
                   
                     <thead>
                       <tr>
                       	 <th width="10%" class="hidden-phone">ID </th>
                         <th width="40%">หมวดหมู่</th>
                         <th width="30%"></th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
      				
			 foreach($rs as $row){  
    		 	$id = $row['information_group_id'];
    		 	$title = $row['information_group_name'];
      ?>
            <tr>
            <td class="hidden-phone"><?= $id?></td>
            <td><?= $title;?></td>
			<td class="center">
				<a href="<?= site_url();?>admin/information/edit_category/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>	
				<a href="<?= site_url();?>admin/information/del_category/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete?') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
				
			</td>
		</tr>
			<? }?>
           </tbody>
         </table> 
         <br />
          
</div>  <!--/span-->
         

<?php $this->load->view('admin/components/page_tail'); ?>