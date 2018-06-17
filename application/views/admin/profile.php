<?php

$this->load->view('head');
$this->load->view('top_nav'); ?>

<div class="container-fluid">
<div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
    <?php  $this->load->view('left_nav');?>
  </div>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-sm-12">
      <h1 class="page-header">Update Profile</h1>
      <div class="row placeholders">
        <div class="table-responsive">
          <ul class="nav nav-tabs">
            <li <?php if ($tab==1) echo "class=\"active\"";?>><a href="#info" data-toggle="tab">Update Info</a></li>
            <?php if($this->user->has_permission('admin')) { ?>
            <li><a href="#list" data-toggle="tab">User List</a></li>
            <li <?php if ($tab==3) echo "class=\"active\"";?>><a href="#new" data-toggle="tab">Create New User</a></li>
            <?php } ?>
          </ul>
            
          <div class="tab-content"><div class="space"></div>
            <div class="tab-pane fade <?php if ($tab==1) echo "in active";?>" id="info">
              <div class="col-sm-12 text-left">
                  <h4>Name : <?php print $this->user->get_name()?></h4>
                  <h4>Email : <?php print $this->user->get_email()?></h4>
              </div>
              <div class="col-sm-4">
              <hr>
              <p class="title text-left">Update Password</p>
                
                <?php 
		$attributes = array('class' => 'form-horizontal', 'id' => 'pwupdate', 'name' => 'pwupdate');
		echo form_open('',$attributes); ?>
                
                  <input name="old_pw" id="old_pw" type="password" placeholder="Old Password" class="form-control" >
                  <input name="new_pw" id="new_pw" type="password" placeholder="New Password" class="form-control">
                  <input type="submit" name="update" id="update" type="button" value="Update" class="btn btn-primary">
                  <div class="col-sm-4"><?php echo $msg?> </div>
                </form>
              </div>
            </div>
            <?php if($this->user->has_permission('admin') || $this->user->has_permission('manager')) { ?>
            <div class="tab-pane fade" id="list">
              <div class="col-sm-12">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>User Name</th>
                      <th>E-mail</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
			foreach ($records as $row){ 
				echo "<tr><td>".$row->name."</td>";
                echo "<td>".$row->email."</td>";
				$icon = $row->active == 2 ? "glyphicon glyphicon-exclamation-sign\" style=\"color:#FF3300" : "glyphicon glyphicon-ok-circle\" style=\"color:#66CC00";
                echo "<td><span class=\"".$icon."\"></span></td>";
				echo "<td><a href=\"copy_camp/".$row->id."\" title=\"Reset Password\" onclick=\"return confirm('Are you sure you want to reset the password?');\"><span class=\"glyphicon glyphicon-retweet\"></span></a></td>";
				echo "</tr>";
			}
			
			?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade <?php if ($tab==3) echo "in active";?>" id="new">
              <div class="col-sm-6">
                <?php 
		$attributes = array('class' => 'form-horizontal', 'id' => 'pwupdate', 'name' => 'pwupdate');
		echo form_open('',$attributes); ?>
                  <input name="name" type="text" placeholder="Name" class="form-control">
                  <input name="email" type="text" placeholder="E-mail" class="form-control">
                  <input name="username" type="text" placeholder="User Name" class="form-control">
                  <input name="password" type="hidden" value="password">
				  <select name="program" class="form-control">
					  <option value="airmiles">Air Miles</option>
					  <option value="ooredoo">Ooredoo</option>
				  </select>
                  <select name="permissions" class="form-control">
					<?php foreach ($permissions as $perm){
						echo '<option value="'.$perm->id.'">'.$perm->description.'</option>';
						}
					?>
                    
                   
                  </select>
                  <input type="submit" name="create" id="create" type="button" value="Create" class="btn">
                  <br />
                  <br />
                  <?php if ($tab==3) {?>
                  <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?php echo $this->session->flashdata('error_message'); ?></div>
                  <?php } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php  $this->load->view('footer'); ?>
