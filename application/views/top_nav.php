<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $this->user->get_name(); ?></a></li>
            <li><a href="<?php echo site_url()?>profile">Profile</a></li>
            <li><a href="<?php echo site_url('login/logout')?>">Logout</a></li>
          </ul>
         
        </div>
      </div>
    </div>