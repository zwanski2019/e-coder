<?php  $this->load->view('head'); 

?>
</head>
<body>

<div class="container">

<?php 
		$attributes = array('class' => 'form-signin', 'id' => 'login', 'role' => 'form');
		echo form_open('login/validate',$attributes); ?>
        <h4 class="form-signin-heading">
         <?php 
	if ($this->session->flashdata('error_message')){
		echo "<p align=\"center\" class=\"alert errorMsg\">".$this->session->flashdata('error_message')."</p>";}
	?>
        </h4>
        <input type="text" class="form-control" name="login" id="login" placeholder="Login" />
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="send">Sign in</button>
      </form>

	<p align="center"><a href="#" data-toggle="modal" data-target="#resetpin" class="forgotPass">Forgot Password</a></p>
   
</div>


<div class="modal fade" id="resetpin" tabindex="-1" role="dialog" aria-labelledby="resetpinLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
      </div>
      <form class="form-reset" role="form">
        <div class="modal-body">
          <p>Enter your Email address to reset your password.</p>
          <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
        </div>
        <div class="modal-footer">
        <div id="output" class="pull-left errorMsg"></div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onClick="sendEmail()">Submit</button>
        </div>
        
      </form>
    </div>
  </div>
</div>

<script>
function sendEmail(){
var email = document.getElementById("email").value;
    $.ajax({
        url:'automailer/checkEmail?email='+email,
        complete: function (response) {
            $('#output').html(response.responseText);
        }        
    });
    return false;
}
</script>

</body>
</html>



