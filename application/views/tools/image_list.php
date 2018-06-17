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
        <ul class="nav nav-tabs">
    <li class="active"><a href="#img" data-toggle="tab">Image Files</a></li>
    <li><a href="#pdf" data-toggle="tab">PDF Files</a></li>
  </ul>
        <div class="tab-content img_list">
          <div class="tab-pane fade in active" id="img">
            <div class="list">
              <?php 
			foreach ($images as $file){				
					$fname = $file['name'];
					$furl = "http://enews.airmilesme.com/".$fname;
					echo "<a href=\"$furl\" target=\"_blank\"><img src=\"$furl\" width=\"100\" vspace=\"5\" hspace=\"5\"/></a>";
				}
			
			?>
            </div>
          </div>
          <div class="tab-pane fade" id="pdf">
            <div class="col-sm-12">
              <?php 
			foreach ($pdfs as $pdf){				
					$fname = $pdf['name'];
					$furl = "http://enews.airmilesme.com/".$fname;
					$pdf_name = str_replace("am/mail-ex-pdf/","",$fname);
					echo "<div class=\"col-sm-1\"><a href=\"$furl\" target=\"_blank\"><img src=\"images/pdf.png\" width=\"50\" vspace=\"5\" hspace=\"5\"/ title=\"$pdf_name\"><small>".substr($pdf_name,0,12)."</small></a></div>";
				}
			
			?>
            </div>
          </div>
          
        </div>
        
      </div>
      </div>

    </div>
  </div>
</div>
</div>
<script>
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
  </script>
<?php  $this->load->view('footer'); ?>
