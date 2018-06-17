<?php  $this->load->view('head'); ?>
<?php  $this->load->view('top_nav'); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php  $this->load->view('left_nav'); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Mass Mailer Report</h1>

          <div class="row placeholders">
            
            
          </div>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Email</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
              <?php 
			foreach ($records as $row){ 
				echo "<tr><td><img src=\"".site_url()."images/".$row->status.".svg\"></td>";
                echo "<td>".$row->email."</a></td>";
                echo "<td>".$row->timeStamp."</td></tr>";
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
    
<?php  $this->load->view('footer'); ?>