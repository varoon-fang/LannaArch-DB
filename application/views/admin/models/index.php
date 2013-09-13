<?php 
	$this->load->view('admin/components/page_head'); 
	$this->load->view('admin/components/page_subhead');
?>
<!-- data table -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#examples').dataTable( {
			"aaSorting": [[ 1, "asc" ]],
			"sPaginationType": "full_numbers",
			"aoColumnDefs": [
		        { 'bSortable': false, 'aTargets': [ 0, 2 ] }
		    ]
		} );
	} );

</script>	
        
<div class="span9">
      
         <h2>แสดงข้อมูลรูปหุ่นจำลอง</h2>
          <? echo $this->session->flashdata('feedback');?>
         <br />
       		<a href="<?= site_url('admin/models/add');?>">
		 	<button type="button" class="btn btn-success"><i class="icon-plus"> เพิ่มข้อมูล</i></button>
	 	</a> 
         <br /><br />	
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         <th width="10%"></th>
                          <th width="30%">ชื่อรูปหุ่นจำลอง</th>
                         <th width="30%"></th>
                       </tr>
                     </thead>
                      	
                     <tbody>
                     <?php
                     foreach($res_models->result_array() as $row){ 
						$id 		= $row['models_id'];
		    		 	$title 		= $row['models_title'];
    			 	
    			 ?>
		 <tr>
			<td></td>
			<td><?= $title?></td>
			<td class="center">
				<a href="<?= site_url();?>admin/models/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>	
				<a href="<?= site_url();?>admin/models/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete?') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
				
			</td>
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
 
<!--  </div> --> <!-- slide bar--> 
     

        

<?php $this->load->view('admin/components/page_tail'); ?>