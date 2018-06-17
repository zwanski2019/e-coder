<?php

class Create extends CI_Controller {
		var $siteTitel = "E-Cod3r";
		var $siteVersion = "v.2";
		
		function __construct(){
			parent::__construct();
			
		}
		
		
		
		function create_html(){			
			//$camId = $this->uri->segment(2);
//			$this->load->model('db_list');
//			$data['camps'] = $this->db_list->getCamInfo($camId,'campagins');
//			$data['htmls'] = $this->db_list->getCamInfo($camId,'content_'.$this->user->get_program());			
//			$this->load->view('create_html',$data);
			}
		
		function sampleEmail(){
			$email = trim($this->input->get('email'));
			$camId = trim($this->input->get('camId'));
			
			$html = $this->create_online_html($camId,true);
			
			if ($email == NULL){
				echo "Invalid Email";
				}
			else {

				$this->load->model('send');
				$this->send->sampleEmail($email,$html);
				echo "Sample email send!";
				}
		}
			
		function create_online_html($camId = NULL,$reply = NULL){
			$camId == NULL ? $camId = $this->uri->segment(2) : '';
			
			$this->load->model('db_list');
			$this->load->model('constants');
			$camp = $this->db_list->getCamInfo($camId,'campagins','cam_id');
			$this->constants->setSession($camp[0]->program);			
			$body = $this->db_list->getCamInfo($camId,'content_'.$camp[0]->program,'cam_id');			
			$templateConfig = $this->db_list->getCamInfo($camp[0]->cam_theme,'camp_templates','templateFile');
			
			$images = $this->db_list->getInfo($camId,'image_gallary','cam_id');
			$camp_adds = $this->db_list->getFullInfo('camp_adds');
			$camp_add_select = explode("|",$camp[0]->camp_adds);	
			$totadds = NULL;		
			foreach ($camp_adds as $adds) {
					foreach ($camp_add_select as $select) {
						
							if ($adds->id  == $select){
								$totadds .= '<tr><td>'.$adds->addCopy.'</td></tr>';
							}
						}
				}
			
			$html  = "";
			if ($this->uri->segment(3)=="save" && $camp[0]->cam_theme == "V1"){
				$html = "[EMV HTMLPART]";
			}
			if ($this->uri->segment(3)=="online") {
				$html .= file_get_contents(base_url().'templates/V1_online_oline.html', true);
				}
			else {
				
				($templateConfig[0]->partners == 'Y') ? $partners = '' : $partners = '_np';
				$html .= file_get_contents(base_url().'templates/'.$camp[0]->program.'/'.$camp[0]->cam_theme.$partners.'.html', true);
			}
			
			$tables=NULL;
			if ($camp[0]->cam_theme == 'multioffer') {
				if ($body[0]->offers!=NULL){
					$infos = array_filter(explode("|",$body[0]->offers));
					$i=1;$x=1;
					$infopack=NULL;
					foreach ($infos as $info){
						$infopack .= $info;
						$breakPoint = explode("##",$info);
						$loop = $breakPoint[2];
						if ($loop == 1){
							$tables .= $this->multiTable1($infopack,$x);
							$infopack=NULL;
						}
						else {
						if  ($i % 2 != 0) { $infopack .='|'; }
						if ($i % 2 == 0 && $infopack!='|') {
							$tables .= $this->multiTable2($infopack,$x);
							$x++;
							$infopack=NULL;
						}
						$i++;
						}
					}
				}
			}
			
			if ($camp[0]->cam_theme == 'b2c_en') {
				if ($body[0]->offers!=NULL){
					$infos = array_filter(explode("|",$body[0]->offers));
					$x=1;
					$infopack=NULL;
					foreach ($infos as $info){
						$infopack .= $info;
						$breakPoint = explode("##",$info);
						$this->load->model('create/b2c_blocks');
						$tables .= $this->b2c_blocks->engBlocks($infopack,$x);
						$infopack=NULL;
						$x++;
					}
				}
				if ($body[0]->addBlock!=NULL){
					$infos = array_filter(explode("|",$body[0]->addBlock));
					$this->load->model('create/b2c_adds');
					$addBlocks = $this->b2c_adds->engAdds($infos);
				}
			}
			
			
			if ($camp[0]->cam_theme == 'b2c_ar') {
				if ($body[0]->offers!=NULL){
					$infos = array_filter(explode("|",$body[0]->offers));
					$x=1;
					$infopack=NULL;
					foreach ($infos as $info){
						$infopack .= $info;
						$breakPoint = explode("##",$info);
						$this->load->model('create/b2c_blocks');
						$tables .= $this->b2c_blocks->arBlocks($infopack);
						$infopack=NULL;
						$x++;
					}
				}
				if ($body[0]->addBlock!=NULL){
					$infos = array_filter(explode("|",$body[0]->addBlock));
					$this->load->model('create/b2c_adds');
					$addBlocks = $this->b2c_adds->arAdds($infos);
				}
				
			}
			
			if ($camp[0]->cam_theme == 'b2b_1') {
				$this->load->model('create/b2b_blocks');
				if ($body[0]->offers!=NULL){
					$infos = array_filter(explode("|",$body[0]->offers));
					$x=1;
					$infopack=NULL;
					$tables .=$this->b2b_blocks->setTableStart();
					foreach ($infos as $info){
						$infopack .= $info;
						$breakPoint = explode("##",$info);
						$tables .= $x == 1 ? '<tr>' : '';						
						$tables .= $this->b2b_blocks->offerBlocks($infopack,$x);						
						$tables .= $x != 1 && $x % 3 == 0 ? '</tr>' : '';
						$tables .= $x % 3 == 0 ? '<tr><td>
						<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:300px;" width="300"><tr>
						  <td  height="5" style="background-color: red;"></td>
						</tr>
						<tr>
						  <td  height="5" style="background-color: #fff;"></td>
						</tr>
						</table>
				</td><td><table align="center" border="0" cellpadding="0" cellspacing="0" style="width:300px;" width="300"><tr>
						  <td  height="5" style="background-color: red;"></td>
						</tr>
						<tr>
						  <td  height="5" style="background-color: #fff;"></td>
						</tr>
						</table></td><td><table align="center" border="0" cellpadding="0" cellspacing="0" style="width:300px;" width="300"><tr>
						  <td  height="5" style="background-color: red;"></td>
						</tr>
						<tr>
						  <td  height="5" style="background-color: #fff;"></td>
						</tr>
						</table></td></tr><tr>' : '';
						$infopack=NULL;
						$x++;
					}
					$tables .=$this->b2b_blocks->setTableEnd();
				}
			}
			
			if ($camp[0]->cam_theme == 'twoColumn') {
				if ($body[0]->offers!=NULL){
					$tables .= $this->cretaeTable02($body[0]->offers);
				}
			}
			if ($camp[0]->sysType == 'sp') {
				$sys_name='%%full_name%%';
				$sys_segment= '%%camp_title%%';
				$sys_card='%%card_no%%';
				$sys_email='%%email%%';
			}
			else {
				$sys_name='[EMV FIELD]FULLNAME[EMV /FIELD]';
				$sys_segment= '[EMV FIELD]SEGMENT[EMV /FIELD]';
				$sys_card='[EMV FIELD]CARDNUMBER[EMV /FIELD]';
				$sys_email='[EMV FIELD]EMAIL[EMV /FIELD]';
				
			}
			//print_r($templateConfig[0]);exit;
			if ($templateConfig[0]->mainImage == 'Y') {
				if (!isset($images[0]->image01)) {
					$images = (array)$images;
					$images[0]['image01'] = 'Upload Image';
					$images[0]['image01_link'] = 'Add link';
					$images[0]['image02'] = 'Upload Image';
					$images[0] = (object)$images[0];
				}
			}

			$patchedBody = str_replace('<td>','<td style="color: #3e3e3e; font-weight: normal; text-align: left; font-family: Arial, Helvetica, sans-serif; vertical-align: top; padding:5px;font-size: 0.8em; font-size: 12px; ">', html_entity_decode($body[0]->body, ENT_QUOTES));
			
			$html = str_replace(array('%%camp_title%%',
			'%%date%%',
			'%%country%%',			
			'%%body%%',
			'%%offers%%',
			'%%camp_adds%%%',
			'%%sys_name%%',
			'%%sys_segment%%',
			'%%sys_card%%',
			'%%sys_email%%'
			),
			array($camp[0]->cam_name, 
			date('F Y', strtotime($camp[0]->edited)),
			$camp[0]->country,			
			$patchedBody,
			$tables,
			$totadds,
			$sys_name,
			$sys_segment,
			$sys_card,$sys_email
			), $html);
			
			// add main Images
			if ($templateConfig[0]->mainImage == 'Y') {
				$html = str_replace(array(
				'%%main-image%%',
				'%%image01_link%%',
				'%%footer-image%%'
				),
				array(
				($_SESSION['imagePath'].$images[0]->image01.".jpg"),
				$images[0]->image01_link,
				$images[0]->image02
				), $html);
			}
			// add main Images - end
			
			// add addBlocks
			if ($templateConfig[0]->adds == 'Y') {
				$html = str_replace(array('%%addBlocks%%'),
									array($addBlocks),
									$html);
			}
			// add addBlocks
			
			// add partners 
			if ($camp[0]->program == 'airmiles'){
				$html = str_replace(array(
				'%%partner1%%',
				'%%partner2%%',
				'%%partner3%%',
				'%%partner4%%',
				'%%partner5%%',
				'%%partner6%%',
				'%%partner7%%',
				'%%partner8%%',
				),
				array(
				$body[0]->partner1 == NULL ? 'OOO' : $body[0]->partner1,
				$body[0]->partner2 == NULL ? 'OOO' : $body[0]->partner2,
				$body[0]->partner3 == NULL ? 'OOO' : $body[0]->partner3,
				$body[0]->partner4 == NULL ? 'OOO' : $body[0]->partner4,
				$body[0]->partner4 == NULL ? 'OOO' : $body[0]->partner5,
				$body[0]->partner4 == NULL ? 'OOO' : $body[0]->partner6,
				$body[0]->partner4 == NULL ? 'OOO' : $body[0]->partner7,
				$body[0]->partner4 == NULL ? 'OOO' : $body[0]->partner8,
				), $html);
			}
			// add partners - end
			
			$html = str_replace(array('%%camp_title%%','%%date%%'),
								array($camp[0]->cam_name, date('F Y', strtotime($camp[0]->edited))
								), $html);
			
			
			if ($this->uri->segment(3)=="save"){
				$filename = preg_replace('/[^A-Za-z0-9]/', "", $camp[0]->cam_name).".html";
				header('Content-Disposition: attachment; filename='.$filename);
			}
			
			if ($reply){
				return $html;
			}
			else {
				print $html;
			}
			//$this->load->view('create_online_html',$data);
			}
		
		
		function create_online_file(){			
			$id = $this->uri->segment(2);
			$this->load->model('db_list');
			$data['info'] = $this->db_list->getInfo($id,'ext_tnc','tnc_id');			
			$this->load->view('tools/create_online_file',$data);
			}
			
