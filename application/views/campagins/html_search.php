<?php  $this->load->view('head'); ?>
<?php  $this->load->view('top_nav'); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php  $this->load->view('left_nav'); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Campaign Search</h1>

          <div class="row placeholders">
            
            
          </div>

          <div class="table-responsive">
          <div class="col-sm-6 col-sm-offset-6">
          <?php 
		$attributes = array('class' => 'form-horizontal', 'role' => 'form', );
		echo form_open_multipart('html_search',$attributes); ?>
          <div class="form-group col-sm-10 col-sm-offset-2">
                  <input type="text" class="form-control" name="search" id="search" placeholder="Campaign search">
                </div>
          <div class="form-group col-sm-2">
          <button type="submit" name="searchBT" id="searchBT" value="addAddres" class="btn btn-default">Search</button>
          </div>
          <? echo form_close();?>
          </div>
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
			  if ($records) {
			foreach ($records as $row){ 
				echo "<tr><td><a href=\"#\" title=\"".$row->country."\"><img src=\"".site_url()."images/".$row->country.".png\"></a></td>";
                echo "<td><a href=\"".site_url()."template/".$row->cam_id."\" title=\"edit\">".$row->cam_name."</a></td>";
                echo "<td>".$row->createdBy."</td>";
                echo "<td><a href=\"".site_url()."create_online_html/".$row->cam_id."\" target=\"_blank\" class=\"btn\" title=\"pre-view\"><span class=\"glyphicon glyphicon-new-window\"></span></a>
			<a href=\"".site_url()."copy_camp/".$row->cam_id."\" title=\"Copy\" onclick=\"return confirm('Are you sure you want to copy this Campaigns?');\"><span class=\"glyphicon glyphicon-plus-sign\"></span></a>
			</td>";
			}
			  
			 echo "</tbody></table>";
			 }
			else {
				echo "</tbody></table>";
				echo "No Data";
				}
			?>
                
                
              
          </div>
        </div>
      </div>
    </div>
    
<?php  $this->load->view('footer'); ?>