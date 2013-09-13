<?php 
	$this->load->view('backoffice/components/page_head'); 

    		$query = $this->db->get_where('category_job', array('cate_preview' => '1'));
    		 $count= $query->num_rows();
    		 $num_count = 5-$count;
      ?>
<script type="text/javascript">
//<!--
//initial checkCount of zero
var checkCount=<?= $count;?>

//maximum number of allowed checked boxes
var maxChecks=3

function setChecks(obj){
//increment/decrement checkCount
if(obj.checked){
checkCount=checkCount+1
}else{
checkCount=checkCount-1
}
//if they checked a 4th box, uncheck the box, then decrement checkcount and pop alert
if (checkCount>maxChecks){
obj.checked=false
checkCount=checkCount-1
alert('สามารถเลือกได้เพียง '+maxChecks+' หมวดหมู่เท่านั้น');
exit();
}else{
		$(function(){
	  $("input[type='checkbox']").change(function(){
	  var item=$(this);    
	  if(item.is(":checked"))
	  {
	    window.location.href= item.data("target")
	  }else{
		window.location.href= item.data("target")  
	  }   
	 });
	});
}
}
//-->


</script>
<?php
	$this->load->view('backoffice/components/page_subhead');
?>
	
        
<div class="span9">
      
         <h2>แสดงข้อมูลหมวดหมู่งาน</h2>
         
         <br />
       	<?= form_open('backoffice/category/save_preview', array('name'=> 'form1'));?>	
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                       	 <th width="10%" class="hidden-phone">ID </th>
                         <th width="20%" class="hidden-phone">แสดงหน้าแรก</th>
                         <th width="30%">ชื่อหมวดหมู่งาน</th>
                         <th width="30%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from category_job order by cate_id desc";
				$rs=$this->db->query($sql)->result();
    		$i=0;
    		 foreach($rs as $row){  
    		 	$id = $row->cate_id;
    		 	$title = $row->cate_name;
    		 	//$detail = iconv_substr($detail_th, 0, 50, 'utf8');
      ?>
            <tr>
            <td><?= $id?></td>
            <td>
            <input type="checkbox" data-target="<?= site_url("backoffice/category/save_preview/$id");?>" <? if($row->cate_preview=='1'){ echo "checked"; }else{};?> value="yes" name="cke[]" id="check1" onclick="setChecks(this)">
            
            </td>
			<td><?= $title?></td>
			<td class="center">
				<a href="<?= site_url();?>backoffice/category/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>	
				<a href="<?= site_url();?>backoffice/category/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $title;?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
				
			</td>
		</tr>
			<? }?>
           </tbody>
         </table> 
         <br />
         
        <?= form_close();?>  
</div>  <!--/span-->
         

<?php $this->load->view('backoffice/components/page_tail'); ?>