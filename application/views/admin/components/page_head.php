<!DOCTYPE html>
<html>
<head>
	<title><?php echo "backoffice"; ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
	<link href="<?php echo site_url('assets/css/bootstrap.css');?>" rel="stylesheet">
	
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      .tree{
  	      display: none;
	  }
	  .tree_show{
  	      display: show;
	     
      }
      #toc_outer{
      	<?php
	if(!$this->agent->is_mobile()){ ?>
		 display: show;
	<? }else{ ?>
		 display: none;
	<? }?>
	      
      }
      .error{
		 color: red;
	  }

    </style>
<link href="<?php echo site_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet">
<link href="<?php echo site_url('assets/css/progressButton.css');?>" rel="stylesheet">
<link href="<?php echo site_url('assets/css/bootstrap-fileupload.css');?>" rel="stylesheet">
   
   <!-- Bootstrap --> 
<!-- <script src="<?php echo site_url('assets/js/jquery.js');?>"></script> -->
<script src="<?php echo site_url('assets/js/bootstrap-transition.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-alert.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-confirm.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-modal.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-dropdown.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-scrollspy.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-tab.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-tooltip.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-popover.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-button.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-collapse.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-carousel.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-typeahead.js');?>"></script>


<!-- Button progress -->    
<script src="<?php echo site_url('assets/js/progressButton.js');?>"></script>
  
<!-- editor --> 
<script src="<?php echo site_url('assets/js/ck_4.1/ckeditor.js');?>"></script>	
<script src="<?php echo site_url('assets/js/ck_4.1/cke_editor.js');?>"></script>	

<!-- Bootstrap DateTime picker --> 
<link href="<?php echo site_url('assets/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url('assets/js/1.8.3.jquery.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>

<!-- Data Table -->
    <style type="text/css" title="currentStyle">
		@import "<?php echo site_url('assets/css/demo_table.css');?>";
	</style>
	
	
	<script type="text/javascript" language="javascript" src="<?php echo site_url('assets/js/jquery.dataTables.js');?>"></script>
		
