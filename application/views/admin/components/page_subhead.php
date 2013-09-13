</head>
<body>
<?php
//session_start();
	if(!$this->session->userdata('logged_in'))
    {
      //If no session, redirect to login page
      redirect('admin/login', 'refresh');
	}

?>
<script>
$(document).ready(function () {
	$('label.tree-toggler').click(function () {
	$(this).parent().children('ul.tree').toggle(300);
	});
});
</script>
<!-- auto close alert -->
<script>
	window.setTimeout(function() {
    $("#alert-message").fadeTo(700, 0).slideUp(700, function(){
        $(this).remove();
    });
}, 1000);
</script>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?= site_url();?>"><p><i class="icon-home"></i></p></a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<!-- <li <? if($this->uri->segment(2)=="dashboard"){ echo "class=\"active\"";}?>><a href="<?= site_url();?>admin/dashboard"><i  class=" <? if($this->uri->segment(2)=="dashboard"){ echo 'active';}?>  "></i>  Dashboard</a></li> -->

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
						<li class="dropdown hidden-desktop ">
		                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> กิจกรรม <b class="caret"></b></a>
		                  <ul class="dropdown-menu">
		                    <li <? if($this->uri->segment(2)=="activity" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/activity/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="activity" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/activity');?>"><i class="icon-list-alt"></i>  จัดการข้อมูลกิจกรรม</a></li>
		                  </ul>
		                </li>
						<? }?>

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
						<li class="dropdown hidden-desktop ">
		                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> ห้องสมุดภาพ <b class="caret"></b></a>
		                  <ul class="dropdown-menu">
		                   <li <? if($this->uri->segment(2)=="gallery" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/gallery/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/gallery');?>"><i class="icon-picture"></i>  จัดการข้อมูลห้องสมุดภาพ</a></li>
		                  </ul>
		                </li>
						<? }?>

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
						<li class="dropdown hidden-desktop ">
		                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> แบบสถาปัตยกรรม <b class="caret"></b></a>
		                  <ul class="dropdown-menu">
		                   <li <? if($this->uri->segment(2)=="layout_arch" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/layout_arch/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="layout_arch" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/layout_arch');?>"><i class="icon-home"></i>  จัดการข้อมูลแบบสถาปัตยกรรม</a></li>
		                  </ul>
		                </li>
						<? }?>

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
						<li class="dropdown hidden-desktop ">
		                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> ข้อมูลทั่วไป <b class="caret"></b></a>
		                  <ul class="dropdown-menu">
		                   <li <? if($this->uri->segment(2)=="layout_arch" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/layout_arch/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="layout_arch" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/layout_arch');?>"><i class="icon-file"></i>  จัดการข้อมูลข้อมูลทั่วไป</a></li>
		                  </ul>
		                </li>
						<? }?>

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
						<li class="dropdown hidden-desktop ">
		                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> ห้องสมุดหนังสือ <b class="caret"></b></a>
		                  <ul class="dropdown-menu">
		                   <li <? if($this->uri->segment(2)=="ebook" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/ebook/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="ebook" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/ebook');?>"><i class="icon-book"></i>  จัดการข้อมูลห้องสมุดหนังสือ</a></li>
		                  </ul>
		                </li>
						<? }?>

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
						<li class="dropdown hidden-desktop ">
		                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> ภาพสามมิติ <b class="caret"></b></a>
		                  <ul class="dropdown-menu">
		                    <li <? if($this->uri->segment(2)=="tree_d" && $this->uri->segment(3)==""){ $p_view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/tree_d/');?>"><i class="icon-film"></i>  จัดการข้อมูลภาพสามมิติ</a></li>
		                  </ul>
		                </li>
						<? }?>

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
						<li class="dropdown hidden-desktop ">
		                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> ภาพหุ่นจำลอง <b class="caret"></b></a>
		                  <ul class="dropdown-menu">
		                    <li <? if($this->uri->segment(2)=="models" && $this->uri->segment(3)==""){ $p_view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/models/');?>"><i class="icon-user"></i>  จัดการข้อมูลภาพหุ่นจำลอง</a></li>
		                  </ul>
		                </li>
						<? }?>

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
						<li class="dropdown hidden-desktop">
		                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> รูปภาพหน้าหลัก<b class="caret"></b></a>
		                  <ul class="dropdown-menu">
		                    <li <? if($this->uri->segment(2)=="banner" && $this->uri->segment(3)==""){ $p_view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/banner/');?>"><i class="icon-picture"></i>  จัดการภาพหน้าหลัก</a></li>
		                  </ul>
		                </li>
						<? }?>

						<?php
							if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
							<li class=" hidden-desktop">
			                  <a href="<?= site_url('admin/template');?>" > แบบโครงร่าง<b class="caret"></b></a>
							</li>
						<? }?>
				</ul>

				<div class="pull-right">
					<ul class="nav pull-right">
					 <li class="dropdown"><a href="<?= site_url();?>admin/dashboard" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i>  <?= $this->session->userdata['logged_in']['username'];?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
					<?php
						if($this->session->userdata['logged_in']['type']!="admin"){?>
						<li><a href="<?= site_url();?>admin/profile"><i class="icon-user "></i> โปรไฟล์</a></li>
						<li class="divider"></li>
						<li><a href="<?= site_url();?>admin/dashboard/logout"><i class="icon-off"></i> Logout</a></li>
					<? }else{?>
						<li><a href="<?= site_url();?>admin/management"><i class="icon-wrench  "></i> จัดการผู้ใช้</a></li>
						<li class="divider"></li>
						<li><a href="<?= site_url();?>admin/profile"><i class="icon-user "></i> โปรไฟล์</a></li>
						<li class="divider"></li>
						<li><a href="<?= site_url();?>admin/profile/backup"><i class="icon-download-alt "></i> Backup</a></li>
						<li class="divider"></li>
						<li><a href="<?= site_url();?>admin/dashboard/logout"><i class="icon-off"></i> Logout</a></li>
					<? }?>

					</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

												<!-- ////////// Slide bar //////////////// -->

