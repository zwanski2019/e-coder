<?php  $this->load->view('head'); ?>
<?php  $this->load->view('top_nav'); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php  $this->load->view('left_nav'); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">E-Statement</h1>

          <div class="row placeholders">
            
            
          </div>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Country</th>
                  <th>Camp Name</th>
                  <th>Created By</th>
                  <th>Tools</th>
                </tr>
              </thead>
              <tbody>
           
            <?php 
			foreach ($records as $row){
				if ($row->topImg != NULL) {$statement="view_statement";$statementupdate="update_statement";}
				else {$statement="statement";$statementupdate="statement";}
				echo "<tr><td><a href=\"#\" title=\"".$row->country."\"><img src=\"".site_url()."images/".$row->country.".png\"></a></td>";
                echo "<td><a href=\"".site_url().$statementupdate."/".$row->stat_id."\" title=\"edit\">".$row->stat_name."</a></td>";
                echo "<td>".$row->createdBy."</td>";
                echo "<td><a href=\"".site_url().$statement."/".$row->stat_id."\" target=\"_blank\" class=\"btn\" title=\"pre-view\"><span class=\"glyphicon glyphicon-new-window\"></span></a>
			<a href=\"copy_statement/".$row->stat_id."\" title=\"Copy\" onclick=\"return confirm('Are you sure you want to copy this Campaigns?');\"><span class=\"glyphicon glyphicon-plus-sign\"></span></a>
			</td>";
			}
			
			?>
                
                
              </tbody>
            </table>
            <div align="right">
            <?php echo $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php  $this->load->view('footer'); ?>