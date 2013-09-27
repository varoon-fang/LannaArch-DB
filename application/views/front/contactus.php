<!-- auto close alert -->
<script>
	window.setTimeout(function() {
    $("#alert-message").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove();
    });
}, 2000);
</script>
<!-- NAVBAR
================================================== -->
  <body class="bgBodyZone">

  <!-- Menu Header
  ================================================== -->
 	<?= $this->load->view('front/temp/menu');?>

    <div class="container bgContentZone">

  <!--=========Content====================-->
    <div class="content-sub-section">

	  <section id="subContent">
		  <h1>ติดต่อเรา</h1>
		 <div class="row">
		  <div class="col-xs-8">
		  		<? echo $this->session->flashdata('feedback');?>
			  <?= form_open('contact');?>
			    <div class="form-group">
			      <label for="exampleInputEmail1">ชื่อ </label>
			      <input type="text" name="name" class="form-control" id="NameContact" placeholder="กรอกชื่อ...">
			    </div>
			    <div class="form-group">
			      <label for="exampleInputPassword1">หัวข้อ</label>
			      <input type="text" class="form-control" id="toppicContact" name="title" placeholder="กรอกหัวข้อ...">
			    </div>
			    <div class="form-group">
			      <label for="exampleInputPassword1">รายละเอียด</label>
			      <textarea id="bodyContact" class="form-control" name="detail" rows="3"></textarea>
			    </div>
			    <div class="form-group">

			    </div>
			    <input type="submit" name="send" class="btn btn-default" value="Send">
			  </form>
		  </div>
		  <div class="col-xs-4">
		 <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/maps?f=q&amp;source=s_q&amp;hl=th&amp;geocode=&amp;q=%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C+%E0%B8%AA%E0%B8%96%E0%B8%B2%E0%B8%9B%E0%B8%B1%E0%B8%95%E0%B8%A2%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%A5%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%99%E0%B8%B2&amp;aq=&amp;sll=13.038936,101.490104&amp;sspn=26.072295,46.538086&amp;ie=UTF8&amp;hq=%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C+%E0%B8%AA%E0%B8%96%E0%B8%B2%E0%B8%9B%E0%B8%B1%E0%B8%95%E0%B8%A2%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%A5%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%99%E0%B8%B2&amp;hnear=&amp;ll=18.788076,98.988327&amp;spn=0.071946,0.071946&amp;t=m&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.th/maps?f=q&amp;source=embed&amp;hl=th&amp;geocode=&amp;q=%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C+%E0%B8%AA%E0%B8%96%E0%B8%B2%E0%B8%9B%E0%B8%B1%E0%B8%95%E0%B8%A2%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%A5%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%99%E0%B8%B2&amp;aq=&amp;sll=13.038936,101.490104&amp;sspn=26.072295,46.538086&amp;ie=UTF8&amp;hq=%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C+%E0%B8%AA%E0%B8%96%E0%B8%B2%E0%B8%9B%E0%B8%B1%E0%B8%95%E0%B8%A2%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%A5%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%99%E0%B8%B2&amp;hnear=&amp;ll=18.788076,98.988327&amp;spn=0.071946,0.071946&amp;t=m" style="color:#0000FF;text-align:left">ดูแผนที่ขนาดใหญ่ขึ้น</a></small>
		  </div>
		 </div>
	   </section><!--end subContent-->

	   <section id="subContent">
		  <h1>เกี่ยวกับเรา</h1>
		  <h3><b>Lanna Architecture Center</b></h3>
		  <p>ศูนย์ สถาปัตยกรรมล้านนา เลขที่ 117 ถนนราชดำเนิน ตำบลพระสิงค์ อำเภอเมือง จังหวัดเชียงใหม่ 50000 </p>
		  <p>โทร: 0 5327 7855, 0 5394 2803 โทรสาร: 0 5322 1448 หรือ http://www.arc.cmu.ac.th</p>
		<p>คณะสถาปัตยกรรมศาสตร์ มหาวิทยาลัยเชียงใหม่ 239 ถนนห้วยแก้ว อำเภอเมือง จังหวัดเชียงใหม่ 50200</p>

	   </section><!--end subContent-->

    </div>

   <!-- FOOTER -->