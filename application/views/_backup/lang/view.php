<?php 
	$this->load->view('admin/components/page_head'); 
	$this->load->view('admin/components/page_subhead');
?>
	
        
<div class="span9">
      
         <h2>แสดงข้อมูล SEO</h2>
         
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
                         <th width="10%">ID</th>
                         <th width="45%">Title</th>
                         <th width="45%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from tb_lang order by lang_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->lang_id;
    		 	$title = unserialize($row->lang_title);
    		 	$detail = unserialize($row->lang_detail);
      ?>
            <tr>
			<td><?= $id?></td>
			<td><?= $title[$this->session->userdata('language', 'english')];?> </td>
			<td class="center">
				<a href="<?= site_url();?>admin/lang/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> Edit</strong></a>
	                                  <a href="<?= site_url();?>admin/lang/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $head;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong>Delete</strong></a>
			</td>
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
 
 </div> <!-- slide bar--> 
     

        

<?php $this->load->view('admin/components/page_tail'); ?>