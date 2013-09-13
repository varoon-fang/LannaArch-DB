<?php 
	$this->load->view('admin/components/page_head'); 
	$this->load->view('admin/components/page_subhead');
?>
	
        
<div class="span9">
      
         <h2>แสดงข้อมูลสินค้า</h2>
         
         <br />
         <!--
<form name="form1">
			 <select class="span4" name="type" id="type" onChange="javascript:goToPage(options[selectedIndex].value)">
				<option value="">Choose Group</option>
				<option  value="pages-list.php?type=9" >ดูดไขมัน ต้นขาใน</option>
			</select>
		</form>
-->
		
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         <th width="10%" class="hidden-phone">ID</th>
                         <th width="15%" class="hidden-phone">Date</th>
                         <th width="40%">Title</th>
                         <th width="35%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from product order by product_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->product_id;
    		 	$title_th = $row->product_title;
    		 	$detail_th = $row->product_detail; 
    		 	$day = $row->product_day; 
      ?>
            <tr>
			<td class="hidden-phone"><?= $id?></td>
			<td class="hidden-phone"><?= $day?></td>
			<td><?= $title_th;?> </td>
			<td class="center">
				<a href="<?= site_url();?>admin/product/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>
	                                  <a href="<?= site_url();?>admin/product/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $title_th;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
			</td>
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
 
 </div> <!-- slide bar--> 
     

        

<?php $this->load->view('admin/components/page_tail'); ?>