<html>
<head>
<meta charset="utf-8">
</head>

<body onload="fillCategory();">
<!-- Select Box -->
<script language="javascript" src="list.php"></script>
	<form name="drop_list"  action="" method="post"  class="span9" >
                <!-- // inputnormal -->
              
           <!--	Select Box-->
          <div class="control-group">
    	  <label class="control-label" for="name">ยี่ห้อรถ : </label>
    	  <div class="controls">
    	       <select name="group_car" id="group_car" onChange="SelectSubCat();" >
    <?php
    	
    	$sql1="select * from group_car where group_id=$group_car";
    		$result=mysql_query($sql1);
    		while ($record=mysql_fetch_array($result))
    		 {
    			$id=$record[0];
    			$title_en=$record[1];
			 }
    	?>
    	<option value="<? echo "$id";?>"><font color=\"red\"><? echo "$title_en";?></font></option>
        <!-- <option value="">เลือกยี่ห้อรถ</option> -->
    </select>&nbsp;

    	  </div>
    	</div>
     
   <div class="control-group">
    	  <label class="control-label" for="name">รุ่นรถ : </label>
    	  <div class="controls">
    	     <select id="sub_car" name="sub_car" onChange="SelectSubCatmodel();"  >
     <?php
     		$s_id=$id;
     		
     	$sql2="select * from sub_car where sub_id=$sub_car ";
     		$result2=mysql_query($sql2);
     		while ($record1=mysql_fetch_array($result2))
     		 {
     			$sub_id=$record1[0];
     			$title_en=$record1[1];
     			 }
     	?>
     	 <? if($sub_id==0){
     	
     	}else{
     		echo "<option value=\"$sub_id\">$title_en</option>";
     	}
     	?>
         <option value="">เลือกรุ่นรถ</option>
     </select>          	                   
  	  </div>
    	</div>
    	
    	 <div class="control-group">
    	  <label class="control-label" for="name">รุ่นย่อย : </label>
    	  <div class="controls">
    	     <select id="model_car" name="model_car">
     <?php
     		$s_id=$id;
     		
     	$sql3="select * from model_car where model_id=$model_car ";
     		$result3=mysql_query($sql3);
     		while ($record3=mysql_fetch_array($result3))
     		 {
     			$model_id=$record3['model_id'];
     			$model_name=$record3['model_name'];
     			 }
     	?>
     	 <? if($model_id==0){
     	
     	}else{
     		echo "<option value=\"$model_id\">$model_name</option>";
     	}
     	?>
         <option value="">เลือกโฉม</option>
     </select>          	                   
  	  </div>
    	</div>
	</form>
</body>
</html>