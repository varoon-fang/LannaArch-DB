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
      
         <h2>แสดงข้อมูลแบบสถาปัตยกรรม</h2>
         <? echo $this->session->flashdata('feedback');?> 
         <br />
		 <a href="<?= site_url('admin/layout_arch/add');?>">
		 	<button type="button" class="btn btn-success"><i class="icon-plus"> เพิ่มข้อมูล</i></button>
	 	</a> 
         <br /><br />
             <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         <th width="10%"></th>
                         <th width="35%">หมวดแบบสถาปัตยกรรม</th>
                         <th width="20%"></th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
     		 foreach($rs_layout->result_array() as $rows){ 
    		 	$group_id 	= $rows['layout_group'];
    		 	
    		 	$sql2="select * from layout_group where layout_group_id='$group_id' ";
			 		$rs=$this->db->query($sql2);
			
				 foreach($rs->result_array() as $row){ 
					$id 		= $row['layout_group_id'];
	    		 	$title 		= $row['layout_group_name'];
    			 }	
      ?>
            <tr>
			<td></td>
			<td><?= $title;?> </td>
			<td class="center">
				<a href="<?= site_url();?>admin/layout_arch/view/<?= $id;?>" class="btn btn-mini btn-info"><span class="icon-search icon-white"></span> <strong> <b class="hidden-phone">view</b></strong></a>	
				
			</td>
		</tr>
			<? }?>
           </tbody>
         </table> 
         
</div>  <!--/span-->
 
     

        

<?php $this->load->view('admin/components/page_tail'); ?>