
 <div class="container bgHeaderZone">

   <header id="headerZone">

    <div class="pull-left">
      <img src="<?= site_url();?>assetss/img/logo.png" alt="ศูนย์สถาปัตยกรรมล้านนา คุ้มเจ้าบุรีรัตน์">
    </div>

    <div class="pull-right">

    <address>

        <p>Lanna Architecture Center <br>
        Faculty of Architecture, Chiang Mai University <br>
         Tel: 0 5327 7855, 0 5394 2806-7 Fax: 0 5322 1448</p>

    </address>


    </div>

   </header>

  </div>

   <!-- Navigator
   ================================================== -->


      <div class="container bgNavZone">

		     <div class="masthead ">


		     <nav >

		       <ul class="nav nav-justified  ">
		         <li <? if($this->uri->segment(1)==""){ echo 'class="active"';};?>><a href="<?= site_url();?>">หน้าหลัก </a></li>
		         <li <? if($this->uri->segment(1)=="history"){ echo 'class="active"';};?> ><a href="<?= site_url("history");?>">ประวัติความเป็นมา </a></li>
		         <li <? if($this->uri->segment(1)=="about"){ echo 'class="active"';};?> ><a href="<?= site_url("about");?>">เกี่ยวกับเรา</a></li>
		         <li <? if($this->uri->segment(1)=="library"){ echo 'class="active"';};?> ><a href="<?= site_url("library");?>" >ห้องสมุดออนไลน์ </a></li>
		         <li <? if($this->uri->segment(1)=="activity"){ echo 'class="active"';};?> ><a href="<?= site_url("activity");?>">กิจกรรม</a></li>
		         <li <? if($this->uri->segment(1)=="contact"){ echo 'class="active"';};?> ><a href="<?= site_url("contact");?>">ติดต่อเรา</a></li>
		       </ul>
		                </nav>
		     </div><!-- end masthead-->



      </div><!--end continer-->