		function view_statement(){			
			$camId = $this->uri->segment(2);
			$this->load->model('db_list');
			$data['statement_info'] = $this->db_list->getStatmentInfo($camId,'statement');
			$data['offer_info'] = $this->db_list->getStatmentInfo($camId,'statement_offers');
			$data['body_copy_info'] = $this->db_list->getStatmentInfo($this->uri->segment(2),'stat_content');			
			$this->load->view('statement/view_statement',$data);
			}
		function download_statement(){			
			$camId = $this->uri->segment(2);
			$this->load->model('db_list');
			$data['statement_info'] = $this->db_list->getStatmentInfo($camId,'statement');
			$data['offer_info'] = $this->db_list->getStatmentInfo($camId,'statement_offers');
			$data['body_copy_info'] = $this->db_list->getStatmentInfo($this->uri->segment(2),'stat_content');			
			$this->load->view('statement/download_statement',$data);
			}
		
		function db_backup(){
			$this->load->dbutil();
			$this->load->model('upload');
			$backup =& $this->dbutil->backup(); 
			$this->load->helper('file');
			$DB_name = date("Y-m-d");
			write_file('/var/www/html/staff/e-coder/backup/'.$DB_name.'.zip', $backup);
			$db_location = '/var/www/html/staff/e-coder/backup/'.$DB_name.'.zip';
			$this->upload->uploadDB($db_location,$DB_name);
			unlink($db_location);		
			}
		
