<?php  

$this->load->view('head');
$this->load->view('top_nav'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <?php  $this->load->view('left_nav'); ?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Dashboard</h1>
      <div class="row placeholders"> <?php echo CI_VERSION; ?></div>
    </div>
  </div>
</div>
<?php  $this->load->view('footer'); ?>
