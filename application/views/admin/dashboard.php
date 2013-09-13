<?php $this->load->view('admin/components/page_head'); ?>
 <!-- Chart -->
<script src="<?php echo site_url('assets/js/jquery.knob.js');?>"></script>
 <script>
            $(function() {
                $(".knob").knob();

                // Example of infinite knob, iPod click wheel
                var val,up=0,down=0,i=0
                    ,$idir = $("div.idir")
                    ,$ival = $("div.ival")
                    ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
                    ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
                $("input.infinite").knob(
                                    {
                                    'min':0
                                    ,'max':100
                                    ,'stopper':false
                                    ,'change':function(v){
                                                if(val>v){
                                                    if(up){
                                                        decr();
                                                        up=0;
                                                    }else{up=1;down=0;}
                                                }else{
                                                    if(down){
                                                        incr();
                                                        down=0;
                                                    }else{down=1;up=0;}
                                                }
                                                val=v;
                                            }
                                    }
                                    );

            });
        </script>
<?php $this->load->view('admin/components/page_subhead');?>
<div class="span9">

<h1>Welcome Backend</h1>
<br />
<?php
function DiskSize($path)
{
  $totalsize = 0;
  $totalcount = 0;
  $dircount = 0;
  if ($handle = opendir ($path))
  {
    while (false !== ($file = readdir($handle)))
    {
      $nextpath = $path . '/' . $file;
      if ($file != '.' && $file != '..' && !is_link ($nextpath))
      {
        if (is_dir ($nextpath))
        {
          $dircount++;
          $result = DiskSize($nextpath);
          $totalsize += $result['size'];
          $totalcount += $result['count'];
          $dircount += $result['dircount'];
        }
        elseif (is_file ($nextpath))
        {
          $totalsize += filesize ($nextpath);
          $totalcount++;
        }
      }
    }
  }
  closedir ($handle);
  $total['size'] = $totalsize;
  $total['count'] = $totalcount;
  $total['dircount'] = $dircount;
  return $total;
}

function SizeDisk_heang($size)
{
    if($size<1024)
    {
        return $size." bytes";
    }
    else if($size<(1024*1024))
    {
        $size1=round($size/1024,2);
        return $size1." Kb";
    }
    else if($size<(1024*1024*1024))
    {
        $size1=round($size/(1024*1024),2);
        return $size1." Mb";
    }
    else
    {
        $size1=round($size/(1024*1024*1024),2);
        return $size1." Gb";
    }

}

function sizeFormat_heang($size)
{
        return $size;
}
 $site1="/home/www/virtual/rgb7.com/htdocs";
$path1="$site1/";

$path= $path1;

$ar=DiskSize($path);

$total_disk  = (1.2 * 1024 * 1024 * 1024);
$size_disk_dud  =$ar['size'];
$free_disk  = ($total_disk - $size_disk_dud);

$dp2= round($size_disk_dud * 100/(1000*1024*1024),1);

?>
    <!--
<div class="span6">
    	<div class="well">
			<h2 class="text-info">Hosting Server</h2>
				<p><span class="label">Appservhosting.com</span></p>
			    <ul>
				    <li>Solution Atom </li>
				    <li>1.2 Gb of space</li>
				</ul>
			    <center>
				    <input class="knob" data-width="150" data-readonly="true" data-angleOffset="0" data-displayPrevious=true value="<?= $dp2;?>">
			    </center>			
				<hr>
			<h3>Disk use <?php echo "".SizeDisk_heang($ar['size']) . ""; ?></h3>
   	    </div>
    </div>
-->
    
    
    
       
</div><!--/span-->

</div> <!-- slide bar-->

<?php $this->load->view('admin/components/page_tail'); ?>