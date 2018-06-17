<?
foreach ($camps as $camp);
		foreach ($htmls as $html){
			if ($html->partner1==NULL) {$html->partner1='OOO';}
			if ($html->partner2==NULL) {$html->partner2='OOO';}
			if ($html->partner3==NULL) {$html->partner3='OOO';}
			if ($html->partner4==NULL) {$html->partner4='OOO';}
			};

?>

<!DOCTYPE html>
<html>
<head>
<title><?=$camp->cam_name?> - <?=date('F Y', strtotime($camp->edited))?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<style type="text/css">
.ReadMsgBody {width: 100%;}
.ExternalClass {width: 100%;}
.eoa_4tw{}
@media screen and (max-device-width: 480px) {
 [class="title"] {
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: none;
  font-size:140% !important;
  line-height:1.3 !important;  
 }
 [class="text"] {
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: none;
  font-size:100% !important;
  line-height:1.3 !important;
  padding:15px 0px 15px !important;
 }
 [class="ul"] {
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: none;
  font-size:100% !important;
  line-height:1 !important;
  padding-left:20px !important;
 }
 [class="text2"] {
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: none;
  font-size:80% !important;
  line-height:1 !important;
  padding:15px 0px 15px !important; 
 }
 [class="img"]{
  -ms-interpolation-mode: bicubic;
  width:45%;
 }
 [class="center"] {
  text-align: center !important;
 }
 
 [class="maxwidth"] {
  width: 100% !important;
 }
 [class="hide"] {
  display: none !important;
 }
 [class="show"] {
  display: block !important;
  font-size:80% !important;
 }
 [class="showcell"] {
  display: table-cell !important;
 }
 [class="img_logo"] {
  width: 100px !important;
  height: 38px !important;
 }
 [class="cards"] {
  width: 43px !important;
  height: 25px !important;
  padding-left:2px;
 }
}

