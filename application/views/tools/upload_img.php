<?php  $this->load->view('head'); ?>
<?php  $this->load->view('top_nav'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <?php  $this->load->view('left_nav'); ?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Images</h1>
      <div class="row placeholders"> 
      <div class="table-responsive">      
        <?php 
		$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open_multipart('',$attributes); ?>
        <div class="form-group">
        <div class="col-sm-4">
            <div class="alert alert-warning">Only JPG, PNG and PDF are allowed to upload</div>
            <div style="padding-bottom:50px;"><input name="image" type="file" id="uploadFile" class="btn btn-primary"/></div>
            <div class="pull-left" style="padding-bottom:50px;"><input name="upload" type="submit" class="btn btn-success" id="upload" value="Upload"></div>
            <?php if($error!=NULL) {
          	echo "<div class=\"col-sm-12 alert alert-success\" style=\"float:left\">$error</div>";
            }
            ?>
          </div>
            <div class="col-sm-8" id="imagePreview"></div>

          </div>
      </div>
  		</form>
        
      </div>
      </div>

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
<?php  $this->load->view('footer'); ?>
