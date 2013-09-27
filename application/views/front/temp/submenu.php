<div class="container bgNavZoneSub">

            <div class="masthead ">

                <nav class="subMenu">

                    <ul class="nav navbar-nav  ">
                         <li <? if($this->uri->segment(1)=="information_lanna"){ echo 'class="active"';};?> ><a href="<?= site_url('information_lanna');?>">ข้อมูลล้านนา</a></li>
						 <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">วัฒนธรรมและประเพณี <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= site_url("society/jan_1");?>">เดือนมกราคม</a></li>
                                <li><a href="<?= site_url("society/feb_1");?>">เดือนกุมภาพันธ์</a></li>
                                <li><a href="<?= site_url("society/mar_1");?>">เดือนมีนาคม</a></li>
                                <li><a href="<?= site_url("society/apr_1");?>">เดือนเมษายน</a></li>
                                <li><a href="<?= site_url("society/may_1");?>">เดือนพฤษภาคม</a></li>
                                <li><a href="<?= site_url("society/jun_1");?>">เดือนมิถุนายน</a></li>
                                <li><a href="<?= site_url("society/july_1");?>">เดือนกรกฎาคม</a></li>
                                <li><a href="<?= site_url("society/aug_1");?>">เดือนสิงหาคม</a></li>
                                <li><a href="<?= site_url("society/sep_1");?>">เดือนกันยายน</a></li>
                                <li><a href="<?= site_url("society/oct_1");?>">เดือนตุลาคม</a></li>
                                <li><a href="<?= site_url("society/nov_1");?>">เดือนพฤศจิกายน</a></li>
                                <li><a href="<?= site_url("society/dec_1");?>">เดือนธันวาคม</a></li>

                            </ul>
                        </li>
                        <li <? if($this->uri->segment(1)=="art"){ echo 'class="active"';};?> ><a href="<?= site_url('art');?>">ศิลปกรรม</a></li>
                        <li <? if($this->uri->segment(1)=="architecture"){ echo 'class="active"';};?> class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">ห้องสมุดสถาปัตยกรรม <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            	<li><a href="<?= site_url('architecture/information');?>">ข้อมูลทั่วไป</a></li>
                                <li><a href="<?= site_url('architecture/structure');?>">แบบสถาปัตยกรรม</a></li>
                                <li><a href="<?= site_url('architecture/model');?>">รูปหุ่นจำลอง</a></li>
                                <li><a href="<?= site_url('architecture/hologram');?>">ภาพ 3 มิติ</a></li>
                            </ul>
                        </li>
                        <li <? if($this->uri->segment(1)=="library"){ echo 'class="active"';};?>><a href="<?= site_url('library');?>">ห้องสมุดหนังสือ</a></li>
                        <li <? if($this->uri->segment(1)=="gallery" OR $this->uri->segment(1)=="gallery_more" OR $this->uri->segment(2)=="gallery_detail") { echo 'class="active"';};?> ><a href="<?= site_url('gallery');?>">ห้องสมุดภาพ</a></li>





                    </ul>


                </nav>
            </div><!-- end masthead-->
        </div><!--end continer-->