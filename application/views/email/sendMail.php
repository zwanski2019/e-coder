<?php  

$this->load->view('head');
$this->load->view('top_nav'); ?>
<script>


function validateCode(){
	var message_status = $("#status");
    var secutyCode = document.getElementById("secutyCode").value;;
		$.ajaxSetup({
        	data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
			'secutyCode' : secutyCode
			}
		 });
        $.post('<?php echo base_url()?>emailer/validateCode', function(data){
            if(data != ''){
				$('#status').html(data);
				if ('Invalid Requests' != data){
					document.getElementById("emailTriger").removeAttribute("disabled");
				}
			}
        });
	}

</script>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <?php  $this->load->view('left_nav'); ?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Mass Mailer</h1>
      
    
    
      
      <div class="col-sm-6">
      
      <h4>Create Campaign</h4>
      
      
      <?php
        $attributes = array('class' => 'form-horizontal');
		echo form_open('',$attributes);
		?>
      
      <div class="form-group">
      <label>Select Template : </label>
      <select name="templateId" id="templateId" class="form-control">
      <option value="">-- select --</option>
      <?php
	  	foreach ($template as $template_info){
       		echo "<option value=".$template_info->id.">".$template_info->templateName."</option>";
		}
		?>
       </select>
       <?php echo form_error('templateId','<div class="small text-danger">', '</div>')?>
       </div>
       <div class="form-group">
       <label>Select Address Book : </label>
        <select name="addressBookId" id="addressBookId" class="form-control">
        <option value="">-- select --</option>
      <?php
	  	foreach ($addressBooks as $addressBook){
       		echo "<option value=".$addressBook->id.">".$addressBook->bookName."</option>";
		}
		?>
       </select>
       <?php echo form_error('addressBookId','<div class="small text-danger">', '</div>')?>
       </div>
       
       <div class="form-group">
          <button type="submit" class="btn btn-default" name="sendTest" id="sendTest" value="sendTest">Send Test</button>
          </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="sendActivation" id="sendActivation" value="sendActivation">Send Activation Code</button>
          </div>
          
       <?php
		echo form_close();
		?>
      </div>
      
      
      <div class="col-sm-5 col-sm-offset-1">
      <h4>Dispatch Campaign</h4>
        <?php
        $attributes = array('class' => 'form-horizontal');
		echo form_open('',$attributes);
		?>
          <div class="form-group">
          <label>Enter Code : </label>
            <input type="text" class="form-control" id="secutyCode" name="secutyCode" placeholder="Secuty Code">
          </div>
          <div class="form-group">
          <a class="btn btn-default" name="verifyCode" id="verifyCode" onClick="validateCode()">Verify Code</a>
          </div>
          <div id="status" class="form-group updateStatus"></div>
          <div class="form-group">
          <button type="submit" class="btn btn-default" name="emailTriger" id="emailTriger" value="emailTriger" disabled>Send to All</button>
          </div>
        
      
      <?php	echo form_close(); ?>
      
        </div>
        <div class="col-sm-12"><?php echo isset($emailSendMSG) ? $emailSendMSG : $emailSendMSG;?></div>
    </div>
  </div>
</div>

<?php  $this->load->view('footer'); ?>
