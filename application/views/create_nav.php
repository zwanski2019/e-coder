
<div id='cssmenu'>
<ul>
<?php 


switch ($this->uri->segment(1)) {

	case ("create_statement"):

	if ($stat_name){ ?>
   <li><a href="" class="active">Edit Menu</a></li>
   <li><button type="submit" name="create" id="create" value="create"><span>Create Statement</span></button></li>
   <li><a href="<?php echo base_url()?>" class="active"><span>Cancel</span></a></li>
   
   <?php 
	}
	break;
	case ("create_camp"):
   
   
   
    ?>
    
    <li><a href="" class="active">Edit Menu</a></li>
   <li><button type="submit" name="create" id="create" value="create"><span>Create Campaign</span></button></li>
   <li><a href="<?php echo base_url()?>" class="active"><span>Cancel</span></a></li>
    
    <?php
	break;
}
?>
</ul>
</div>