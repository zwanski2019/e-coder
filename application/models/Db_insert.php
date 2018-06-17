<?php

class Db_insert extends CI_Model{
	
		private $contenTable = NULL;
	
		function __construct(){
			parent::__construct();
			$this->contenTable = 'content_'.$this->user->get_program();
		}
	
		function addCampagin($data){
			$tnc = "";
			$csButton = "";
			$camp_adds = "";
			$user_name=$this->user->get_name();
			foreach (array_filter($data) as $content){
					  extract($content);
				};
			$update = array('cam_name' => $cam_name, 'cam_theme' => $cam_theme, 'country' => $country,'program' => $program,'sysType' => $sysType, 'camp_adds'=> $camp_adds, 'createdBy' => $user_name , 'cam_lock' => 'n', 'deleted' => 'n');		
			$this->db->insert('campagins',$update);
			return $this->db->insert_id();
			}
			
		function addstatement($data){
			$user_name=$this->user->get_name();
			foreach (array_filter($data) as $content){
					   if($content) extract($content);
				};			
			$update = array('stat_name' => $stat_name, 'stat_offers' => $stat_offers, 'country' => $country, 
			'topImg'=>$topImg, 'banner' => $banner, 'bannerURL'=> $bannerURL, 'createdBy' => $user_name , 'cam_lock' => 'n', 'deleted' => 'n');		
			$this->db->insert('statement',$update);
			return $this->db->insert_id();
			}
		
		function updateStatement($data){
			$user_name=$this->user->get_name();
			foreach (array_filter($data) as $content){
					   if($content) extract($content);
				};			
			$update = array('stat_name' => $stat_name, 'stat_offers' => $stat_offers, 'country' => $country, 
			'topImg'=>$topImg, 'banner' => $banner, 'bannerURL'=> $bannerURL, 'createdBy' => $user_name , 'cam_lock' => 'n', 'deleted' => 'n');		
			$this->db->where('stat_id', $stat_id);
			$this->db->update('statement',$update);
			return $stat_id;
			}
		
		function addBody($data){
			foreach (array_filter($data) as $content){
					   if($content) extract($content);
				};			
			$update = array('stat_id' => $stat_id, 'body' => $body);		
			$this->db->insert('stat_content',$update);
			}
			
		function updateBody($data){
			foreach (array_filter($data) as $content){
					   if($content) extract($content);
				};			
			$update = array('body' => $body);
			$this->db->where('stat_id', $stat_id);		
			$this->db->update('stat_content',$update);
			}
		
		function addoffers($data){
			$offer1="";$offer2="";$offer3="";$offer4="";
			foreach (array_filter($data) as $content){
					   if($content) extract($content);
				};			
			$update = array('stat_id' => $stat_id, 'offer1' => $offer1, 'offer2' => $offer2,'offer3'=>$offer3, 'offer4' => $offer4);		
			$this->db->insert('statement_offers',$update);
			}
			
		function updateOffers($data){
			$offer1="";$offer2="";$offer3="";$offer4="";
			foreach (array_filter($data) as $content){
					   if($content) extract($content);
				};			
			$update = array('offer1' => $offer1, 'offer2' => $offer2,'offer3'=>$offer3, 'offer4' => $offer4);
			$this->db->where('stat_id', $stat_id);		
			$this->db->update('statement_offers',$update);
			}
			
		function addHTML($data,$configs){
			foreach (array_filter($data) as $content){
					  extract($content);
				};
			if ($configs->partners == 'Y'){
			$update = array('cam_id'=>$content_id,'body' => str_replace('&nbsp;',' ',$body), 'offers' => $offers,
			'partner1' => $partner1, 'partner2'=> $partner2, 
			'partner3' => $partner3 , 'partner4' => $partner4, 'partner5' => $partner5, 'partner6' => $partner6, 'partner7' => $partner7, 'partner8' => $partner8);
				$tempConfig = array('cam_id'=>$content_id,'adds'=>'Y','partners'=>'Y');
				$this->db->insert('template_config',$tempConfig);
			}
			else{
				$update = array('cam_id'=>$content_id,'body' => str_replace('&nbsp;',' ',$body), 'offers' => $offers);
				$tempConfig = array('cam_id'=>$content_id,'adds'=>'N','partners'=>'N');
				$this->db->insert('template_config',$tempConfig);
			}
			$this->db->insert($this->contenTable,$update);
			
			
		}
		
		function addNewHTML($data){			
			$update = array('cam_id'=>$data);			
			$this->db->insert($this->contenTable,$update);
			// add configs
			if ($this->user->get_program()== 'airmiles'){
			$tempConfig = array('cam_id'=>$data,'adds'=>'Y','partners'=>'Y');
			}
			else {
				$tempConfig = array('cam_id'=>$data,'adds'=>'N','partners'=>'N');				
			}			
			$this->db->insert('template_config',$tempConfig);
		}
		
