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
		        { 'bSortable': false, 'aTargets': [ 3 ] }
		    ]
		} );
	} );

</script>

<div class="span9">

         <h3><a href="<?= site_url("admin/layout_arch");?>"><i class="icon-arrow-left back-link"></i></a> แสดงข้อมูลแบบสถาปัตยกรรม</h3>
         <? echo $this->session->flashdata('feedback');?>
         <br />
             <table id="examples" class="table" >

                     <thead>
                       <tr>
                         <th width="10%" class="hidden-phone">ID</th>
                         <th width="20%" class="hidden-phone">วันเวลา</th>
                         <th width="35%">ชื่อแบบสถาปัตยกรรม</th>
                         <th width="20%"></th>
                       </tr>
                     </thead>

                     <tbody>
      <?php
     		 foreach($rs_layout as $row){
    		 	$id = $row['layout_id'];
    		 	$title = $row['layout_title'];
    		 	$detail = $row['layout_detail'];
    		 	$day = $row['layout_date'];

      ?>
            <tr>
			<td class="hidden-phone"><?= $id?></td>
			<td class="hidden-phone"><?= $day; ?></td>
			<td><?= $title;?> </td>
			<td class="center">
				<a href="<?= site_url();?>admin/layout_arch/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>
				<a href="<?= site_url();?>admin/layout_arch/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $title_th;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>

			</td>
		</tr>
			<? }?>
           </tbody>
         </table>

</div>  <!--/span-->





<?php $this->load->view('admin/components/page_tail'); ?>