<div class="container-fluid ">

    <div class="span3 hidden-phone">
      <div class="well sidebar-nav ">
         <ul class="nav nav-list  ">

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">กิจกรรม</label>
					<ul class="nav nav-list  <?if($this->uri->segment(2)=="activity" ){ echo "tree_show";}else{ echo "tree";};?>">
						<li <? if($this->uri->segment(2)=="activity" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/activity/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="activity" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/activity');?>"><i class="icon-list-alt"></i>  จัดการข้อมูลกิจกรรม</a></li>
					</ul>
				</li>
				<? }?>

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">ห้องสมุดภาพ</label>
					<ul class="nav nav-list  <?if($this->uri->segment(2)=="gallery" ){ echo "tree_show";}else{ echo "tree";};?>">
						<li <? if($this->uri->segment(2)=="gallery" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/gallery/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/gallery');?>"><i class="icon-picture"></i>  จัดการข้อมูลห้องสมุดภาพ</a></li>
					</ul>
				</li>
				<? }?>

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">แบบสถาปัตยกรรม</label>
					<ul class="nav nav-list  <?if($this->uri->segment(2)=="layout_arch" ){ echo "tree_show";}else{ echo "tree";};?>">
						<li <? if($this->uri->segment(2)=="layout_arch" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/layout_arch/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="layout_arch" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/layout_arch');?>"><i class="icon-home"></i>  จัดการข้อมูลแบบสถาปัตยกรรม</a></li>
					</ul>
				</li>
				<? }?>

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">ข้อมูลทั่วไป</label>
					<ul class="nav nav-list  <?if($this->uri->segment(2)=="information" ){ echo "tree_show";}else{ echo "tree";};?>">
						<li <? if($this->uri->segment(2)=="information" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/information/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="information" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/information');?>"><i class="icon-file"></i>  จัดการข้อมูลข้อมูลทั่วไป</a></li>
					</ul>
				</li>
				<? }?>

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">ห้องสมุดหนังสือ</label>
					<ul class="nav nav-list  <?if($this->uri->segment(2)=="ebook" ){ echo "tree_show";}else{ echo "tree";};?>">
						<li <? if($this->uri->segment(2)=="ebook" && ($this->uri->segment(3)=="category") ){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/ebook/category');?>"><i class="icon-th-large"></i>  จัดการข้อมูลหมวดหมู่</a></li>
						<li class="divider"></li>
						<li <? if($this->uri->segment(2)=="ebook" && $this->uri->segment(3)==""){ $view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/ebook');?>"><i class="icon-book"></i>  จัดการข้อมูลห้องสมุดหนังสือ</a></li>
					</ul>
				</li>
				<? }?>

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">ภาพสามมิติ</label>
					<ul class="nav nav-list <?if($this->uri->segment(2)=="tree_d"){ echo "tree_show";}else{ echo "tree";};?>" >
						<li <? if($this->uri->segment(2)=="tree_d" && $this->uri->segment(3)==""){ $p_view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/tree_d/');?>"><i class="icon-film"></i>  จัดการข้อมูลภาพสามมิติ</a></li>
					</ul>
				</li>
				<? }?>

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">ภาพหุ่นจำลอง</label>
					<ul class="nav nav-list <?if($this->uri->segment(2)=="models"){ echo "tree_show";}else{ echo "tree";};?>" >
						<li <? if($this->uri->segment(2)=="models" && $this->uri->segment(3)==""){ $p_view='icon-white'; echo "class=\"active\" "; } ?>><a href="<?= site_url('admin/models/');?>"><i class="icon-user"></i>  จัดการข้อมูลภาพหุ่นจำลอง</a></li>
					</ul>
				</li>
				<? }?>

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">รูปภาพหน้าหลัก</label>
					<ul class="nav nav-list  <?if($this->uri->segment(2)=="banner"){ echo "tree_show";}else{ echo "tree";};?>">
						<li <? if($this->uri->segment(3)=="add_banner1" && $this->uri->segment(2)=="banner"){ $cate_add='icon-white'; echo "class=\"active\"  "; } ?>><a href="<?= site_url('admin/banner/add_banner1');?>"><i class="icon-picture"></i>  จัดการภาพหน้าหลัก</a></li>
					</ul>
				</li>
				<? }?>

				<?php
					if($this->session->userdata['logged_in']['status']!="yes"){ }else{?>
				<li><label class="tree-toggler nav-header">แบบเว็บไซต์</label>
					<ul class="nav nav-list  <?if($this->uri->segment(2)=="template"){ echo "tree_show";}else{ echo "tree";};?>">
						<li <? if($this->uri->segment(2)=="template"){ $cate_add='icon-white'; echo "class=\"active\"  "; } ?>><a href="<?= site_url('admin/template');?>"><i class="icon-picture"></i>  จัดการ template</a></li>
					</ul>
				</li>
				<? }?>

            </ul>
          </div><!--/.well -->
        </div><!--/span-->
 <!-- end hidden slider-->
