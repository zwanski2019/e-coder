<?php

class B2c_blocks extends CI_Model{
	
	function engBlocks($data,$x){
		$table = NULL;
		$tableinfo = explode("##",$data);
		if ($x % 2 != 0) {
		$table = '<table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:580px;" width="580">
                                              <tbody>
                                              <tr>
                                                  <td align="center" valign="top" style=
                "background:#fff;padding-top:10px;padding-bottom:10px;border-radius: 10px 10px 10px 10px;"><table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:565px;" width="565">
                                                      <tbody>
                                                      <tr>
                                                          <td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:270px;" width="270">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="center" class="padb15" valign="top"><a href="'.$tableinfo[3].'"><img src=
                        "https://ooredoo.s3.amazonaws.com/business-news/img/'.$tableinfo[1].'.jpg" alt="" width="270" height=
                        "185" class="center-on-narrow" style="border: 0;border-radius: 5px;" /></a></td>
                                                                </tr>
                                                            </tbody>
                                                            </table>
                                                          <table align="right" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:280px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;" width="250">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="left" valign="top" class="txtcenter" style="font-family: Arial, sans-serif; font-size:13px; line-height:20px; color:#767676;"><a href="'.$tableinfo[3].'" style=
                        "text-decoration:none; color:#555555;">'.$tableinfo[0].'</a></td>
                                                                </tr>
                                                            </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </tbody>
                                                    </table></td>
													
													
                                                </tr>
											<tr><td align="center" valign="top" style="background:#eaefec;padding-top:10px;padding-bottom:10px;" height="4"></td></tr>
                                            </tbody>
                                            </table>';
		}
		else {
		$table = '<table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:580px;" width="580">
                                              <tbody>
                                              <tr>
                                                  <td align="center" valign="top" style=
                "background:#fff;padding-top:10px;padding-bottom:10px;border-radius: 10px 10px 10px 10px;"><table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:565px;" width="565">
                                                      <tbody>
                                                      <tr>
                                                          <td class="padb15" valign="top"><table align="right" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:255px;" width="255">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="center" class="padb15" valign="top"><a href="'.$tableinfo[3].'"><img src=
                        "https://ooredoo.s3.amazonaws.com/business-news/img/'.$tableinfo[1].'.jpg" alt="" width="270" height=
                        "185" class="center-on-narrow" style="border: 0;border-radius: 5px;" /></a></td>
                                                                </tr>
                                                            </tbody>
                                                            </table>
                                                          <table align="left" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:280px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;" width="250">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="left" valign="top" class="txtcenter" style="font-family: Arial, sans-serif; font-size:13px; line-height:20px; color:#767676;"><a href=
                        "'.$tableinfo[3].'" style=
                        "text-decoration:none;color:#555555">'.$tableinfo[0].'</a></td>
                                                                </tr>
                                                            </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </tbody>
                                                    </table></td>
                                                </tr>
												<tr><td align="center" valign="top" style="background:#eaefec;padding-top:10px;padding-bottom:10px;" height="4"></td></tr>
                                            </tbody>
                                            </table>';
		}
		return $table;
	}
	
	function arBlocks($data,$x){
		$table = NULL;
		$tableinfo = explode("##",$data);
		if ($x % 2 != 0) {
		$table = '<table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:580px;" width="580">
                                              <tbody>
                                              <tr>
                                                  <td align="center" valign="top" style=
                "background:#fff;padding-top:10px;padding-bottom:10px;border-radius: 10px 10px 10px 10px;"><table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:565px;" width="565">
                                                      <tbody>
                                                      <tr>
                                                          <td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:270px;" width="270">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="center" class="padb15" valign="top"><a href="'.$tableinfo[3].'"><img src=
                        "https://ooredoo.s3.amazonaws.com/business-news/img/'.$tableinfo[1].'.jpg" alt="" width="270" height=
                        "185" class="center-on-narrow" style="border: 0;border-radius: 5px;" /></a></td>
                                                                </tr>
                                                            </tbody>
                                                            </table>
                                                          <table align="right" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:280px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;" width="250">
                                                              <tbody>
                                                              <tr>
                                                                  <td dir="rtl" align="right" valign="top" class="txtcenter" style="font-family: Arial, sans-serif; font-size:13px; line-height:20px; color:#767676;"><a href="'.$tableinfo[3].'" style=
                        "text-decoration:none; color:#555555;">'.$tableinfo[0].'</a></td>
                                                                </tr>
                                                            </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </tbody>
                                                    </table></td>
													
													
                                                </tr>
											<tr><td align="center" valign="top" style="background:#eaefec;padding-top:10px;padding-bottom:10px;" height="4"></td></tr>
                                            </tbody>
                                            </table>';
		}
		else {
		$table = '<table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:580px;" width="580">
                                              <tbody>
                                              <tr>
                                                  <td align="center" valign="top" style=
                "background:#fff;padding-top:10px;padding-bottom:10px;border-radius: 10px 10px 10px 10px;"><table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:565px;" width="565">
                                                      <tbody>
                                                      <tr>
                                                          <td class="padb15" valign="top"><table align="right" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:255px;" width="255">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="center" class="padb15" valign="top"><a href="'.$tableinfo[3].'"><img src=
                        "https://ooredoo.s3.amazonaws.com/business-news/img/'.$tableinfo[1].'.jpg" alt="" width="270" height=
                        "185" class="center-on-narrow" style="border: 0;border-radius: 5px;" /></a></td>
                                                                </tr>
                                                            </tbody>
                                                            </table>
                                                          <table align="left" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:280px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;" width="250">
                                                              <tbody>
                                                              <tr>
                                                                  <td dir="rtl" align="right" valign="top" class="txtcenter" style="font-family: Arial, sans-serif; font-size:13px; line-height:20px; color:#767676;"><a href=
                        "'.$tableinfo[3].'" style=
                        "text-decoration:none;color:#555555">'.$tableinfo[0].'</a></td>
                                                                </tr>
                                                            </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </tbody>
                                                    </table></td>
                                                </tr>
												<tr><td align="center" valign="top" style="background:#eaefec;padding-top:10px;padding-bottom:10px;" height="4"></td></tr>
                                            </tbody>
                                            </table>';
		}
		return $table;
	}
	
	function setTableStart(){
		$table ='<table width="98%" border="0" cellpadding="0" cellspacing="0"><tbody>';
		return $table;
	}
	
	function setTableEnd(){
		$table ='</tbody></table>';
		return $table;
	}
	
	
}
?>