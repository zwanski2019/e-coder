<?php 
		foreach ($camps as $camp);
		$camp_add_selects = explode("|",$camp->camp_adds);
		$addinfo ['addinfo'] = $camp_adds;
		$addinfo ['camp_add_select'] = $camp_add_selects;
		foreach ($htmls as $html){
			
			};
		//if ($html->partner1==NULL) {$html->partner1='HSB';}
//		if ($html->partner2==NULL) {$html->partner2='DMS';}
//		if ($html->partner3==NULL) {$html->partner3='SDG';}
//		if ($html->partner4==NULL) {$html->partner4='ADD';}
//		if ($html->partner5==NULL) {$html->partner5='BOK';}
//		if ($html->partner6==NULL) {$html->partner6='AGD';}
//		if ($html->partner7==NULL) {$html->partner7='TTS';}
//		if ($html->partner8==NULL) {$html->partner8='RCZ';}
// print_r($_SESSION['countries']);
?>
<!DOCTYPE html>

<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $this->siteTitel ?></title>

    <!-- Bootstrap core CSS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/main.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/left_menu.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/font-awesome.min.css" rel="stylesheet">

  <style id="holderjs-style" type="text/css"></style><style type="text/css"></style></head>
  
  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>js/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
  <script src="<?php echo base_url()?>tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url()?>js/tinymc_form.js"></script>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
  <body>

    <?php  $this->load->view('top_nav'); ?>
    
<?php 
		$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'ID' =>'templateForm');
		echo form_open_multipart('',$attributes); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php  $this->load->view('edit_nav',($camp)); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          

          <div class="table-responsive">
          
          <!------>
          <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Campagin Settings
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">

        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="cam_name" id="cam_name" placeholder="Campaign name" value="<?=$camp->cam_name?>">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xs-4">
                <select name="country" id="country" class="form-control">
					<?php 
							foreach($_SESSION['countries'] as $key => $value) {
								print '<option value="'.$value.'"';
								if ($camp->country === $value) echo "selected=\"selected\"";
								print '>'.$key.'</option>';
							}
						?>
                </select>
              </div>
              <div class="col-xs-4">
                <select name="sysType" id="sysType" class="form-control">                  
					<?php 
							foreach($_SESSION['emailClient'] as $key => $value) {
								print '<option value="'.$value.'"';
								if ($camp->sysType === $value) echo "selected=\"selected\"";
								print '>'.$key.'</option>';
							}
						?>
                </select>
              </div>
            </div>
          </div>
          
          
        </div>
        <div class="modal-footer">
          <input type="submit" name="update_camp" id="update_camp" value="Update" class="btn btn-primary"/>
        </div>

      </div>
    </div>
  </div>
  <!--    IMAGE content -->

   
<?php  
// IMAGE content
if ($camps[0]->cam_theme == 'hsbc_co_branded' || $camps[0]->cam_theme == 'airmiles/twoColumn') {

}
else {
	
	}
			  
// HTML content-->


// Select offers--
switch ($camps[0]->cam_theme) {
	case ('multioffer') :
		$this->load->view('campagins/plugin/oneMainIMG');
		$this->load->view('campagins/plugin/bodyCopy', $html);
		$this->load->view('campagins/plugin/multiOffers', $html);
		// Add content --
		$this->load->view('campagins/plugin/campAdds', $addinfo); 
		// Select Partners--
		$this->load->view('campagins/plugin/partnerLogos', $html);
		
	break;
	case ('twoColumn') :
		$this->load->view('campagins/plugin/twoMainIMG');
		$this->load->view('campagins/plugin/bodyCopy', $html);
		$this->load->view('campagins/plugin/twoColumnImage', $html);
		// Add content --
		$this->load->view('campagins/plugin/campAdds', $addinfo); 
		// Select Partners--
		$this->load->view('campagins/plugin/partnerLogos', $html);
	break;
	case ('b2c_en') :
		$this->load->view('campagins/plugin/oneMainIMG');
		$this->load->view('campagins/plugin/ooredoo/multiOffers_ooredoo', $html);
		$this->load->view('campagins/plugin/ooredoo/adds', $html);
	break;
	case ('b2c_ar') :
		$this->load->view('campagins/plugin/oneMainIMG');
		$this->load->view('campagins/plugin/ooredoo/multiOffers_ooredoo', $html);
		$this->load->view('campagins/plugin/ooredoo/adds', $html);
	break;		
	case ('b2b_1') :
		$this->load->view('campagins/plugin/ooredoo/multiOffers_ooredoo', $html);
	break;
	default:
		$this->load->view('campagins/plugin/oneMainIMG');
		$this->load->view('campagins/plugin/bodyCopy', $html);
		// Add content --
		$this->load->view('campagins/plugin/campAdds', $addinfo); 
		// Select Partners--
		$this->load->view('campagins/plugin/partnerLogos', $html);
}




?>

  </div>

          <!-------->
            <?php //echo $errors ?>
          </div>
        </div>
      </div>
    </div>

<?php 
echo '<input type="hidden" name="cam_theme" value="'.$camps[0]->cam_theme.'">';
echo form_close('');
$this->load->view('campagins/plugin/sendTestEmail'); 
?>



    
<script src="<?php echo site_url()?>js/bootstrap.min.js"></script>

<script type="text/javascript">

<?php 
for ($x = 1; $x <= 10; $x++) {
    echo 'var options = {
		script:"'.base_url().'getPartnerLogo?input=",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:6,
		callback: function (obj) { document.getElementById(\'partner'.$x.'\').value = obj.info;
		}
	};
	var as_json = new bsn.AutoSuggest(\'pt'.$x.'\', options);';
} 
?>	
	
function showData() {
        var theSelect = $('#cam_theme').val();
		if (theSelect == "V1"){
				document.getElementById("prt8").style.visibility = "hidden";
				document.getElementById("csButtonTXT").style.visibility = "visible";
				document.getElementById("csButton").checked = true;
				
			}
		if (theSelect == "V2"){
				document.getElementById("csButtonTXT").style.visibility = "hidden";
				document.getElementById("csButton").checked = false;
				
			}
    }
document.getElementById("csButtonTXT").style.visibility = "hidden";
document.getElementById("csButton").checked = false;
</script>

<script type="text/javascript">
$(function() {
    $("#theFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
				document.getElementById("myImg").remove();
                $("#imageupdate").css("background-image", "url("+this.result+")");
				document.getElementById("imageupdate").style.height="290px";
            }
        }
    });
});
</script>

<script>
function sendEmail(){
var email = document.getElementById("email").value;
document.getElementById("loading").src = "<?php echo base_url()?>images/loading.gif";
    $.ajax({
        url:'<?php echo base_url()?>create/sampleEmail?template=create_html&email='+email+'&camId=<?php echo $camp->cam_id;?>',
        complete: function (response) {
            $('#output').html(response.responseText);
        }        
    });
    return false;
}
</script>

<script src="<?php echo base_url()?>js/left_menu.js" type="text/javascript"></script> 
</body>
</html>