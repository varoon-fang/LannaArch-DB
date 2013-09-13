<?php 
	$this->load->view('backoffice/components/page_head'); 
	$this->load->view('backoffice/components/page_subhead');
?>
	
        
<div class="span9">
      
         <h2>แสดงข้อมูลหมวดหมู่งาน</h2>
         
         <br />
       		
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         <th width="10%" class="hidden-phone">ID</th>
                          <th width="30%">ชื่อหมวดหมู่งาน</th>
                         <th width="30%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from category_job order by cate_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->cate_id;
    		 	$title = $row->cate_name;
    		 	//$detail = iconv_substr($detail_th, 0, 50, 'utf8');
      ?>
            <tr>
			<td class="hidden-phone"><?= $id?></td>
			<td><?= $title?></td>
			<td class="center">
				<a href="<?= site_url();?>backoffice/category/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>	
				<a href="<?= site_url();?>backoffice/category/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $title;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
				
			</td>
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
 
<!--  </div> --> <!-- slide bar--> 
     

        

<?php $this->load->view('backoffice/components/page_tail'); ?>