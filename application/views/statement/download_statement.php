<?php
foreach ($statement_info as $statement);
foreach ($offer_info as $offer);
foreach ($body_copy_info as $body_copy);
if ($statement->country != "mrp") $program = "Air Miles";
else $program = "Rewards Points";

date_default_timezone_set("Asia/Dubai"); 
$year = date("Y");
$month = date("m");
if ($month > '03'){
$year = date('Y', strtotime("+1 year", strtotime($year)));
}

$filename = preg_replace('/[^A-Za-z0-9]/', "", $statement->stat_name).".html";
header('Content-Disposition: attachment; filename='.$filename);


?>
<!DOCTYPE html>
<html>
<head>
<title><?=$statement->stat_name?> - <?=date('F Y', strtotime($statement->edited))?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<style type="text/css">
.ReadMsgBody {width: 100%;}
.ExternalClass {width: 100%;}
@media only screen and (max-device-width:600px) {
[class="title"] {-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;font-family:Arial, Helvetica, sans-serif;font-size:150% !important;line-height:1.3 !important;text-align:center !important;padding-left:5px;}
[class="text"] {-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;font-family:Arial, Helvetica, sans-serif;font-size:80% !important;padding:3px !important; line-height:1.3;}
[class="text_offer"] {webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;font-family:Arial, Helvetica, sans-serif;font-size:80% !important;line-height:1 !important}
[class="center"] {text-align: center !important;}
[class="maxwidth"] {width: 100% !important;}
[class="img_logo"] {width:40% !important;height:40% !important;}
[class="hide"] {display:none}
[class="columns-container"] { padding:5px !important;}
td[class="force-col"] {display: block;padding-right: 0 !important;}
table[class="col-3"] {float: none !important;width: 100% !important;margin-bottom: 1px;padding-bottom: 1px;}
table[id="last-col-3"] {float:left; width:100% !important}
img[class="col-3-img"] {float: left;margin-left: 6px;max-width: 100%;}
}

