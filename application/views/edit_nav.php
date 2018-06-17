<?php

switch ($this->uri->segment(1)) {

	case ("template"):
?>
<div id='cssmenu'>
<ul>
   <li><a href="" class="active">Edit Menu</a>
      <ul style="display: block;">
          <li><a href="<?php echo base_url()?>create_online_html/<?php echo $cam_id;?>" target="_blank">View HTML</a></li>
          <li><a href="<?php echo base_url()?>create_online_html/<?php echo $cam_id;?>/save" target="_blank">Download</a></li>
          <li><a href="<?php echo base_url()?>copy_camp/<?php echo $cam_id;?>">Copy Campagin</a></li>
          <?php if ($cam_lock=="n") { ?>
          <li><a href="<?php echo base_url()."deleteCamp/".$cam_id;?>" onclick="return confirm('Are you sure you want to delete this Campaign?');">Delete HTML</a></li>
          <li><a href="<?php echo base_url()."lockCamp/".$cam_id;?>/y">Lock HTML</a></li>
          <?php } else {?>
          <li><a href="<?php echo base_url()."lockCamp/".$cam_id;?>/n" onclick="return confirm('Are you sure you want to Un-Lock this Campaign?');">Un-Lock HTML</a></li>          
          <?php }?>
          <li><a href="#" data-toggle="modal" data-target="#testEmail" class="forgotPass">Send Test Email</a></li>
      </ul>
   </li>
   <?php if ($cam_lock=="n") { ?>
   <li><button type="submit" name="update" id="update" value="Update"><span>Update</span></button></li>
   <?php } ?>
   <li><a href="<?php echo base_url()?>html_list" class="active"><span>Close</span></a></li>
</ul>
</div>
<div class="edit_info">
<div class="row">Updated By : <?php echo $createdBy?></div>
<div class="row">Last update : <?php echo date('d M Y', strtotime($edited))?></div>
</div>
<?php
	break;
	case ("update_statement"):

?>
<div id='cssmenu'>
<ul>
   <li><a href="" class="active">Edit Menu</a>
      <ul style="display: block;">
          <li><a href="<?php echo base_url()?>view_statement/<?php echo $stat_id;?>" target="_blank">View Statement</a></li>
          <li><a href="<?php echo base_url()?>download_statement/<?php echo $stat_id;?>" target="_blank">Download Statement</a></li>
          
          <?php if ($cam_lock=="n") { ?>
          <li><a href="<?php echo base_url()?>deleteStatement/<?php echo $stat_id;?>" onclick="return confirm('Are you sure you want to delete this Campaigns?');">Delete Statement</a></li>
          <li><a href="<?php echo base_url()."lockStatement/".$stat_id;?>/y">Lock HTML</a></li>
          <?php } else {?>
          <li><a href="<?php echo base_url()."lockStatement/".$stat_id;?>/n" onclick="return confirm('Are you sure you want to Un-Lock this Campaign?');">Un-Lock HTML</a></li>          
          <?php }?>
          <li><a href="#" data-toggle="modal" data-target="#testEmail">Send Test Email</a></li>
      </ul>
   </li>
   <?php if ($cam_lock=="n") { ?>
   <li><button type="submit" name="update" id="update" value="Update"><span>Update</span></button></li>
   <?php } ?>
   <li><a href="<?php echo base_url()?>statment_list" class="active"><span>Close</span></a></li>
</ul>
</div>
<div class="edit_info">
<div class="row">Updated By : <?php echo $createdBy?></div>
<div class="row">Last update : <?php echo date('d M Y', strtotime($edited))?></div>
</div>

<?php
	break;
}
?>