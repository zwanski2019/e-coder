<!DOCTYPE html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $this->siteTitel ?></title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo base_url()?>css/dashboard.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/main.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/left_menu.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style id="holderjs-style" type="text/css"></style>

</head>
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url()?>css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
<script src="<?php echo base_url()?>tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url()?>js/tinymc_form.js"></script>
<script>$(document).ready(function() {
    $("#cam_theme").change(function() {
        var imgUrl = $(this).val();
		<?php
			foreach ($templates as $info){
				print 'if (imgUrl == "'.$info->templateFile.'" ){
						$("#swapImg").attr("src", "'.$info->thumb.'");
						}';						  
			}
		?>

    });
});
</script>
</head><body>
<?php  $this->load->view('top_nav'); ?>
<?php 
		$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open_multipart('',$attributes); ?>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
    <?php  $this->load->view('create_nav'); ?>
  </div>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  <div class="row">
    <div class="table-responsive col-sm-7"> 

      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Campaign Info </a> </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="cam_name" id="cam_name" placeholder="Campaign name">
                </div>
                <div class="form-group">
                      <select name="cam_theme" id="cam_theme" class="form-control" onchange="showData()">
						  <option value="">Select Theme</option>
                      <?php
					  foreach ($templates as $info){
						  echo "<option value=\"".$info->templateFile."\">".$info->templateName."</option>";
						  
						  }
					?>
                      </select>
                    </div>
                    <div class="form-group">
						
                      <select name="country" id="country" class="form-control">
						  <?php 
							foreach($_SESSION['countries'] as $key => $value) {
								print '<option value="'.$value.'">'.$key.'</option>';
							}
						?>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="sysType" id="sysType" class="form-control">
                        <?php 
							foreach($_SESSION['emailClient'] as $key => $value) {
								print '<option value="'.$value.'">'.$key.'</option>';
							}
						?>
                      </select>
                    </div>
					
                
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
    <div class="col-sm-5">
			<img id="swapImg" src="">
    </div>
	  </div>
    
  </div>
  
</div>
<?php echo form_close('');?> 
<script src="<?php echo site_url()?>js/bootstrap.min.js"></script> 

</body>
</html>