span.yshortcuts { color:#000; background-color:none; border:none;}
span.yshortcuts:hover,
span.yshortcuts:active,
span.yshortcuts:focus {color:#000; background-color:none; border:none;}
</style>
</head>
<body style="-webkit-text-size-adjust:none;-webkit-font-smoothing:antialiased;text-align:center;color:#4c4c4c;padding:0;margin:0 auto;background:#FFFFFF;max-width:600px;width:100% !important;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle">
    <table id="Table_01" width="600" border="0" cellpadding="0" cellspacing="0" class="maxwidth">
      <tr>
        <td class="maxwidth"><img src="http://enews.airmilesme.com/am/img/<?=$statement->topImg?>.jpg" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;"></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#00ADEF"><table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="5" class="hide"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" class="hide"></td>
          </tr>
          <tr>
            <td><p style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#FFFFFF" class="text">Dear %%full_name%%,<br>
              <br>
              Your Air Miles statement is now ready. Click on View My Account for more details.</p></td>
          </tr>
          <tr>
            <td height="10" class="hide"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" class="hide"></td>
          </tr>
          
          <tr>
            <td height="20" style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#FFFFFF" class="text"></td>
          </tr>
          <tr>
            <td height="5" class="hide"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" class="hide"></td>
          </tr>
          
          
          
        </table></td>
      </tr>
      <tr>
        <td align="right" valign="top" class="columns-container"><table width="98%" border="0" cellpadding="0" cellspacing="0" class="maxwidth">
          <tr>
            <td width="50%" valign="top" class="force-col" style="padding-right: 30px;"><!-- ### COLUMN 1 ### -->
              <table border="0" cellspacing="0" cellpadding="0" align="left" class="col-3">
                <tr>
                  <td align="left" valign="top">
                  <table width="300" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="20" colspan="2" align="left" valign="top" class="hide"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;"/></td>
                      </tr>
                    <tr>
                      <td height="20" align="left" valign="top" class="txt01"><strong style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">
					  <?php if ($statement->country != "mrp") {?>
                      Air Miles Card
                <?php } else { ?>
                	My Rewards Points Account 
                <?php } ?> </strong></td>
                      <td height="20" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">: %%card_no%%</span></td>
                    </tr>
                    <tr>
                      <td height="5" colspan="2" align="left" valign="top" class="hide" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" /></td>
                    </tr>
                    <tr>
                      <td width="130" height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"><strong>Statement Period</strong></span></td>
                      <td width="170" height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">: %%statement_period%%</span></td>
                    </tr>
                    <tr>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"><strong>Opening Balance</strong></span></td>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">: %%opening_balance%%</span></td>
                    </tr>
                    <tr>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"><strong><?=$program?> Earned </strong></span></td>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">:  %%iss_points%%</span></td>
                    </tr>
                    <tr>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"><strong><?=$program?> Redeemed </strong></span></td>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">: %%red_points%%</span></td>
                    </tr>
                    <tr>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"><strong>Adjusted Balance</strong></span></td>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">: %%adj_points%%</span></td>
                    </tr>
                    <tr>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"><strong>Available Balance</strong></span></td>
                      <td height="15" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">: %%closing_balance%%</span></td>
                    </tr>
                    <tr>
                      <td height="5" colspan="2" align="left" valign="top" class="hide"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" /></td>
                    </tr>
                    <tr>
                      <td height="20" align="left" valign="top" class="txt01"><strong style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"><?=$program?> Expiring on<br>
 31 / 03 / <?=$year?></strong></td>
                      <td height="20" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"> : %%expiring_points%%</span></td>
                    </tr>
                    <tr>
                      <td height="20" align="left" valign="top" class="txt01"><strong style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444">LESS1</strong></td>
                      <td height="20" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#444444"> : %%act%%</span></td>
                    </tr>
                    
                    <tr>
                      <td height="20" colspan="2" align="left" valign="top" class="txt01"><span style="font-family:Arial, Helvetica, sans-serif;font-size:10px; color:#444444">
                      
                      <?php if ($statement->country != "mrp") {?>
                      To learn more about the Air Miles expiry policy :
                      <?php } else { ?>
                      Learn more about the My Rewards Points expiry policies :
                      <?php } ?>
                      
                      </span>
                            <ul type="square" >
                              <li style="font-family:Arial, Helvetica, sans-serif;font-size:10px; margin:0px;">
                              <?php if ($statement->country != "mrp") { ?>
                              <a href="http://www.airmilesme.com/en-<?=$statement->country?>/article/about-us/air-miles-expiry-policy.html#3years" style="color:#444444; text-decoration:none">Three Year Air Miles Expiry Policy</a>
                               <?php } else { ?>
                             <a href="          
https://www.myrewardspoints.com/en-%%country_short%%/general/rewards-points-expiry/#years" target="_blank" style="color:#444444; text-decoration:none">Three Year Rewards Points Expiry Policy</a>
                              <?php } ?>
                             </li>
                              <li style="font-family:Arial, Helvetica, sans-serif;font-size:10px; margin:0px;">
                              <?php if ($statement->country != "mrp") { ?>
                              <a href="http://www.airmilesme.com/en-<?=$statement->country?>/article/about-us/air-miles-expiry-policy.html#15months" style="color:#444444; text-decoration:none">Fifteen Month Inactive Account Closure Policy</a>
                              <?php } else { ?>
                              <a href="
https://www.myrewardspoints.com/en-%%country_short%%/general/rewards-points-expiry/#months" target="_blank" style="color:#444444; text-decoration:none">Fifteen Month Inactive Account Closure Policy</a>
                              <?php } ?>
                              </li>
                            </ul></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            <td align="center" valign="top" class="force-col"><!-- ### COLUMN 2 ### -->
              <table border="0" cellspacing="0" cellpadding="0" align="center" class="last-col-3" width="100%">
                <tr>
                  <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td height="5" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" /></td>
                    </tr>
                    <tr>
                      <td align="center" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center" bgcolor="#ffffff" height="125"></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="5" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" /></td>
                    </tr>
                    <?php if ($statement->country != "mrp") { ?>
                    <tr>
                    <td height="30" align="center" bgcolor="#660066" style="padding:10px;"><strong><a href="http://www.airmilesme.com/en-<?=$statement->country?>/storelocator" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#FFF; text-decoration:none;">Find the nearest partner to you</a></strong></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td height="5" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" /></td>
                    </tr>
                    
                    <tr>
                      <td height="30" align="center" bgcolor="#00ADEF" style="padding:15px;"><strong>
                      
                      <?php if ($statement->country != "mrp") { ?>
                                            
                      <a href="https://www.airmilesme.com/en-<?=$statement->country?>/myaccount/mytransaction?utm_source=am-ae&utm_medium=email&utm_term=members&utm_content=Account&utm_campaign=[EMV FIELD]SEGMENT[EMV /FIELD]" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#FFF; text-decoration:none">View My Account</a>
                      
                      <?php } else { ?>
                      
                      <!--<a href="https://www.myrewardspoints.com/en-%%country_short%%/my-account/view-my-statement/" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#FFF; text-decoration:none">View My Account</a>-->
                      
                      <?php } ?>
                      
                      
                      </strong></td>
                    </tr>
                    
                    
                    
                    
                    
                  </table></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="10" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="10" style="display:block; border:none;" /></td>
      </tr>
      <tr>
        <td align="left">
        <?php
		 if ($statement->country != "mrp") {
		?>
        <img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/offers.png" width="126" height="36" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;">
        <?php } ?>
        </td>
      </tr>
      <tr>
        <td class="hide" height="5"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" /></td>
      </tr>
      <tr>
        <td align="right" class="columns-container">
        <?php
		 if ($statement->country != "mrp") {
		?>        
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="maxwidth">
          <tr>
            <td width="50%" align="center" valign="top" class="force-col" style="padding-right: 30px;"><!-- ### COLUMN 1 ### -->
              
              
              <table border="0" cellspacing="0" cellpadding="0" align="left" class="col-3"><tr><td align="left" valign="top">
                  
                  <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td>
                      
                      <?php
				  	for ($x=1; $x<=$statement->stat_offers; $x++) {						
							$info = explode("|",$offer->{'offer'.$x});

						?>
                      
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="80%"><a href="<?=$info[2]?>" style="color:#09C; text-decoration:none"><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$info[0]?>.jpg" style="border:none;"><br><br>

                          <span style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#09C; text-decoration:none" class="text_offer"><?=$info[1]?></span><br>
<span style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#F00; text-decoration:none" class="text_offer">Read More</span></a>
                          </td>
                          <td width="20%">
                          <a href="<?=$info[2]?>"><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/icons/<?=$info[3]?>.png" alt="Read more" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;"></a>
                          </td>
                        </tr>
                        
                        <? if ($statement->stat_offers != $x) {
							echo "<tr><td>&nbsp;</td></tr>";
						echo "<tr><td bgcolor=\"#00ADEF\" height=\"1\" style=\"font-size:1px;\" colspan=\"2\"><img src=\"http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif\" width=\"1\" height=\"1\" style=\"display:block; border:none;\"/></td></tr><tr><td colspan=\"2\">&nbsp;</td></tr>";
					} ?>
                        
                      </table>
                      
                      <?php
                    
                   } ?>
                      
                      </td>
                    </tr>
                    
                    
                    <tr><td>&nbsp;</td></tr>
                    </table>
                    
                    
                    </td></tr>
              </table>


              </td>
            <td align="right" valign="top" class="force-col"><!-- ### COLUMN 2 ### -->
              <table border="0" cellspacing="0" cellpadding="0" width="100%" align="right" class="last-col-3">
                <tr>
                  <td align="right" valign="top" ><a href="<?=$statement->bannerURL?>"><img src="http://enews.airmilesme.com/am/img/<?=$statement->banner?>.jpg" alt="Image Caption" border="0" hspace="0" vspace="0" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" class="col-3-img"></a></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <?php } ?>
        </td>
        </tr>
      <tr>
        <td height="20"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="20" style="display:block; border:none;"></td>
      </tr>
      <tr>
        <td bgcolor="#00ADEF" height="1" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;"></td>
      </tr>
      <tr>
        <td><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/<?=$statement->country?>-footer.jpg" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;"></td>
      </tr>
      <tr>
        <td align="center">
        <?php
		 if ($statement->country != "mrp") {
		?>
        <strong style="font-family:Arial, Helvetica, sans-serif;font-size:14px; color:#999">Use your Air Miles Card together with your HSBC Credit Card and collect Air Miles twice.</strong>
        <?php } ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>