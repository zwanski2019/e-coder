<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {
	var $siteTitel = "E-Cod3r";
		var $siteVersion = "v.2";

		function __construct(){
			parent::__construct();
			
			$this->user->on_invalid_session('/login');
			if($this->user->has_permission('email')) {
				redirect('/addressBook');
			}
			if ($this->user->user_data->active == 2){
				redirect('profile');
				}
			if ($this->user->user_data->active == 3){
				redirect('/login/logout');
				}
			$this->load->model('db_insert');
			$this->load->model('db_list');
			$this->load->model('uploadimg');
			$this->load->model('constants');
			$this->load->model('templates/rearrange');
			$this->constants->setSession($this->user->get_program());
			
			
		}
		
		function index(){
			
			$addCount = NULL;
			$offerInfo = NULL;
			$image01 = NULL; $image02 = NULL; $image01_link=NULL;
			$camId = $this->uri->segment(2);
			$camInfo = $this->db_list->getCamInfo($camId,'campagins','cam_id');
			$templatesConfig = $this->db_list->getTemplateConfig($camInfo[0]->cam_theme);
			
			if ($camId != NULL){
			if ($this->input->post('update')){
				//print_r($this->input->post());exit;
				if ($templatesConfig->mainImage=='Y'){
				if ($this->input->post('image01')==NULL) {
					$image01 = date("YmdHisz");
					$imge_name = $_SESSION['s3ImagePath'].$image01.".jpg";
					$fileName = $_FILES['image01File']['name'];
					$mainImage01 = $_FILES['image01File']['tmp_name'];
					$mainImage01 != NULL ? $this->uploadimg->uploadImage($mainImage01,$imge_name) : '';
					
					}
				else {
					$image01 = $this->input->post('image01');
					$imge_name = $_SESSION['s3ImagePath'].$image01.".jpg";
					$fileName = $_FILES['image01File']['name'];
					$mainImage01 = $_FILES['image01File']['tmp_name'];
					$mainImage01 != NULL ? $this->uploadimg->uploadImage($mainImage01,$imge_name) : '';
					
					}
				
				if ($this->input->post('cam_theme') == 'airmiles/twoColumn') {
					if ($this->input->post('image02')==NULL) {
						$image02 = date("YmdHisz");
						$imge_name = $_SESSION['s3ImagePath'].$image02.".jpg";
						$fileName = $_FILES['image02File']['name'];
						$mainImage02 = $_FILES['image02File']['tmp_name'];
						$mainImage02 != NULL ? $this->uploadimg->uploadImage($mainImage02,$imge_name) : ''; 
					}
					else {
						$image02 = $this->input->post('image02');
						$imge_name = $_SESSION['s3ImagePath'].$image02.".jpg";
						$fileName = $_FILES['image021File']['name'];
						$mainImage02 = $_FILES['image02File']['tmp_name'];
						$mainImage02 != NULL ? $this->uploadimg->uploadImage($mainImage02,$imge_name) : '';
						}
					}
				}
				//$this->form_validation->set_rules('title','title','trim|xss_clean');
				//$this->form_validation->set_rules('body','body');
				//$this->form_validation->set_rules('termsandcon','trim|xss_clean');
				//if ($this->form_validation->run() === true){ 
					//echo $image01;exit;
					if ($this->input->post('camp_add') != NULL){
						foreach ($this->input->post('camp_add') as $add){
							$addCount .= $add.'|';
						}
					}
					
					for ($x=0; $x<=$this->input->post('offersCount'); $x++) {
						if ($this->input->post('offerimage'.$x)!=NULL){
							$fileName = NULL;
							$fileName = $_FILES['offerimage'.$x]['name'];
							$fileTempName = $_FILES['offerimage'.$x]['tmp_name'];
							
							if ($_FILES['offerimage'.$x]['name'] != NULL ){
								$image = date("YmdHisz");
								$imge_name = $_SESSION['s3ImagePath'].$image.".jpg";
								$this->uploadimg->uploadImage($fileTempName,$imge_name); 
							}
							else {
								$image = $this->input->post('offerimage'.$x);
							}
							if ($x!=0) {$spliter='|';} else {$spliter=NULL;}
							$offerInfo .= $spliter.$this->input->post('offertext_'.$x).'##'.$image.'##'.$this->input->post('offersSplit_'.$x).'##'.$this->input->post('readMore_'.$x).'##'.$this->input->post('sortId_'.$x);
						}
						
						else if (isset($_FILES['offerimage'.$x]['tmp_name'])){
						//	else if ($_FILES['offerimage'.$x]['tmp_name'] != NULL){
							sleep(1);
							$image = date("YmdHisz");
							$imge_name = $_SESSION['s3ImagePath'].$image.".jpg";
							$fileName = $_FILES['offerimage'.$x]['name'];
							$fileTempName = $_FILES['offerimage'.$x]['tmp_name'];
							$this->uploadimg->uploadImage($fileTempName,$imge_name);
							if ($x!=0) {$spliter='|';} else {$spliter=NULL;}
							$offerInfo .= $spliter.$this->input->post('offertext_'.$x).'##'.$image.'##'.$this->input->post('offersSplit_'.$x).'##'.$this->input->post('readMore_'.$x).'##'.$this->input->post('sortId_'.$x);
							
							}
						
						}
					
					$offerInfo = $this->rearrange->sortData($offerInfo,$this->input->post('offersCount'));
					//exit;
					//}
					//**** Ooredoo Adds *****
					if ($camInfo[0]->cam_theme == 'b2c_en' || $camInfo[0]->cam_theme == 'b2c_ar') {
						$addInfo = NULL;
					for ($x=0; $x<=1; $x++) {							
							if ($x!=0) {$spliter='|';} else {$spliter=NULL;}
							$addInfo .= $spliter.$this->input->post('addText_'.$x).'##'.$this->input->post('addSplit_'.$x).'##'.$this->input->post('readMore_'.$x);
						}
						
						$data[0]['addBlock'] = $addInfo ;
					}
					
					//echo $image01.'--------'.$image02;exit;
					$this->db_insert->updateGallary($camId,$image01,$this->input->post('image01_link'),$image02);
					$data[] = $this->input->post(NULL, TRUE);
					$data[0]['content_id'] = $camId;
					$data[0]['camp_adds'] = $addCount;
					$data[0]['offers'] = $offerInfo;
					$data[0]['partnerEnable'] = $this->input->post('partnerEnable');
					//print_r($data);exit;
					$this->db_insert->updateHTML($data);
					
					
					redirect('template/'.$camId);
				//}
			}
			
			if ($this->input->post('update_camp')){
				$this->form_validation->set_rules('cam_name','cam_name','required|xss_clean');
				if ($this->form_validation->run() === true){
					$data[] = $this->input->post(NULL, TRUE);
					$data[0]['content_id'] = $camId;
					$this->db_insert->updateCampagin($data);
					redirect('template/'.$camId);
				}
			}

			$data['camps'] = $this->db_list->getCamInfo($camId,'campagins','cam_id');
			$data['htmls'] = $this->db_list->getCamInfo($camId,'content_'.$this->user->get_program(),'cam_id');
			$data['htmlConfig'] = $this->db_list->getCamInfo($camId,'template_config','cam_id');
			$data['images'] = $this->db_list->getInfo($camId,'image_gallary','cam_id');
			$data['camp_adds'] = $this->db_list->getFullInfo('camp_adds');
			$this->load->view('campagins/template',$data);
			}
		}
		
		
	
}

?>
