<div class="container bgNavZoneSub">

            <div class="masthead ">

                <nav class="subMenu">

                    <ul class="nav navbar-nav  ">
                        <li <? if($this->uri->segment(1)=="library"){ echo 'class="active"';};?>><a href="<?= site_url('library');?>">ห้องสมุดหนังสือ</a></li>
                        <li <? if($this->uri->segment(1)=="gallery" OR $this->uri->segment(1)=="gallery_more" OR $this->uri->segment(2)=="gallery_detail") { echo 'class="active"';};?> ><a href="<?= site_url('gallery');?>">ห้องสมุดภาพ</a></li>

                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">วัฒนธรรมและประเพณี <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="library-culture-jan1.html">เดือนมกราคม</a></li>
                                <li><a href="library-culture-feb1.html">เดือนกุมภาพันธ์</a></li>
                                <li><a href="library-culture-mar1.html">เดือนมีนาคม</a></li>
                                <li><a href="library-culture-apr1.html">เดือนเมษายน</a></li>
                                <li><a href="library-culture-may1.html">เดือนพฤษภาคม</a></li>
                                <li><a href="library-culture-Jun1.html">เดือนมิถุนายน</a></li>
                                <li><a href="library-culture-Jly1.html">เดือนกรกฎาคม</a></li>
                                <li><a href="library-culture-aug1.html">เดือนสิงหาคม</a></li>
                                <li><a href="library-culture-sep1.html">เดือนกันยายน</a></li>
                                <li><a href="library-culture-oct1.html">เดือนตุลาคม</a></li>
                                <li><a href="library-culture-nov1.html">เดือนพฤศจิกายน</a></li>
                                <li><a href="library-culture-dec1.html">เดือนธันวาคม</a></li>

                            </ul>
                        </li>
                        <li <? if($this->uri->segment(1)=="art"){ echo 'class="active"';};?> ><a href="<?= site_url('art');?>">ศิลปกรรม</a></li>
                        <li <? if($this->uri->segment(1)=="lanna"){ echo 'class="active"';};?> ><a href="<?= site_url('lanna');?>">ข้อมูลล้านนา</a></li>
                        <li <? if($this->uri->segment(1)=="architecture"){ echo 'class="active"';};?> class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">ห้องสมุดสถาปัตยกรรม <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            	<li><a href="<?= site_url('architecture/information');?>">ข้อมูลทั่วไป</a></li>
                                <li><a href="<?= site_url('architecture/structure');?>">แบบสถาปัตยกรรม</a></li>
                                <li><a href="<?= site_url('architecture/model');?>">รูปหุ่นจำลอง</a></li>
                                <li><a href="<?= site_url('architecture/tree_d');?>">ภาพ 3 มิติ</a></li>
                            </ul>
                        </li>
                    </ul>


                </nav>
            </div><!-- end masthead-->
        </div><!--end continer-->