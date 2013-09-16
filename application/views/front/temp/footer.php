
   <hr>

  <footer>


      <div class="col-md-4 col-sm-4 col-xs-6">

      		     <nav id="listFooter">
      		     		 <h3>ผังเว็บไซต์</h3>
		      		     <ul class=" list-unstyled">

		      		         <li><a href="<?= site_url();?>">หน้าหลัก</a></li>
		      		         <li><a href="<?= site_url("history");?>">ประวัติความเป็นมา</a></li>
		      		         <li><a href="<?= site_url("about");?>">เกี่ยวกับเรา</a></li>
		      		         <li><a href="<?= site_url("activity");?>">กิจกรรม</a></li>
		      		         <li><a href="<?= site_url("contact");?>">ติดต่อเรา</a></li>

		      		      </ul>

      		       </nav>


      </div>

        <div class="col-md-4 col-sm-4 col-xs-6">

            		     <nav id="listFooter">

            		     	<h3>ห้องสมุดออนไลน์</h3>
      		      		     <ul class=" list-unstyled">

      		      		         <li><a href="<?= site_url("library");?>">ห้องสมุดหนังสือ</a></li>
      		      		         <li><a href="<?= site_url("gallery");?>">ห้องสมุดภาพ</a></li>
      		      		         <li><a href="#">ห้องสมุดสถาปัตยกรรม</a></li>
      		      		         <li><a href="#">วัฒนธรรมและประเพณี</a></li>
      		      		         <li><a href="<?= site_url("art");?>">ศิลปกรรม</a></li>
      		      		         <li><a href="<?= site_url("information_lanna");?>">ข้อมูลล้านนา</a></li>

      		      		      </ul>

            		       </nav>

          </div>


      <div class="col-md-4 col-sm-4 col-xs-6 hidden-xs ">


         <address>

             <p><strong>ศูนย์ สถาปัตยกรรมล้านนา</strong><br>
              เลขที่ 117 ถนนราชดำเนิน ตำบลพระสิงค์ อำเภอเมือง จังหวัดเชียงใหม่ 50000 <br>
             โทร: 0 5327 7855, 0 5394 2803 โทรสาร: 0 5322 1448 <br>
               <strong>คณะสถาปัตยกรรมศาสตร์ มหาวิทยาลัยเชียงใหม่ </strong><br>
               239 ถนนห้วยแก้ว อำเภอเมือง จังหวัดเชียงใหม่ 50200<br>
             <strong>Lanna Architecture Center </strong><br>
             Faculty of Architecture, Chiang Mai University<br>
             117 Ratchadumnoen Street Prasing District, Amphur Muang<br> Chiang Mai, Thailand 50000<br>
             Tel: 0 5327 7855, 0 5394 2806-7 Fax: 0 5322 1448 </p>

         </address>


       </div><!--end col sm-4-->

      <br class="clearfix">

        <p class="pull-right"><a href="#">Back to top</a></p>


        <p class=" hidden-xs copyright">&copy; 2013 Lanna Architecture Center All rights reserved. </p>

      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= site_url();?>assetss/js/jquery.js"></script>
    <script src="<?= site_url();?>assetss/js/bootstrap.min.js"></script>
    <script src="<?= site_url();?>assetss/js/holder.js"></script>

    <script >

			    $('.carousel').carousel({
			      interval: 4000
			    })
    </script>
    <!-- =============== fancyBox main JS and CSS files =============-->

       	<script type="text/javascript" src="<?= site_url();?>assetss/source/jquery.fancybox.js?v=2.1.5"></script>
       	<link rel="stylesheet" type="text/css" href="<?= site_url();?>assetss/source/jquery.fancybox.css?v=2.1.5" media="screen" />

       	<!-- Add Button helper (this is optional) -->
       	<link rel="stylesheet" type="text/css" href="<?= site_url();?>assetss/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
       	<script type="text/javascript" src="<?= site_url();?>assetss/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

       	<!-- Add Thumbnail helper (this is optional) -->
       	<link rel="stylesheet" type="text/css" href="<?= site_url();?>assetss/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
       	<script type="text/javascript" src="<?= site_url();?>assetss/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
       	<script type="text/javascript">
       		$(document).ready(function() {
       			/*
       			 *  Simple image gallery. Uses default settings
       			 */

       			$('.fancybox').fancybox();

       			/*
       			 *  Different effects
       			 */


       		});
       	</script>

  </body>
</html>