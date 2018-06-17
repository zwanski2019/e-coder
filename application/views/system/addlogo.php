<?php  $this->load->view('head'); ?>
<?php  $this->load->view('top_nav'); ?>


<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php  $this->load->view('left_nav'); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add Logo</h1>
          <div class="row placeholders">
            
            
          </div>

          <div class="table-responsive">
           
           <?php echo form_open_multipart();?>
           <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Add Logo </a> </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse <?php if ($error==1) echo "in";?>">
            <div class="panel-body">
              <div class="modal-body">
                <div class="form-group">
                  <div class="col-xs-12">
                    <input name="logo" type="file" class="btn"/>
                  </div>
                  <div class="row">
                  <div class="col-xs-6">
                  <input type="text" class="form-control" name="logo_name" id="logo_name" placeholder="Logo Name" value="">
                  </div>
                  <div class="col-xs-1">
                  <input type="text" class="form-control" name="logo_code" id="logo_code" placeholder="Code" value="">
                  </div>
                <div class="col-xs-5">
                  <input name="upload_logo" type="submit" value="Upload" class="btn">
                </div>
                </div>
                <div class="form-group">
                  <?php echo form_error('logo_name');echo form_error('logo_code'); ?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php echo form_close('');?> 
           
<!--           logos-->
<div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#statImages"> Logo List </a> </h4>
          </div>
          <div id="statImages" class="panel-collapse collapse <?php if ($error==0) echo "in";?>">
            <div class="panel-body">
              <?php
				foreach ($records as $row){ ?>
                  <div class="col-xs-2">
                  <img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$row->pCode?>.jpg" />
                  </div>
                  
                  
              <?php } ?>           

              
            </div>
          </div>
        </div>

<!--           logos-->
           
           
            <div align="right">
            <?php 
			echo $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>




<?php  $this->load->view('footer'); ?>