		public function reportData(){
				$this->load->model('emailer_insert');				
				$data = json_decode(file_get_contents('php://input'), true);
				foreach ($data as $info){
					$this->emailer_insert->emailReport($data);
				}		
				
				
			}
		
		private function cretaeTable01($data,$i){
			$table = NULL;
			$infos = explode("|",$data);
			$i % 2 == 0 ? $color = '#ffffff' : $color = '#f3f3f3';
			$table = '<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="'.$color.'"><tr></td>';
			foreach ($infos as $info){
				$tableinfo = explode("##",$info);
			$table .='<td width="50%" valign="top" class="stack-column-center" style="padding:0 10px 0 10px;  text-align:left; line-height: 1.5em;" ><table width="100%" cellpadding="0" cellspacing="0" ><tr>
          <td align="center" valign="top" ><img width="100%" border="0" src="http://enews.airmilesme.com/am/img/'.$tableinfo[1].'.jpg" name="Cont_2" alt="Air Miles" class="fluid-20" /></td></tr><tr>
          <td align="center" style="padding:2%" class="mobile_line"><p style="color:#3e3e3e; text-align:left; font-size: 0.8em; line-height:1.5em; font-family:Arial, sans-serif;">'.$tableinfo[0].'</td></tr><tr>
          <td align="center" ><img src="https://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="5" style="display:block; border:none;" /></td>
          </tr></table></td>';
			}
			$table.='</tr></table>';
			return $table;
		}
	