		function addFileInfo($data){
			$user_name=$this->user->get_name();
			foreach (array_filter($data) as $content){
					  extract($content);
				};
			$add = array('title'=> $title, 'termsandcon' => $externalHTML, 'link' => $link, 'createdBy' => $user_name);			
			$this->db->insert('ext_tnc',$add);
			return $this->db->insert_id();
			}
		
		function updateFileInfo($data){
			$user_name=$this->user->get_name();
			foreach (array_filter($data) as $content){
					  extract($content);
				};		
			$update = array('title'=> $title, 'termsandcon' => $externalHTML, 'createdBy' => $user_name);			
			$this->db->where('tnc_id', $tnc_id);
			$this->db->update('ext_tnc',$update);
			return $tnc_id;
			}
			
		function deleteCamp($camId){
			$update = array('deleted'=> 'y');			
			$this->db->where('cam_id', $camId);
			$this->db->update('campagins',$update);
			}
		
		function lockCamp($camId,$opt){
			$update = array('cam_lock'=> $opt);			
			$this->db->where('cam_id', $camId);
			$this->db->update('campagins',$update);
			}
		
		function deleteStatement($stat_id){
			$update = array('deleted'=> 'y');			
			$this->db->where('stat_id', $stat_id);
			$this->db->update('statement',$update);
			}
		
		function lockStatement($stat_id,$opt){
			$update = array('cam_lock'=> $opt);			
			$this->db->where('stat_id', $stat_id);
			$this->db->update('statement',$update);
			}
		
		function updateHTML($data){
			$user_name = $this->user->get_name();
			foreach (array_filter($data) as $content){
					  extract($content);
				};
			
			$update = $this->create_dataFile($data);
			
			//print_r($update);
			//exit;
			$this->db->where('cam_id', $content_id);
			$this->db->update($this->contenTable,$update);
			$cam_update = array('createdBy'=>$user_name, 'camp_adds' => $camp_adds);
			$this->db->where('cam_id', $content_id);
			$this->db->update('campagins',$cam_update);
			
			// update configs
			if ($partnerEnable!=NULL){
				$tempConfig = array('partners'=>$partnerEnable);
				$this->db->where('cam_id', $content_id);
				$this->db->update('template_config',$tempConfig);
			}
		}
		
		function create_dataFile($data){
			$body = NULL;
			foreach (array_filter($data) as $content){
					  extract($content);
				};
			if (!isset($offersCount)) { $offersCount=6;}
			
			if ($partnerEnable!=NULL){
			$update = array('body' => str_replace('&nbsp;',' ',$body), 'offersCount' => $offersCount,'offers' => $offers,
			'partner1' => $partner1, 'partner2'=> $partner2, 
			'partner3' => $partner3 , 'partner4' => $partner4, 'partner5' => $partner5, 'partner6' => $partner6, 'partner7' => $partner7, 'partner8' => $partner8);
			return $update;
			}
			else {
				if ($this->user->get_program() == 'ooredoo'){ 
				$update = array('offersCount' => $offersCount,'offers' => $offers, 'addBlock' => $addBlock);
				}
				else{ 
					$update = array('body' => str_replace('&nbsp;',' ',$body), 'offersCount' => $offersCount,'offers' => $offers);
				}
			return $update;
			}
			
		}

		function updateCampagin($data){
			$user_name=$this->user->get_name();
			foreach (array_filter($data) as $content){
					  extract($content);
				};
			$update = array('cam_name'=>$cam_name, 'country'=>$country, 'sysType'=>$sysType, 'createdBy'=>$user_name);
			$this->db->where('cam_id', $content_id);
			$this->db->update('campagins',$update);
			}
		
		function addLogo($data){
			foreach (array_filter($data) as $content){
					   if($content) extract($content);
				};
			$logo_code = strtoupper($logo_code);
			$update = array('pDesc' => $logo_name, 'pCode' => $logo_code);		
			$this->db->insert('partner_logos',$update);
			}
		
		function updateGallary($cam_id,$image01,$image01_link,$image02){
			
			if (!$this->getInfo($cam_id,'image_gallary','cam_id')){
				if ($image02!=NULL){
				$update = array('cam_id' => $cam_id, 'camp_type' => 'emailCamp', 'image01' => $image01,'image01_link' => $image01_link, 'image02' => $image02);	
				}
				else {
					$update = array('cam_id' => $cam_id, 'camp_type' => 'emailCamp', 'image01' => $image01, 'image01_link' => $image01_link);
					}
				$this->db->insert('image_gallary',$update);
				}
			else{
				if ($image02!=NULL){
				$update = array('image01' => $image01,'image01_link' => $image01_link, 'image02' => $image02);	
				}
				else {
					$update = array('image01' => $image01,'image01_link' => $image01_link);	
					}			
				$this->db->where('cam_id', $cam_id);
				$this->db->update('image_gallary',$update);
			}
			}
		
		function getInfo($id,$table,$filer){
			$this->db->limit(1);
			$q = $this->db->get_where($table,array($filer => $id));
			$data = $q->result();
			return $data;		
			}
	
}

?>