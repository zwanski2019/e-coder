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

<?php 
		$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open_multipart('',$attributes); ?>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
    <?php  $this->load->view('create_nav'); ?>
  </div>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="table-responsive"> 
      
      <!------>
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Statement Settings</a></h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="stat_name" id="stat_name" placeholder="Statement Name" value="<?=$stat_name?>">
                  <?php echo form_error('stat_name'); ?>
                </div>
                
                
                <div class="form-group">
                  <div class="row">
                
                    <div class="col-xs-4">
                      <select name="country" id="country" class="form-control">
                        <option value="ae" <?php if ($country=="ae") echo "selected=\"selected\""; ?>>UAE</option>
                        <option value="qa" <?php if ($country=="qa") echo "selected=\"selected\""; ?>>Qatar</option>
                        <option value="bh" <?php if ($country=="bh") echo "selected=\"selected\""; ?>>Bahrain</option>
                        <option value="mrp" <?php if ($country=="mrp") echo "selected=\"selected\""; ?>>MRP</option>
                      </select>
                    </div>
                    
                    <div class="col-xs-4">
                      <select name="stat_offers" id="stat_offers" class="form-control">
                        <option value="0" <?php if ($stat_offers==0) echo "selected=\"selected\""; ?>>0</option>
                        <option value="1" <?php if ($stat_offers==1) echo "selected=\"selected\""; ?>>1</option>
                        <option value="2" <?php if ($stat_offers==2) echo "selected=\"selected\""; ?>>2</option>
                        <option value="3" <?php if ($stat_offers==3) echo "selected=\"selected\""; ?>>3</option>
                        <option value="4" <?php if ($stat_offers==4) echo "selected=\"selected\""; ?>>4</option>
                      </select>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <input name="create_statment" type="submit" value="Create" class="btn">
                </div>
                
              </div>
            </div>
          </div>
        </div>
        
        <?php if ($stat_name!=NULL) { ?>
        
        <!---------images------->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#statImages"> Images & Banner </a> </h4>
          </div>
          <div id="statImages" class="panel-collapse collapse in">
            <div class="panel-body">
              

                  <div class="row">
                  <div class="col-xs-12">Top Image</div>
                  <div class="col-xs-12"><input name="topImg" type="file" class="btn"/></div>
                  </div>

                  <div class="row">
                  <div class="col-xs-12">Right Banner</div>
                  <div class="col-xs-12"><input name="banner" type="file" class="btn"/></div>
                  <div class="col-xs-12"><input name="bannerURL" type="text" id="bannerURL" placeholder="Banner URL" class="form-control offerCopy"/></div>
                  </div>

              
            </div>
          </div>
        </div>
        <!---------images ------>
        
        <!---------body copy------->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#statBody"> Body Copy </a> </h4>
          </div>
          <div id="statBody" class="panel-collapse collapse">
            <div class="panel-body">
                  <div class="row">
                  <textarea name="body" id="body" cols="" rows="" class="form-control bodyCopy" placeholder="body">Your Air Miles statement is now ready. Click on View My Account for more details.</textarea>
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
				  	for ($x=1; $x<=$stat_offers; $x++) {?>

                  
                    <div class="col-md-6">
                      <div class="offerEntry">
                      <input name="pt<?=$x?>" type="text" id="pt<?=$x?>" size="10" value="" placeholder="Partner Logo" class="form-control offerCopy"/>
						<input name="logo_<?=$x?>" type="hidden" id="logo_<?=$x?>" size="10" />
                        
                        <textarea name="offertext_<?=$x?>" id="offertext_<?=$x?>" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"></textarea>
                        
                        <input type="text" name="url_<?=$x?>" id="url_<?=$x?>" placeholder="Offer Link" class="form-control offerCopy"/>
                        <select name="stamp_<?=$x?>" class="form-control offerCopy">
                          <option value="smp1">Air Miles</option>
                          <option value="smp2">2X Air Miles</option>
                          <option value="smp3">3X Air Miles</option>
                          <option value="smp5">5X Air Miles</option>
                          <option value="smp6">Twice as nice</option>
                          <option value="smp7">SALE</option>
                          <option value="smp8">Update your details</option>
                          <option value="smp9">New Partner</option>
                          <option value="smp10">Exclusive Offer</option>
                          <option value="smp11">DSF Offer</option>
                          <option value="smp12">Valentine Offer</option>
                          <option value="smp13">Bonus Air Miles</option>
                          <option value="smp14">Sepnd Air Miles</option>
                          <option value="smp15">1,000 Bonus AM</option>
                          <option value="smp17">5,000 Bonus AM</option>
                          <option value="smp16">Survey</option>
                          <option value="smp18">Collect</option>
                          <option value="smp19">Like Us</option>
                          <option value="smp20">New Partner</option>
                          <option value="smp21">New Store</option>
                        </select>
                       
                        </div>
                    </div>
					
					<?php }?>
                

              <!---------end table ------>
            </div>
          </div>
        </div>
       <!-------offers ----->
        
        
        
        
        <?php } ?>
        <!--------> 
        
      </div>
    </div>
  </div>
</div>
<?php echo form_close('');?> 
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

</body>
</html>