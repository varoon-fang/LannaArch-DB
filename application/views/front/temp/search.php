<div class="bookLibrarySearch well bgNavZoneSub">
			 <h3>ค้นหา</h3>

			 <form class="form-inline" action="<?= site_url('library/search_book');?>" methode="GET">

			  	<input class="form-control" id="focusedInput" name="keyword" type="text" placeholder="กรุณากรอกรายละเอียด..." >

			  	<div class="form-group ">
			  	    <label for="exampleInputEmail1">หมวดหมู่</label>
			  	    <select class="form-control" name="category">
			  	      <option value="">เลือกหมวดหมู่</option>
			  	      <?php foreach($list_cate->result_array() as $row){ ?>
			  	      <option value="<?= $row['ebook_group_id'];?>"><?= $row['ebook_group_name'];?></option>
			  	      <? }?>
			  	    </select>
			  	  </div>

			  	  <div class="form-group ">
			  	    <label for="exampleInputEmail1">คณะ ฯ</label>
			  	    <select class="form-control" name="major">
			  	      <option value="">เลือกคณะ</option>
			  	      <?php foreach($list_major as $rows){ ?>
			  	      <option value="<?= $rows['ebook_major'];?>"><?= $rows['ebook_major'];?></option>
			  	      <? }?>
			  	    </select>
			  	  </div>

			  	    <div class="form-group">
			  	        <label for="exampleInputEmail1">ปีที่วิจัย</label>
			  	        <select class="form-control" name="year">
			  	          <option value="">เลือกปีที่วิจัย</option>
			  	          <?php
			    	    		$now=date("Y");
			    	    		for($i=$now;$i>=2000;$i--){
				    	    ?>
				    	    	<option value="<?= $i;?>"><?= $i;?></option>
			    	    	<? }?>
			  	        </select>
			  	      </div>

			  	      <div class=" form-group ">

			  	          <div class="form-inline">

					  	      <div class="checkbox">
				  	      		  <label>
					  	            <input type="radio" value="" checked="checked" name="detail"> ทั้งหมด
					  	          </label>
					  	          <label>
					  	            <input type="radio" value="1" name="detail"> ผู้วิจัย
					  	          </label>
					  	          <label>
					  	            <input type="radio" value="2" name="detail"> เรื่อง
					  	          </label>
					  	        </div>

			  	         </div>

                      </div>


			  	       <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>
    			 </form>
		 </div>