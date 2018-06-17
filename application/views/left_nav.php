<div id='cssmenu'>
<ul>
   <li><a href="<?php echo base_url()?>"><?php echo $this->siteTitel ?></a></li>
   <li <?php if (uri_string()=="html_list") echo 'class="active"'; ?>><a href='#'><span> <i class="glyphicon glyphicon-th-list"></i> List</span></a>
      <ul <?php if (uri_string()=="html_list" || uri_string()=="statment_list") echo 'style="display: block;"'; ?>>
         <li><a href="<?php echo base_url()?>html_list"> News Letter</a></li>
		  <?php if ($this->user->get_program() == 'airmiles') { ?>
         <li><a href="<?php echo base_url()?>statment_list"> E-Statement</a></li>
		  <?php } ?>
      </ul>
   </li>
   <li><a href='#'><span> <i class="glyphicon glyphicon-pencil"></i> Create</span></a>
      <ul>
         <li><a href="<?php echo base_url()?>create_camp"> News Letter</a></li>
		  <?php if ($this->user->get_program() == 'airmiles') { ?>
          <li><a href="<?php echo base_url()?>create_statement"> E-Statement</a></li>
		  <?php } ?>
      </ul>
   </li>
   <li><a href='#'><span><i class="glyphicon glyphicon-wrench"></i> Tools</span></a>
  		 <ul <?php if (uri_string()=="image_list" || uri_string()=="upload_img" || $this->uri->segment(1)=="create_files") echo 'style="display: block;"'; ?>>
         <li><a href="<?php echo base_url()?>image_list">Image Gallary</a></li>
         <li><a href="<?php echo base_url()?>upload_img"> Upload Image</a></li>
          <li><a href="<?php echo base_url()?>create_files"> Create Files</a></li>
      </ul>
   </li>
    <li><a href='#'><span><i class="glyphicon glyphicon-cog"></i> System</span></a>
  		 <ul <?php if (uri_string()=="addlogo") echo 'style="display: block;"'; ?>>
         <li><a href="<?php echo base_url()?>addlogo"> Add logo</a></li>
      </ul>
   </li>
   
   <li><a href='#'><span><i class="glyphicon glyphicon-envelope"></i> Mass Mailer</span></a>
  		 <ul <?php if (uri_string()=="addressBook" || uri_string()=="sendMail" || uri_string()=="emailTemplates" || uri_string()=="report") echo 'style="display: block;"'; ?>>
         <li><a href="<?php echo base_url()?>addressBook"> Address Book</a></li>
         <li><a href="<?php echo base_url()?>emailTemplates"> E-Mail Templates</a></li>
         <li><a href="<?php echo base_url()?>sendMail"> Send Mail</a></li>
         <li><a href="<?php echo base_url()?>report"> Mailer Reports</a></li>
      </ul>
   </li>
   
</ul>
</div>