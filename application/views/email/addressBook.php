<?php  

$this->load->view('head');
$this->load->view('top_nav'); ?>
<script>



function activeCheck(a){

	if (document.getElementById(a).checked) {
            var message_status = $("#status");
			field_userid = "active:"+a;
			$.ajaxSetup({
        	data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
			[ field_userid ] : 'Y'
			}
			 });
			$.post('<?php echo base_url()?>emailer/edit', function(data){
            if(data != ''){
				message_status.show();
				message_status.text(data);
				//hide the message
				setTimeout(function(){message_status.hide()},500);
				}
        	});
		
        } 
		else {
			var message_status = $("#status");
			field_userid = "active:"+a;
			$.ajaxSetup({
        	data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
			[ field_userid ] : 'N'
			}
			 });
			$.post('<?php echo base_url()?>emailer/edit', function(data){
            if(data != ''){
				message_status.show();
				message_status.text(data);
				//hide the message
				setTimeout(function(){message_status.hide()},500);
				}
        	});
        }
}



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
        $.post('<?php echo base_url()?>emailer/edit', function(data){
            if(data != ''){
				message_status.show();
				message_status.text(data);
				setTimeout(function(){message_status.hide(); },500);
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
      <h1 class="page-header">Mass Mailer</h1>
      <div class="col-sm-8">
      <div class="col-sm-12">
      <h4>Address Books</h4>
      <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'addressBook', 'name' => 'addressBook');
		echo form_open('',$attributes);
		?>
      <select name="bookName" id="bookName" class="form-control" onchange="this.form.submit()">
      <?php
	  
	  	if ($addressBooks){
	  	foreach ($addressBooks as $addressBook){
       		echo "<option value=\"".$addressBook->id."\"";
			echo $selectBook == $addressBook->id ? " selected" : "";
			echo ">".$addressBook->bookName."</option>";
		}
		}
		?>
       </select>
       <?php
		echo form_close();
		?>
      </div>
      
      <div class="col-sm-12">
      <div class="col-sm-10"><h4>Address List</h4></div>
      <div id="status" class="col-sm-2 text-right updateStatus"></div>
      
      
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
          <thead>
            <tr>
              <td><strong>Contact Name</strong></td>
              <td><strong>Contact Email</strong></td>
              <td><strong>Contact Company</strong></td>
              <td><strong>Active</strong></td>
            </tr>
          </thead>
          <tbody>
            <?php
		  if ($emails){
			  foreach ($emails as $email_info){
				  echo "<tr><td id=\"contactName:".$email_info->id."\" contenteditable=\"true\">".$email_info->contactName."</td>";
				  echo "<td id=\"contactEmail:".$email_info->id."\" contenteditable=\"true\">".$email_info->contactEmail."</td>";
				  echo "<td id=\"contactCompany:".$email_info->id."\" contenteditable=\"true\">".$email_info->contactCompany."</td>";
				  echo "<td><input onclick='activeCheck(".$email_info->id.")' id=\"".$email_info->id."\" type=\"checkbox\"";
				  if ($email_info->active == "Y"){ echo " checked "; }
				  echo "value=\"Y\"></td></tr>";
		  	  }		  
		  }
	  
	  ?>
          </tbody>
        </table>
        
        
        </div>
      </div>
    <div class="col-sm-4">
    <div class="col-sm-12"><h4>Add Address</h4>
    	<?php
        $attributes = array('class' => 'form-horizontal col-sm-12', 'id' => 'addContact', 'name' => 'addContact');
		echo form_open('',$attributes);
		?>
        <div class="form-group">
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
            <input type="text" class="form-control col-sm-12" id="contactName" name="contactName" placeholder="Contact Name" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="contactEmail" name="contactEmail" placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="contactCompany" name="contactCompany" placeholder="Company">
          </div>
          <div class="form-group">
          <button type="submit" name="addAddres" value="addAddres" class="btn btn-default">Add Address</button>
          </div>
          
        <?php
		echo form_close();
		?>
        </div>
     <div class="col-sm-12"><h4>Add New Address Book</h4>
     
     <?php
        $attributes = array('class' => 'form-horizontal col-sm-12', 'id' => 'addBook', 'name' => 'addBook');
		echo form_open('',$attributes);
		?>
          <div class="form-group">
            <input type="text" class="form-control col-sm-12" id="bookName" name="bookName" placeholder="Book Name" required>
          </div>
          <?php echo form_error('bookName','<div class="small text-danger">', '</div>')?>
          <div class="form-group">
          <button type="submit" name="addBook" id="addBook" value="addBook" class="btn btn-default">Add Book</button>
          </div>
        <?php
		echo form_close();
		?>
     
     </div>   
    </div>
    
      
    </div>
  </div>
</div>

<?php  $this->load->view('footer'); ?>
