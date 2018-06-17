<?php
$title = "";
$externalHTML = "";
$link = "";
$tnc_id = "";
if ($this->uri->segment(2) == NULL) {$segment=0;} else {$segment=$this->uri->segment(2);}
if ($this->uri->segment(3) != NULL) {
	foreach ($records as $row){
		if($row->tnc_id == $this->uri->segment(3)){
			$title = $row->title;
			$externalHTML = $row->termsandcon;
			$link = $row->link;
			$tnc_id = $row->tnc_id;
		}
	
	}
}

?>

<!DOCTYPE html>

<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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

  <script src="<?php echo base_url()?>js/jquery.min.js"></script>

  <script src="<?php echo base_url()?>tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url()?>js/tinymc_form.js"></script>
</head>
  <body>
<?php  $this->load->view('top_nav'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <?php  $this->load->view('left_nav'); ?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <div class="row placeholders">
      <!----- accordin ---->
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Create File </a> </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse <?php if ($this->uri->segment(3)!=NULL) echo "in" ;?>">
              <div class="panel-body">
                  
                <?php 
		$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'edit');
		echo form_open_multipart('',$attributes); ?>
              <!--<div class="tnc_add_form">-->
              <div class="panel-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $title;?>" style="margin-left:10px; width:370px;">
                </div>
                <div class="form-group">
                  <textarea name="externalHTML" id="externalHTML" row="50" class="form-control" placeholder="Terms & Conditions"><?php echo $externalHTML;?>
</textarea>
                </div>
              </div>
              <div class="panel-footer">
              <?php if ($this->uri->segment(3)!=NULL) {
               print '<input name="save" type="submit" class="btn btn-success" id="save" style="width:200px;" value="Update"><input type="hidden" name="link" id="link" value="'.$link.'"><input type="hidden" name="tnc_id" id="tnc_id" value="'.$tnc_id.'">';
			  }
			  else print '<input name="save" type="submit" class="btn btn-success" id="save" style="width:200px;" value="Save">';
              ?>
              
             </div></form>
                
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> File List </a> </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse <?php if ($this->uri->segment(3)==NULL) echo "in" ;?>">
              <div class="panel-body">
              <table class="table table-striped">
              <thead>
                <tr>
                  <th>File Title</th>
                  <th>Created By</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
              <?php
			foreach ($records as $row){ 
                echo "<tr><td align=\"left\"><a href=\"".site_url()."create_files/".$segment."/".$row->tnc_id."\" title=\"edit\">".$row->title."</a></td>";
                echo "<td>".$row->createdBy."</td>";
                echo "<td><button type=\"button\" class=\"btn btn-warning btn-xs\" onclick=\"window.open('http://enews.airmilesme.com.s3.amazonaws.com/am/tnc/".$row->link.".html','_blank')\" title=\"view\"><span class=\"glyphicon glyphicon-file\"></span></button> </td>";
			}
			
			?>
                
                
              </tbody>
            </table>
            
            <div align="right">
            <?php 
			echo $this->pagination->create_links(); ?>
            </div>
            
              </div>
            </div>
          </div>
        </div>
      <!----- accordin ---->        
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
$(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
<?php $this->load->view('footer'); ?>