		function cretaeTable02($data){
			$table = NULL;
			$infos = explode("|",$data);
			$tableinfo = explode("##",$infos[0]);
			$table ='<table width="100%" align="left" cellpadding="0" cellspacing="0" class="deviceWidth">
                                        <tr>
                                            <td valign="top" align="left" style="color: #3e3e3e; font-weight: normal; text-align: left; font-family: Arial, Helvetica, sans-serif; line-height: 18px; vertical-align: top; padding:10px 8px 10px 8px" bgcolor="#ffffff">
                                                    <p style="color:#3e3e3e; text-align:left; font-size: 0.9em; line-height:1.2em; font-family:Arial, sans-serif; font-weight:bold;">'.$tableinfo[0].'</p></td>
                                        </tr>
                                        <tr>
                                          <td width="50%" valign="middle" class="stack-column" style="padding: 2% 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #666666; text-align: center;"><img width="100%" border="0" src="http://enews.airmilesme.com/am/img/'.$tableinfo[1].'.jpg" name="Cont_4" alt="Air Miles" class="fluid-20" /></td>
                                        </tr>
                                    </table>';
			return $table;
		}
	
	
	//print one column
	private function multiTable1($data,$i){
			$table = NULL;
			$tableinfo = explode("##",$data);
			$table .='<table width="100%" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td align="center" valign="top" bgcolor="#FFFFFF"><img width="100%" name="Cont_11" src="http://enews.airmilesme.com/am/img/'.$tableinfo[1].'.jpg" alt="" border="0" style="border-radius: 4px; " class="fluid" /></td>
                                    </tr>';
			if ($tableinfo[0] != NULL ){		
            $table .= '<tr>
                                      <td align="center" bgcolor="#FFFFFF" style="padding:2%" class="mobile_line1"><span style="font-family:Arial, sans-serif; font-size:12px;">'.$tableinfo[0].'</span></td>
                                    </tr>';
			}
             $table .='<tr>
                                      <td align="center" bgcolor="#FFFFFF"><img name="Cont_10" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="5" style="display:block; border:none;" alt="" /></td>
                                    </tr>';
			if ($tableinfo[3] != NULL ){							
            $table .= '<tr>
                                      <td align="center" bgcolor="#FFFFFF"><table width="150">
                                        <tbody>
                                          <tr>
                                            <td bgcolor="#009fe3" style="padding:5px 0;background-color:#00ADEF; border-top:1px solid #77d5ea; background-repeat:repeat-x;" align="center" class="stack-column-center"><a href="'.$tableinfo[3].'?utm_source=newsletter&utm_medium=email&utm_campaign=%%camp_title%% - %%date%%" style="color:#ffffff; font-size:12px; text-align:center; text-decoration:none; font-family:Arial, sans-serif; -webkit-text-size-adjust:none;"> Read more </a></td>
                                          </tr>
                                        </tbody>
                                      </table></td>
                                    </tr>';
			}
									
               $table .= '<tr>
                                      <td colspan="2" height="10" style="font-size: 1px; line-height: 1em; mso-line-height-rule: exactly; padding:0;" bgcolor="#FFFFFF"><img name="Cont_10" src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v14/spacer.gif" width="1" height="1" style="display:block; border:none;" alt="" /></td>
                                    </tr>
                                  </tbody>
                                </table>';

			return $table;
		}
	//print two column
	private function multiTable2($data,$i){
			$table = NULL;
			$infos = explode("|",$data);
			$table ='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td valign="top" width="50%" class="stack-column-center" style="padding:0 10px 0 10px; text-align:left;">';
			$i=1;
			foreach ($infos as $info){
				
				$tableinfo = explode("##",$info);
				$table .='<table width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><img width="100%" src="http://enews.airmilesme.com/am/img/'.$tableinfo[1].'.jpg" alt="" border="0" style="border-radius: 4px; " class="fluid" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" bgcolor="#FFFFFF" style="padding:2%" class="mobile_line"><span style="font-family:Arial, sans-serif; font-size:12px;">'.$tableinfo[0].'</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" bgcolor="#FFFFFF"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="5" style="display:block; border:none;" alt="" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" bgcolor="#FFFFFF">
                                                        <table width="150">
                                                            <tbody>
                                                                <tr>
                                                                    <td bgcolor="#009fe3" style="padding:5px 0;background-color:#00ADEF; border-top:1px solid #77d5ea; background-repeat:repeat-x;" align="center" class="stack-column-center"><a href="'.$tableinfo[3].'?utm_source=newsletter&utm_medium=email&utm_campaign=%%camp_title%% - %%date%%" style="color:#ffffff; font-size:12px; text-align:center; text-decoration:none; font-family:Arial, sans-serif; -webkit-text-size-adjust:none;"> Read more </a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" height="10" style="font-size: 1px; line-height: 1em; mso-line-height-rule: exactly; padding:0;" bgcolor="#FFFFFF"><img src="http://enews-templates-bucket.s3.amazonaws.com/airmiles/e_statment_v4/spacer.gif" width="1" height="1" style="display:block; border:none;" alt="" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>';
				if ($i==1){
					$table .='</td><td width="50%" valign="top" class="stack-column-center" style="padding:0 10px 0 10px; text-align:left;">';
				}
				$i++;
			}
			$table .='</td></tr></tbody></table>';
			return $table;
		}
	
	
	private function ooredooB2C($data,$x){
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
	
}

?>
