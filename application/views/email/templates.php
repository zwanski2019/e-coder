<?php  

$this->load->view('head');
$this->load->view('top_nav'); ?>
<script>

$(function(){
	//acknowledgement message
    var message_status = $("#status");
    $("td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id");
        var value = $(this).text();
		$.ajaxSetup({
        	data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
			[ field_userid ] : value
			}
		 });
        $.post('<?php echo base_url()?>emailer/editSubject', function(data){
            if(data != ''){
				message_status.show();
				message_status.text(data);
				//hide the message
				setTimeout(function(){message_status.hide()},3000);
			}
        });
		

    });
});
</script>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <?php  $this->load->view('left_nav'); ?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Email Templates</h1>
      <div class="col-sm-8">
      <div class="col-sm-12">      
      </div>
      
      <div class="col-sm-12">
      <div class="col-sm-10"><h4>List</h4></div>
      <div id="status" class="col-sm-2 text-right updateStatus"></div>
      
      
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
          <thead>
            <tr>
              <td><strong>Temaplate Name</strong></td>
              <td><strong>Email Subject</strong></td>
            </tr>
          </thead>
          <tbody>
            <?php
			
		  if ($templateList){
			  foreach ($templateList as $template_info){
				  echo "<tr><td>".$template_info->templateName."</td>";
				  echo "<td id=\"subject:".$template_info->id."\" contenteditable=\"true\">".$template_info->subject."</td>";
				  echo "</tr>";
		  	  }		  
		  }
	  
	  ?>
          </tbody>
        </table>
        
        
        </div>
      </div>
    <div class="col-sm-4">
    <div class="col-sm-12">    	
        </div>
     <div class="col-sm-12">
     </div>   
    </div>
    
      
    </div>
  </div>
</div>

<?php  $this->load->view('footer'); ?>