span.yshortcuts { color:#000; background-color:none; border:none;}
span.yshortcuts:hover,
span.yshortcuts:active,
span.yshortcuts:focus {color:#000; background-color:none; border:none;}
</style>
</head>
<body style="-webkit-text-size-adjust:none;-webkit-font-smoothing:antialiased;text-align:center;color:#4c4c4c;padding:0;margin:0 auto;background:#8CD7EE;max-width:600px;width:100% !important;" class="eoa_4tw">
<table border="0" cellpadding="0" cellspacing="0" align="center" bordercolor="#8CD7EE" width="100%" style=""><tr>
<td align="center" valign="top" bgcolor="#8CD7EE">
    <table border="0" cellpadding="0" cellspacing="0" width="490" class="maxwidth">

<tr>
<td align="center" valign="top" bgcolor="#FFFFFF"><a href="http://www.airmilesme.com/en-<?=$camp->country?>?utm_source=am-ae&utm_medium=email&utm_term=members&utm_content=homepage&utm_campaign=[EMV FIELD]SEGMENT[EMV /FIELD]" target="_blank"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v5/v5_mobile_01.jpg" width="100%" border="0" style="display:block;" /></a></td>
      </tr>
<tr>
  <td width="490" align="center" valign="top" bgcolor="#C2C2C2" class="maxwidth" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v5/v5_mobile_02.jpg" border="0" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" /></td>
</tr>
<tr>
  <td><img src="http://enews.airmilesme.com/am/img/<?=$html->image?>.jpg" border="0" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" /></td>
</tr>
<tr>
<td bgcolor="#8CD7EE"> </td>
      </tr>
<tr>
  <td height="15" align="left" valign="bottom"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/spacer.gif" width="10" height="15" hspace="0" vspace="0" border="0" /></td>
</tr>
<tr>
<td height="11" align="left" valign="bottom" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/am_newsletter_v4_081.jpg" border="0" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" /></td>
      </tr>
<tr>
<td align="center" bgcolor="#D8F0FA"><table width="95%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="30" align="left"><p style="color:#444444;font-size:12px;font-family:Arial, Helvetica, sans-serif;padding:0;margin:0;" class="text">Dear <strong>Air Miles Member</strong>,</p></td>
          </tr>
<tr>
<td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="418" height="3" align="left" valign="top" bgcolor="#EE1C25" class="maxwidth" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v5/v5_mobile_04.jpg" width="100%" height="3" border="0" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" /></td>
              </tr>
<tr>
<td height="30" bgcolor="#EE1C25"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>
<td width="3%"> </td>
                    <td width="94%" align="left"><span style="font-weight:bold;font-size:18px;font-family:Arial, Helvetica, sans-serif;color:#FFF;" class="title"><?=html_entity_decode($html->title, ENT_QUOTES)?></span></td>
                    <td width="3%" align="left"></td>
                  </tr>
</table></td>
              </tr>
<tr>
<td bgcolor="#EE1C25" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v5/v5_mobile_05.jpg" width="100%" height="3" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" /></td>
              </tr>
</table></td>
          </tr>
<tr>
<td> </td>
          </tr>
<tr>
<td height="10" align="left" valign="top"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/spacer.gif" width="100%" height="10" hspace="0" vspace="0" border="0" style="display:block;"/></td>
          </tr>
<tr>
  <td align="left" valign="top"><span  style="line-height:1.5;color:#444444;font-size:12px;font-family:Arial, Helvetica, sans-serif;" class="text">
    <?=html_entity_decode($html->body);?>
  </span></td>
</tr>

<!--csbt-->
<? if ($camp->csButton == "y")  {?>

<tr>
  <td height="10" align="left" valign="top"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/spacer.gif" width="100%" height="10" hspace="0" vspace="0" border="0" style="display:block;"/></td>
</tr>
<tr>
<td> </td>
          </tr>


<tr>
<td align="left">
<a href="http://www.airmilesme.com/en-<?=$camp->country?>/section/collect?utm_source=<?=$camp->country?>&utm_medium=email&utm_term=members&utm_content=collect&utm_campaign=[EMV FIELD]SEGMENT[EMV /FIELD]" target="_blank"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/am_newsletter_v4_40.jpg" hspace="" vspace="0" border="0" class="img" /></a><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/spacer.gif" width="10" height="24" hspace="0" vspace="0" border="0" /><a href="http://www.airmilesme.com/en-<?=$camp->country?>/section/spend?utm_source=<?=$camp->country?>&utm_medium=email&utm_term=members&utm_content=spend&utm_campaign=[EMV FIELD]SEGMENT[EMV /FIELD]" target="_blank"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/am_newsletter_v4_41.jpg" hspace="0" vspace="0" border="0" class="img" /></a>
</td>
          </tr>
<? } ?>          
          <!--csbt-->

<!--tnc-->
<? if ($camp->tnc == "y")  {?>

<tr>
<td height="10" align="left"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/spacer.gif" width="100%" height="10" hspace="0" vspace="0" border="0" style="display:block;"/></td>
          </tr>

<tr>
  <td align="left" valign="top"><p style="line-height:1.5;color:#900;font-size:9px;font-family:Arial, Helvetica, sans-serif;">
  <?=html_entity_decode($html->termsandcon, ENT_QUOTES);?></p></td>
</tr>
<? } ?>
<!--tnc-->
</table>
</td>
      </tr>
<tr>
<td height="11" valign="top" style="font-size:1px;"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/am_newsletter_v4_14.jpg" border="0" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" /></td>
      </tr>
<tr>
<td bgcolor="#8CD7EE"> </td>
      </tr>
<tr>
  <td align="right" bgcolor="#8CD7EE"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/spacer.gif" width="10" height="15" hspace="0" vspace="0" border="0" /></td>
</tr>
<tr>
<td align="right" bgcolor="#8CD7EE"><table width="147" border="0" cellspacing="0" cellpadding="0"><tr>
<td width="91" bgcolor="#2BC4F0"><img style="display:block;" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/am_newsletter_v4_18.jpg" width="91" height="30" /></td>
            <td width="20" bgcolor="#30C0F5"><a href="http://www.facebook.com/AirMilesME" target="_blank"><img style="display:block;" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/am_newsletter_v4_18_1.jpg" width="20" height="30" border="0" /></a></td>
            <td width="21" bgcolor="#29C4F4"><a href="http://twitter.com/#!/AirMiles_ME" target="_blank"><img style="display:block;" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/am_newsletter_v4_18_2.jpg" width="21" height="30" border="0" /></a></td>
            <td width="15"> </td>
          </tr></table></td>
      </tr>
<tr>
<td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#D8F0FA">
<tr>
<td colspan="2" align="left" bgcolor="#D8F0FA" style="font-size:1px;"><img style="display:block;" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v5/v5_mobile_06.jpg" width="100%" height="3" /></td>
          </tr>
<tr>
<td width="78" align="left" bgcolor="#D8F0FA"><img style="display:block;" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v5/v5_mobile_03.jpg" width="78" height="49" /></td>
   <td align="left">   
   <table align="left" cellpadding="0" cellspacing="0">
     <tr>
       <td width="100" align="center"><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$html->partner1?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></td>
       <td width="100" align="center"><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$html->partner2?>.jpg" alt="" width="100" height="38" style="display:block;" hspace="1" /></td>
       <td width="100" align="center" class="hide"><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$html->partner3?>.jpg" alt="" width="100" height="38" style="display:block;" hspace="1" /></td>
       <td width="100" align="center" class="hide"><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$html->partner4?>.jpg" alt="" width="100" height="38" style="display:block;" hspace="1" /></td>
     </tr>
   </table>
   
   </td>
          </tr>
<tr>
<td colspan="2" align="left" bgcolor="#D8F0FA" style="font-size:1px;"><img style="display:block;" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v5/v5_mobile_07.jpg" width="100%" height="3" /></td>
          </tr>
</table></td>
      </tr>
<tr>
<td align="center"> </td>
      </tr>
<tr>
<td>
   </td>
      </tr>
<tr>
  <td height="15" valign="bottom"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/spacer.gif" width="10" height="15" hspace="0" vspace="0" border="0" /></td>
</tr>
<tr>
<td height="25" valign="bottom">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="hide"><tr>
<td align="left" valign="middle" bgcolor="#8CD7EE"><p style="color:#fff;font-size:12px;font-family:Arial, Helvetica, sans-serif;" class="hide">Rewards Management ME FZ-LLC. </p></td>
            <td align="right"><table width="150" border="0" cellspacing="0" cellpadding="0"><tr>
<td width="50" align="right">&nbsp;</td>
                <td width="50" align="right">&nbsp;</td>
                <td width="50" align="right"><img style="display:block;" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/bl.jpg" width="43" height="25" /></td>
                </tr></table></td>
            </tr></table>
<div style="float:right;width:200px;display:none;" class="show"> 
          <img style="float:right;display:block;" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v4/bl.jpg" width="0" height="0" class="cards" />
</div>
          <div style="padding-top:10px;float:left;width:100%;color:#fff;font-size:0px;font-family:Arial, Helvetica, sans-serif;display:none;" class="show">Rewards Management ME FZ-LLC. </div>
          
          </td>
      </tr>
<tr>
<td height="25" align="left"><span class="text2" style="color:#fff;font-size:12px;font-family:Arial, Helvetica, sans-serif;"><a href="http://www.airmilesme.com/en-<?=$camp->country?>/article/general/terms-conditions.html?utm_source=<?=$camp->country?>&utm_medium=email&utm_term=members&utm_content=terms&utm_campaign=[EMV FIELD]SEGMENT[EMV /FIELD]" target="_blank" style="text-decoration:none;color:#fff;font-size:12px;font-family:Arial, Helvetica, sans-serif;">Terms & Conditions</a> <span style="color:#fff;font-size:12px;font-family:Arial, Helvetica, sans-serif;" class="text2">|</span> <a href="http://www.airmilesme.com/en-<?=$camp->country?>/article/general/privacy-policy.html?utm_source=<?=$camp->country?>&utm_medium=email&utm_term=members&utm_content=privacy&utm_campaign=[EMV FIELD]SEGMENT[EMV /FIELD]" target="_blank" style="text-decoration:none;color:#fff;font-size:12px;font-family:Arial, Helvetica, sans-serif;">Privacy Policy</a> <span style="color:#fff;font-size:12px;font-family:Arial, Helvetica, sans-serif;" class="text2">|</span> <a href="http://www.airmilesme.com/en-<?=$camp->country?>/contact-us?utm_source=<?=$camp->country?>&utm_medium=email&utm_term=members&utm_content=contact&utm_campaign=[EMV FIELD]SEGMENT[EMV /FIELD]" target="_blank" style="text-decoration:none;color:#fff;font-size:12px;font-family:Arial, Helvetica, sans-serif;">Contact Us</a></span></td>
      </tr>
<tr>
<td><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/am_v5/v5_mobile_08.jpg" height="1" style="display:block;width:100%;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" /></td>
      </tr>
<tr>
<td align="left">&nbsp;</td>
      </tr>
</table>
</td>
  </tr></table>
</body>
</html>