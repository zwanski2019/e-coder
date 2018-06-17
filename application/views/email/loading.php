<?php  

$this->load->view('head');
//$this->load->view('top_nav'); 
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <?php  //$this->load->view('left_nav'); ?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Sending Mail......</h1>
      <script>
	  
	  
      var markers = [{ "position": "128.3657142857143", "markerPosition": "7" },
               { "position": "235.1944023323615", "markerPosition": "19" },
               { "position": "42.5978231292517", "markerPosition": "-3" }];

		$.ajax({
			type: "POST",
			url: "http://localhost/e-coder/reportData",
			// The key needs to match your method's input parameter (case-sensitive).
			data: JSON.stringify({ Markers: markers }),
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: function(data){alert(data);},
			failure: function(errMsg) {
				alert(errMsg);
			}
		});
			  
      </script>
    
    
      
    </div>
  </div>
</div>

<?php  $this->load->view('footer'); ?>
