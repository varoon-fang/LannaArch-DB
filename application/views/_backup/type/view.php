<?php 
	$this->load->view('backoffice/components/page_head'); 
	$this->load->view('backoffice/components/page_subhead');
?>
	
        
<div class="span9">
      
         <h2> <a href="<?= site_url("backoffice/type");?>"> << </a> แสดงข้อมูลหมวดหมู่งาน</h2>
         
         <br />
       		
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         <th width="10%" class="hidden-phone">ID</th>
                          <th width="60%">ชื่อประเภทงาน</th>
                         <th width="30%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
      		$cate_id= $this->uri->segment(4);
			$sql="select * from type_job where cate_id='$cate_id' order by type_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->type_id;
    		 	$title = $row->type_name;
    		 	//$detail = iconv_substr($detail_th, 0, 50, 'utf8');
      ?>
            <tr>
			<td class="hidden-phone"><?= $id?></td>
			<td><?= $title?></td>
			<td class="center">
				<a href="<?= site_url();?>backoffice/type/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>	
				<a href="<?= site_url();?>backoffice/type/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $title;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
				
			</td>
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
 
<!--  </div> --> <!-- slide bar--> 
     

        

<?php $this->load->view('backoffice/components/page_tail'); ?>