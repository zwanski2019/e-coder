<?php

foreach ($statement_info as $statement);
foreach ($offer_info as $offer);
foreach ($body_copy_info as $body_copy);

?>


<!DOCTYPE html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $this->siteTitel ?></title>

<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/dashboard.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/main.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/left_menu.css" rel="stylesheet">

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url()?>css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
<script src="<?php echo base_url()?>tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url()?>js/tinymc_form.js"></script>
</head>
<body>
<?php  $this->load->view('top_nav'); ?>

<?php echo form_open_multipart();?>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
    <?php  $this->load->view('edit_nav',($statement)); ?>
  </div>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="table-responsive"> 
      
      <!------>
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Statement Settings </a> </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="modal-body">
                <div class="form-group">
                <input type="hidden" name="stat_id" id="stat_id" value="<?=$statement->stat_id?>">
                <input type="hidden" name="topImg" id="topImg" value="<?=$statement->topImg?>">
                <input type="hidden" name="banner" id="banner" value="<?=$statement->banner?>">                  
                <input type="text" class="form-control" name="stat_name" id="stat_name" placeholder="Campaign name" value="<?=$statement->stat_name?>">
                </div>
                
                
                <div class="form-group">
                  <div class="row">

                    <div class="col-xs-4">
                      <select name="country" id="country" class="form-control">
                        <option value="ae" <?php if ($statement->country=="ae") echo "selected=\"selected\""; ?>>UAE</option>
                        <option value="qa" <?php if ($statement->country=="qa") echo "selected=\"selected\""; ?>>Qatar</option>
                        <option value="bh" <?php if ($statement->country=="bh") echo "selected=\"selected\""; ?>>Bahrain</option>
                        <option value="mrp" <?php if ($statement->country=="mrp") echo "selected=\"selected\""; ?>>MRP</option>
                      </select>
                    </div>
                    
                    <div class="col-xs-4">
                      <select name="stat_offers" id="stat_offers" class="form-control">
                        <option value="0" <?php if ($statement->stat_offers==0) echo "selected=\"selected\""; ?>>0</option>
                        <option value="1" <?php if ($statement->stat_offers==1) echo "selected=\"selected\""; ?>>1</option>
                        <option value="2" <?php if ($statement->stat_offers==2) echo "selected=\"selected\""; ?>>2</option>
                        <option value="3" <?php if ($statement->stat_offers==3) echo "selected=\"selected\""; ?>>3</option>
                        <option value="4" <?php if ($statement->stat_offers==4) echo "selected=\"selected\""; ?>>4</option>
                      </select>
                    </div>
                  </div>
                </div>
                                
              </div>
            </div>
          </div>
        </div>
        
		<!---------image------->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#statImages"> Images & Banner</a> </h4>
          </div>
          <div id="statImages" class="panel-collapse collapse">
            <div class="panel-body">
              
  
                <div class="row">
                  <div class="col-xs-12">Top Image</div>
                  <div class="col-xs-12">
                  <img src="http://enews.airmilesme.com/am/img/<?=$statement->topImg?>.jpg" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;">
                  <input name="topImg" type="file" class="btn"/></div>
                  </div>
               
                 <div class="row">
                  <div class="col-xs-12">Right Banner</div>
                  <div class="col-xs-12">
                  <img src="http://enews.airmilesme.com/am/img/<?=$statement->banner?>.jpg" alt="Image Caption" border="0" hspace="0" vspace="0" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;">
                  <input name="banner" type="file" class="btn"/>
                  </div>
                  <div class="col-xs-12"> 
                  <input name="bannerURL" type="text" id="bannerURL" size="10" placeholder="Banner URL" class="form-control offerCopy" value="<?=$statement->bannerURL?>"/>
                  </div>
                  </div>

              
            </div>
          </div>
        </div>
        <!---------image ------>
        <!---------body copy------->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#statBody"> Body Copy </a> </h4>
          </div>
          <div id="statBody" class="panel-collapse collapse">
            <div class="panel-body">
                  <div class="row">
                  <textarea name="body" id="body" cols="" rows="" class="form-control bodyCopy" placeholder="body"><?=$body_copy->body?></textarea>
                  </div>
            </div>
          </div>
        </div>
        <!---------body copy ------>
        
       <!----------------offers ---->
       <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#statOffers"> Offers </a> </h4>
          </div>
          <div id="statOffers" class="panel-collapse collapse">
            <div class="panel-body">
              <!---------table------->
              
                
                <?php
				  	for ($x=1; $x<=$statement->stat_offers; $x++) {						
							$info = explode("|",$offer->{'offer'.$x});

						?>
                    
                    <div class="col-md-6">
                      <div class="offerEntry">
                      <input name="pt<?=$x?>" type="text" id="pt<?=$x?>" size="10" value="<?=$info[0]?>" placeholder="Partner Logo" class="form-control offerCopy"/>
						<input name="logo_<?=$x?>" type="hidden" id="logo_<?=$x?>" size="10" value="<?=$info[0]?>"/>
                        
                        <textarea name="offertext_<?=$x?>" id="offertext_<?=$x?>" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"><?=$info[1]?></textarea>
                        
                        <input type="text" name="url_<?=$x?>" id="url_<?=$x?>" placeholder="Offer Link" class="form-control offerCopy" value="<?=$info[2]?>"/>
                        <select name="stamp_<?=$x?>" class="form-control offerCopy">
                          <option value="smp1" <?php if ($info[3]=='smp1') echo "selected=\"selected\""; ?>>Air Miles</option>
                          <option value="smp2" <?php if ($info[3]=='smp2') echo "selected=\"selected\""; ?>>2X Air Miles</option>
                          <option value="smp3" <?php if ($info[3]=='smp3') echo "selected=\"selected\""; ?>>3X Air Miles</option>
                          <option value="smp5" <?php if ($info[3]=='smp5') echo "selected=\"selected\""; ?>>5X Air Miles</option>
                          <option value="smp6" <?php if ($info[3]=='smp6') echo "selected=\"selected\""; ?>>Twice as nice</option>
                          <option value="smp7" <?php if ($info[3]=='smp7') echo "selected=\"selected\""; ?>>SALE</option>
                          <option value="smp8" <?php if ($info[3]=='smp8') echo "selected=\"selected\""; ?>>Update your details</option>
                          <option value="smp9" <?php if ($info[3]=='smp9') echo "selected=\"selected\""; ?>>New Partner</option>
                          <option value="smp10" <?php if ($info[3]=='smp10') echo "selected=\"selected\""; ?>>Exclusive Offer</option>
                          <option value="smp11" <?php if ($info[3]=='smp11') echo "selected=\"selected\""; ?>>DSF Offer</option>
                          <option value="smp12" <?php if ($info[3]=='smp12') echo "selected=\"selected\""; ?>>Valentine Offer</option>
                          <option value="smp13" <?php if ($info[3]=='smp13') echo "selected=\"selected\""; ?>>Bonus Air Miles</option>
                          <option value="smp14" <?php if ($info[3]=='smp14') echo "selected=\"selected\""; ?>>Sepnd Air Miles</option>
                          <option value="smp15" <?php if ($info[3]=='smp15') echo "selected=\"selected\""; ?>>1,000 Bonus AM</option>
                          <option value="smp17" <?php if ($info[3]=='smp17') echo "selected=\"selected\""; ?>>5,000 Bonus AM</option>
                          <option value="smp16" <?php if ($info[3]=='smp16') echo "selected=\"selected\""; ?>>Survey</option>
                          <option value="smp18" <?php if ($info[3]=='smp18') echo "selected=\"selected\""; ?>>Collect</option>
                          <option value="smp19" <?php if ($info[3]=='smp19') echo "selected=\"selected\""; ?>>Like Us</option>
                          <option value="smp20" <?php if ($info[3]=='smp20') echo "selected=\"selected\""; ?>>New Partner</option>
                          <option value="smp21" <?php if ($info[3]=='smp21') echo "selected=\"selected\""; ?>>New Store</option>
                        </select>
                       
                        </div>
                    </div>
					
					<?php }?>
                
              
              <!---------end table ------>
            </div>
          </div>
        </div>
       <!-------offers ----->
        
        

        <!--------> 
        
      </div>
    </div>
  </div>
