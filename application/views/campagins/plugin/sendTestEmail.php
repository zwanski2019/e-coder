<div class="modal fade" id="testEmail" tabindex="-1" role="dialog" aria-labelledby="resetpinLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Send Test Email</h4>
      </div>
      <form class="form-reset" role="form">
        <div class="modal-body">
          <p>Enter your Email address.</p>
          <input type="email" id="email" name="email" class="form-control" value="<?php echo $this->user->get_email();?>">
        </div>
        <div class="modal-footer">
        <div id="output" class="pull-left errorMsg"><img id="loading" src="<?php echo base_url()?>images/spacer.gif" width="20"></div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onClick="sendEmail()">Send Email</button>
        </div>
        
      </form>
    </div>
  </div>
</div>