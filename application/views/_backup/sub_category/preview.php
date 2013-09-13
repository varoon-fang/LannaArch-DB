<?php 
	$this->load->view('backoffice/components/page_head'); 
?>
<!-- data table -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#examples').dataTable( {
			"aaSorting": [[ 0, "asc" ]],
			"sPaginationType": "full_numbers",
			"aoColumnDefs": [
		        { 'bSortable': false, 'aTargets': [2] }
		    ]
		} );
	} );

</script>
<?php
	$this->load->view('backoffice/components/page_subhead');
?>
	
        
<div class="span9">
      
         <h2>แสดงข้อมูลประเภท</h2>
         <? echo $this->session->flashdata('feedback');?> 
         <br />
		 <a href="<?= site_url('backoffice/type/add');?>">
		 	<button type="button" class="btn btn-success"><i class="icon-plus"> เพิ่มประเภท</i></button>
	 	 </a>
		 <br /><br />
          <table id="examples" class="table table-hover">
                   
                     <thead>
                       <tr>
                       	 <th width="10%" class="hidden-phone">ID </th>
                         <th width="30%">ประเภท</th>
                         <th width="30%" ></th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from type_job where type_status='yes' order by type_id desc";
				$rs=$this->db->query($sql)->result();
    		$i=0;
    		 foreach($rs as $row){  
    		 	$id = $row->type_id;
    		 	$title = unserialize($row->type_name);
      ?>
            <tr>
            <td><?= $id?></td>
            <td><?= $title['thailand']?> | <?= $title['english'];?></td>
			<td class="center">
				<a href="<?= site_url();?>backoffice/type/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>	
				<a href="<?= site_url();?>backoffice/type/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete ? ') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
				
			</td>
		</tr>
			<? }?>
           </tbody>
         </table> 
         <br />
          
</div>  <!--/span-->
         

<?php $this->load->view('backoffice/components/page_tail'); ?>