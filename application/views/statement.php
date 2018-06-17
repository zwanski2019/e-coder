<?php 
		foreach ($camps as $stat);
		foreach ($htmls as $html)
				
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
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/main.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/left_menu.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style id="holderjs-style" type="text/css"></style><style type="text/css"></style></head>
  
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
          <?php  $this->load->view('edit_nav',($stat)); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          

          <div class="table-responsive">
          
          <!------>
          <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <?php echo $stat->stat_name;?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">

        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="stat_name" id="stat_name" placeholder="Campaign name" value="<?=$stat->stat_name?>">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xs-4">
                <select name="stat_offers" id="stat_offers" class="form-control" >
      <option value="0" <? if ($stat->stat_offers=="0") echo "selected=\"selected\""; ?>>0 Offers</option>
      <option value="1" <? if ($stat->stat_offers=="1") echo "selected=\"selected\""; ?>>1 Offers</option>
      <option value="2" <? if ($stat->stat_offers=="2") echo "selected=\"selected\""; ?>>2 Offers</option>
      <option value="3" <? if ($stat->stat_offers=="3") echo "selected=\"selected\""; ?>>3 Offers</option>
    </select>
              </div>
              <div class="col-xs-4">
                <select name="country" id="country" class="form-control">
      <option value="ae" selected="selected">UAE</option>
      <option value="qa" <? if ($stat->country=="qa") echo "selected=\"selected\""; ?>>Qatar</option>
      <option value="bh" <? if ($stat->country=="bh") echo "selected=\"selected\""; ?>>Bahrain</option>
      <option value="mrp" <? if ($stat->country=="mrp") echo "selected=\"selected\""; ?>>MRP</option>
    </select>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="update_statement" id="update_statement" value="Update" class="btn btn-primary"/>
        </div>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          HTML Content
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
          
          
          
          
          <table width="740" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td>
    <? if ($stat->country == "mrp") { ?>
    <img style="display:block" src="http://enews-templates-bucket.s3.amazonaws.com/mrp/e-statment/v1/top.jpg" width="740" height="83">
    <? } else { ?>    
    <img style="display:block" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v3/top.jpg" width="739" height="104">
    <? } ?>
    </td>
   </tr>
   <tr>
    <td height="320" align="center" valign="middle">    
   <img src="http://enews.airmilesme.com/am/img/<?=$html->image?>.jpg"  style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" border="0" /><br />
   <input name="image" type="hidden" id="image" value="<?=$html->image?>" />
      <input name="theFile" type="file" />
    </td>
   </tr>
   <tr>
    <td align="center" valign="top"><table width="730" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td height="40" align="center" valign="top">&nbsp;</td>
     </tr>
     <tr>
       <td height="72" align="center" valign="middle"><table width="700" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td height="50" align="left" valign="middle" class="txt01">
             <textarea name="body" id="body"><?
		  if ($html->body == NULL) echo $body_defult;
		  echo $html->body;
		  ?></textarea></td>
           </tr>
         </table></td>
     </tr>
     <tr>
      <td height="45" align="center" valign="top">
     <? if ($stat->stat_offers!=0){ ?>
      <table width="730" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="8" valign="top" bgcolor="#EECB00"><img style="display:block" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v3/tab311.jpg" width="730" height="8"></td>
          </tr>
        <tr>
          <td height="10" align="center" bgcolor="#EECB00"><table width="700" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><span style="font-family:Arial, Helvetica, sans-serif;font-size:14px; color:#FFF; font-weight:bold">Partner Offers</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td height="8" align="center" valign="bottom" bgcolor="#EECB00"><img style="display:block" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v3/tab312.jpg" width="730" height="8"></td>
          </tr>
      </table>
      <? } ?>
      </td>
      </tr>
     <tr>
       <td align="center">
       <? if ($stat->stat_offers!=0){ ?>
       <textarea name="offers" id="offers"><?
       if ($html->offers == NULL) echo $offer_defult;
	   else echo $html->offers;
	   ?></textarea>
       <? } ?>
       </td>
     </tr>
     </table></td>
   </tr>
   <tr>
    <td height="35" align="center" valign="bottom" class="txt01"><hr></td>
   </tr>
   <tr>
     <td height="15" align="center" valign="bottom" class="txt01"><table width="700" border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td align="left"><p style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">
         <? if ($stat->country == "mrp") { ?>          
 
<? } else { ?>
   Use your Air Miles Card together with your HSBC Credit Card and collect Air Miles twice
<? } ?>   
         </p></td>
       </tr>
     </table></td>
   </tr>
   <tr>
    <td height="70" align="left" valign="bottom">
    <? if ($stat->country == "mrp") { ?>          
<img style="display:block" src="http://enews-templates-bucket.s3.amazonaws.com/mrp/e-statment/v1/card.jpg" width="82" height="55">
<? } else { ?>
    <img style="display:block" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v3/footer/<?=$stat->country?>.jpg" width="700" height="73">
<? } ?>    
    </td>
   </tr>
  </table>
      </div>
    </div>
  </div>

          <!-------->
            
          </div>
        </div>
      </div>
    </div>
<?php echo form_close('');?>

    
    <script src="<?php echo site_url()?>js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>js/left_menu.js" type="text/javascript"></script> 
</body>
</html>