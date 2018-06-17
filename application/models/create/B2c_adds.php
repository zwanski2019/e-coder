<?php

class B2c_Adds extends CI_Model{
	
	function engAdds($data){
		foreach ($data as $info){
			$tableinfo []= explode("##",$info);
			
		}
		$table = '<table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:580px;" width="565">
                                                      <tbody>
                                                      <tr>
                                                          <td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:270px;" width="270">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="center" valign="top" width="48%" style="background:#65719c;padding-top:10px;padding-bottom:10px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                                                      <tr>
                                                                      <td style=
                      "padding: 0 10px;font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;"
                      class="stack-column-center" height="70"><a href=
                        "'.$tableinfo[0][2].'" style=
                        "text-decoration:none; color: #fff;">'.$tableinfo[0][0].'</a></td>
                                                                    </tr>
                                                                    </table></td>
                                                                </tr>
                                                            </tbody>
                                                            </table>
                                                          <table align="right" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:280px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;" width="250">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="center" valign="top" width="48%" style="background:red;padding-top:10px;padding-bottom:10px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                                                      <tr>
                                                                      <td style=
                      "padding: 0 10px;font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;"
                      class="stack-column-center" height="70"><a href=
                        "'.$tableinfo[1][2].'" style=
                        "text-decoration:none; color: #fff;">'.$tableinfo[1][0].'</a></td>
                                                                    </tr>
                                                                    </table></td>
                                                                </tr>
                                                            </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </tbody>
                                                    </table>';
		
		
		return $table;
	}
	
	function arAdds($data){
		foreach ($data as $info){
			$tableinfo []= explode("##",$info);
			
		}
		$table = '<table align="center" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:580px;" width="565">
                                                      <tbody>
                                                      <tr>
                                                          <td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:270px;" width="270">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="center" valign="top" width="48%" style="background:#65719c;padding-top:10px;padding-bottom:10px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                                                      <tr>
                                                                      <td style=
                      "padding: 0 10px;font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;"
                      class="stack-column-center" height="70"><a href=
                        "'.$tableinfo[0][2].'" style=
                        "text-decoration:none; color: #fff;">'.$tableinfo[0][0].'</a></td>
                                                                    </tr>
                                                                    </table></td>
                                                                </tr>
                                                            </tbody>
                                                            </table>
                                                          <table align="right" border="0" cellpadding="0" cellspacing="0" class="w100pc" style="width:280px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;" width="250">
                                                              <tbody>
                                                              <tr>
                                                                  <td align="center" valign="top" width="48%" style="background:red;padding-top:10px;padding-bottom:10px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                                                      <tr>
                                                                      <td style=
                      "padding: 0 10px;font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;"
                      class="stack-column-center" height="70"><a href=
                        "'.$tableinfo[1][2].'" style=
                        "text-decoration:none; color: #fff;">'.$tableinfo[1][0].'</a></td>
                                                                    </tr>
                                                                    </table></td>
                                                                </tr>
                                                            </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </tbody>
                                                    </table>';
		
		
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