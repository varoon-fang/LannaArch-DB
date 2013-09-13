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
                          <th width="60%">ชื่อหมวดหมู่งาน</th>
                         <th width="30%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from type_job group by cate_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$cate_id = $row->cate_id;
    		 	$id = $row->type_id;
    		 	$title = $row->type_name;
    		 
    		 $sql2="select * from category_job where cate_id='$cate_id' order by cate_id asc";
				$res=$this->db->query($sql2)->result();
    		
    		 foreach($res as $rows){  
    		 	$cate_name = $rows->cate_name;	
    		 }
      ?>
            <tr>
			<td class="hidden-phone"><?= $id?></td>
			<td><?= $cate_name?></td>
			<td class="center">
				<a href="<?= site_url();?>backoffice/type/list_type/<?= $cate_id;?>" class="btn btn-mini btn-info"><span class="icon-list icon-white"></span> <strong> <b class="hidden-phone">view</b></strong></a>	
				
			</td>
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
 
<!--  </div> --> <!-- slide bar--> 
     

        

<?php $this->load->view('backoffice/components/page_tail'); ?>