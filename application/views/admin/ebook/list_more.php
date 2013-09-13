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
		        { 'bSortable': false, 'aTargets': [ 4 ] }
		    ]
		} );
	} );

</script>

<div class="span9">

         <h3><a href="<?= site_url("admin/ebook");?>"><i class="icon-arrow-left back-link"></i></a> แสดงข้อมูลห้องสมุดหนังสือ</h3>
         <? echo $this->session->flashdata('feedback');?>
         <br />
             <table id="examples" class="table" >

                     <thead>
                       <tr>
                         <th width="10%" class="hidden-phone">ID</th>
                         <th width="15%" class="hidden-phone">ปีที่วิจัย</th>
                         <th width="25%">ชื่อหนังสือ</th>
                         <th width="25%">ชื่อผู้วิจัย</th>
                         <th width="20%"></th>
                       </tr>
                     </thead>

                     <tbody>
      <?php
     		 foreach($rs_ebook as $row){
    		 	$id = $row['ebook_id'];
    		 	$title = $row['ebook_title'];
    		 	$research = $row['ebook_researcher'];
    		 	$day = $row['ebook_research_year'];

      ?>
            <tr>
			<td><?= $id?></td>
			<td><?= $day; ?></td>
			<td><?= $research; ?></td>
			<td><?= $title;?> </td>
			<td class="center">
				<a href="<?= site_url();?>admin/ebook/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>
				<a href="<?= site_url();?>admin/ebook/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $title_th;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>

			</td>
		</tr>
			<? }?>
           </tbody>
         </table>

</div>  <!--/span-->





<?php $this->load->view('admin/components/page_tail'); ?>