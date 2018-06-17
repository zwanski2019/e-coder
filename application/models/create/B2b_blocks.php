<?php

class B2b_blocks extends CI_Model{
	
	function offerBlocks($data,$x){
		$table = NULL;
		$infos = explode("|",$data);
		$tableinfo = explode("##",$infos[0]);
		
		$table .='<td align="center" valign="top"><table align="center" border="0" cellpadding="0" cellspacing="0" style="width:300px;" width="300">
              <tbody>
                <tr>
                  <td align="center" valign="top"><a href="'.$tableinfo[3].'" target="_blank" ><img alt="" border="0" height="235" src="https://ooredoo.s3.amazonaws.com/business-news/img/'.$tableinfo[1].'.jpg" style="display:block;" width="300"/></a></td>
                </tr>
                <tr>
                  <td height="18" style="font-size:1px; line-height:1px;">&nbsp;</td>
                </tr>
               
                <tr>
                  <td style="font-family:Arial, sans-serif;font-size:12px;line-height:20px;color:#333333;text-align:left;" >'.$tableinfo[0].'</td>
                </tr>
                <tr>
                  <td height="5">&nbsp;</td>
                </tr>
              </tbody>
            </table></td>';
		
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