</div>
<?php echo form_close('');?>

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



<script src="<?php echo site_url()?>js/bootstrap.min.js"></script> 
<script type="text/javascript">
	var options = {
		script:"<?php echo base_url()?>getPartnerLogo?input=",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:6,
		callback: function (obj) { document.getElementById('logo_1').value = obj.info;
		}
	};
	var as_json = new bsn.AutoSuggest('pt1', options);

	var options = {
		script:"<?php echo base_url()?>getPartnerLogo?input=",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:6,
		callback: function (obj) { document.getElementById('logo_2').value = obj.info;
		}
	};
	var as_json = new bsn.AutoSuggest('pt2', options);
	
	var options = {
		script:"<?php echo base_url()?>getPartnerLogo?input=",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:6,
		callback: function (obj) { document.getElementById('logo_3').value = obj.info;
		}
	};
	var as_json = new bsn.AutoSuggest('pt3', options);
	
	var options = {
		script:"<?php echo base_url()?>getPartnerLogo?input=",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:6,
		callback: function (obj) { document.getElementById('logo_4').value = obj.info;
		}
	};
	var as_json = new bsn.AutoSuggest('pt4', options);
	
$(document).ready(function() {  
	var stickyNavTop = $('.nav_menu').offset().top;	  
	var stickyNav = function(){  
	var scrollTop = $(window).scrollTop();		   
		if (scrollTop > stickyNavTop) {   
			$('.nav_menu').addClass('sticky');  
		} else {  
			$('.nav_menu').removeClass('sticky');   
		}  
	};    
	stickyNav();  
	$(window).scroll(function() {  
		stickyNav();  
	});  
}); 

</script> 
<script>
function sendEmail(){
var email = document.getElementById("email").value;
document.getElementById("loading").src = "<?php echo base_url()?>images/loading.gif";
    $.ajax({
        url:'<?php echo base_url()?>automailer/sampleEmail?template=view_statement&email='+email+'&camId=<?php echo $statement->stat_id;?>',
        complete: function (response) {
            $('#output').html(response.responseText);
        }        
    });
    return false;
}
</script>
</body>
</html>