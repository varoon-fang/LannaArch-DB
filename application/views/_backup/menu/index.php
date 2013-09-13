<?php 
	$this->load->view('backoffice/components/page_head'); 
	
$query = $this->db->get_where('menu', array('menu_status' => '1'));
    		 $count= $query->num_rows();
    		 $num_count = 2-$count;
      ?>
<script type="text/javascript">
//<!--
//initial checkCount of zero
var checkCount=<?= $count;?>

//maximum number of allowed checked boxes
var maxChecks=<?= $num_count;?>

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
alert('สามารถเลือกได้เพียง '+maxChecks+' รายการเท่านั้น');
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

</script>
	
        
<div class="span9">
      
         <h2>แสดงข้อมูลเมนู</h2>
         
         <br />
        
		
          <table id="examples" class="table" >
                   
                     <thead>
                       <tr>
                         <th width="10%" class="hidden-phone">ID</th>
                         <th width="15%" class="hidden-phone">สถานะ</th>
                         <th width="40%">Title</th>
                         <th width="35%">Action</th>
                       </tr>
                     </thead>
                      	
                     <tbody>
      <?php
			$sql="select * from menu order by menu_id desc";
				$rs=$this->db->query($sql)->result();
    		
    		 foreach($rs as $row){  
    		 	$id = $row->menu_id;
    		 	$name = $row->menu_name;
    		 	$status = $row->menu_status;
    		
      ?>
            <tr>
			<td class="hidden-phone"><?= $id?></td>
			<td><input type="checkbox" data-target="<?= site_url("backoffice/menu/change_status/$id");?>" <? if($status=='1'){ echo "checked"; }else{};?> value="yes" name="cke[]" id="check1" onclick="setChecks(this)">
			</td>
			<td><?= $name?> </td>
			<td class="center">
				<a href="<?= site_url();?>backoffice/menu/edit/<?= $id;?>" class="btn btn-mini btn-primary"><span class="icon-edit icon-white"></span> <strong> <b class="hidden-phone">Edit</b></strong></a>
	                                  <a href="<?= site_url();?>backoffice/menu/delete/<?= $id;?>" class="btn btn-mini btn-danger"  onclick="return confirm('Delete? <?= $title_th['english'];?>') " title="ลบ"><span class="icon-trash icon-white"></span> <strong><b class="hidden-phone">Delete</b></strong></a>
			</td>
		</tr>
			<? }?>
           </tbody>
         </table>   
</div>  <!--/span-->
        

<?php $this->load->view('backoffice/components/page_tail'); ?>