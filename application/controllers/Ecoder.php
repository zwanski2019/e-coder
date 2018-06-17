<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecoder extends CI_Controller {
		var $siteTitel = "E-Cod3r";
		var $siteVersion = "v.2";
		
		function __construct(){
			parent::__construct();
			$this->user->on_invalid_session('/login');
			if($this->user->has_permission('email')) {
				redirect('/addressBook');
			}
			$this->load->model('db_insert');
			$this->load->model('db_list');
			$this->load->model('uploadimg');
			
		}
		
		function index(){
			$this->load->model('constants');
			$this->constants->setSession($this->user->get_program());
			if ($this->user->user_data->active == 2){
				redirect('profile');
				}
			if ($this->user->user_data->active == 3){
				redirect('/login/logout');
				}
			
			$this->load->view('home');
			}
		
					
		function html_list(){
			$this->load->library('pagination');
			$config['base_url'] = base_url().'html_list';
			$config['total_rows'] = $this->db->where(['program'=>$this->user->get_program()])->get('campagins')->num_rows();
			$config['per_page'] = 15;
			$config['num_links'] = 2;
			$config['uri_segment'] = 2;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
			$this->pagination->initialize($config);
			$this->load->model('db_list');
			$data['records'] = $this->db_list->getList($config['per_page'],$this->uri->segment(2));
			
			$this->load->view('campagins/html_list',$data);
			
			}
		
		function html_search(){
			$searchInfo = $this->input->post('search');
			$this->load->model('db_list');
			$data['records'] = $this->db_list->getSearchList($searchInfo);
			$this->load->view('campagins/html_search',$data);
			}
			
		function statment_list(){
			$this->load->library('pagination');
			$config['base_url'] = base_url().'statment_list';
			$config['total_rows'] = $this->db->get('statement')->num_rows();
			$config['per_page'] = 15;
			$config['num_links'] = 2;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->load->model('db_list');
			$data['records'] = $this->db_list->getStatmentList($config['per_page'],$this->uri->segment(2));
			$this->load->view('statement/statment_list',$data);
			}
			
	
		
		function deleteCamp(){
			$this->load->model('db_insert');
			$camId = $this->uri->segment(2);
			$this->db_insert->deleteCamp($camId);
			redirect (base_url().'html_list/');
			}
		
		function deleteStatement(){
			$this->load->model('db_insert');
			$stat_id = $this->uri->segment(2);
			$this->db_insert->deleteStatement($stat_id);
			redirect (base_url().'statment_list/');
			}
		
		function lockCamp(){
			$this->load->model('db_insert');
			$camId = $this->uri->segment(2);
			$opt = $this->uri->segment(3);
			$this->db_insert->lockCamp($camId,$opt);
			redirect (base_url().'template/'.$camId);
			}
		
		function lockStatement(){
			$this->load->model('db_insert');
			$stat_id = $this->uri->segment(2);
			$opt = $this->uri->segment(3);
			$this->db_insert->lockStatement($stat_id,$opt);
			redirect (base_url().'update_statement/'.$stat_id);
			}
	
		
		function getPartnerLogo(){ 
			$this->load->model('db_list');
			$data = $this->db_list->partnerLogoInfo();
			$input = trim($this->input->get('input'));
			$len = strlen($input);
			$limit = 6;	
			$aResults = array();
			$count = 0;
			if ($len){
				for ($i=0;$i<count($data);$i++){
					if (strtolower(substr(utf8_decode($data[$i]['pDesc']),0,$len)) == $input){
						$count++;
						$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($data[$i]['pDesc']), "info"=>htmlspecialchars($data[$i]['pCode']) );
					}
					
					if ($limit && $count==$limit)
						break;
				}
			}
			
			header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
			header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
			header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
			header ("Pragma: no-cache"); // HTTP/1.0
			header ("Content-Type: application/json");
			
				echo "{\"results\": [";
				$arr = array();
				for ($i=0;$i<count($aResults);$i++)
				{
					$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\", \"info\": \"".$aResults[$i]['info']."\"}";
				}
				echo implode(", ", $arr);
				echo "]}";
			}
			
			
			
			function create_camp(){			
			$this->load->model('db_insert');
			$this->load->model('db_list');
			$this->load->model('uploadimg');
			if ($this->input->post('create')){
				$this->form_validation->set_rules('cam_theme','cam_theme','trim|required');
				$this->form_validation->set_rules('cam_name','cam_name','trim|required|xss_clean');
				if ($this->form_validation->run() === true){
					$data[] = $this->input->post(NULL, TRUE);
					$data[0]['program'] = $this->user->get_program();
					$camId = $this->db_insert->addCampagin($data);
					$data[0]['content_id'] = $camId;
					$this->db_insert->addNewHTML($camId);				
					redirect('template/'.$camId);
				}
			}
			
			$data['templates'] = $this->db_list->getCampTeplates($this->user->get_program());
			$this->load->view('campagins/create_camp',$data);
			}
			
			
			function create_statement(){
				$data['stat_name']="";
				$data['country']="";
				$data['stat_offers']="";
				$this->load->model('db_insert');
				$this->load->model('uploadimg');
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('stat_name','Statement name','trim|required|xss_clean');
				if ($this->form_validation->run() === true){
					$data = $this->input->post(NULL, TRUE);
				}
				
				if ($this->input->post('create')){
					$this->form_validation->set_rules('stat_name','Statement name','trim|required|xss_clean');
					if ($this->form_validation->run() === true){
					$data = $this->input->post(NULL, TRUE);
					for ($x=1; $x<=$data['stat_offers']; $x++) {				
						$data['offer'.$x] = $data['logo_'.$x]."|".$data['offertext_'.$x]."|".$data['url_'.$x]."|".$data['stamp_'.$x];
					}					

					$new_topimage = date("YmdHisz");
					sleep(1);
					$new_banner = date("YmdHisz");
					$data['topImg']=$new_topimage;
					$data['banner']=$new_banner;
					$new_topimage = "am/img/".$new_topimage.".jpg";
					$new_banner = "am/img/".$new_banner.".jpg";
					
					$data1[]=$data;
					$stat_id = $this->db_insert->addstatement($data1);
					$data['stat_id']=$stat_id;
					$data2[]=$data;
					$this->db_insert->addoffers($data2);
					$this->db_insert->addBody($data2);
					
					$topImg = $_FILES['topImg']['tmp_name'];
					$banner = $_FILES['banner']['tmp_name'];												
					$this->uploadimg->uploadImage($topImg,$new_topimage);
					$this->uploadimg->uploadImage($banner,$new_banner);
					
					redirect('update_statement/'.$stat_id);
					}
					
				}
				
				$this->load->view('statement/create_statement',$data);
			}
			
			
			function update_statement(){
				$this->load->model('db_insert');
				$this->load->model('db_list');
				$this->load->model('uploadimg');
			
				if ($this->input->post('update')){
					$data = $this->input->post(NULL, TRUE);
					for ($x=1; $x<=$data['stat_offers']; $x++) {				
						$data['offer'.$x] = $data['logo_'.$x]."|".$data['offertext_'.$x]."|".$data['url_'.$x]."|".$data['stamp_'.$x];
					}					

					$new_topimage = "am/img/".$this->input->post('topImg').".jpg";
					$new_banner = "am/img/".$this->input->post('banner').".jpg";					
					$data1[]=$data;
					$stat_id = $this->db_insert->updateStatement($data1);
					$data['stat_id']=$stat_id;
					$data2[]= $data;
					$this->db_insert->updateOffers($data2);				
					$this->db_insert->updateBody($data2);
					$topImg = $_FILES['topImg']['tmp_name'];
					$banner = $_FILES['banner']['tmp_name'];												
					$this->uploadimg->uploadImage($topImg,$new_topimage);
					$this->uploadimg->uploadImage($banner,$new_banner);
					
					redirect('update_statement/'.$stat_id);

				}
				$data['statement_info'] = $this->db_list->getStatmentInfo($this->uri->segment(2),'statement');
				$data['offer_info'] = $this->db_list->getStatmentInfo($this->uri->segment(2),'statement_offers');
				$data['body_copy_info'] = $this->db_list->getStatmentInfo($this->uri->segment(2),'stat_content');
				$this->load->view('statement/update_statment',$data);
			}
			
			
			
			
			function copy_camp(){
				$cam_id=$this->uri->segment(2);
				$camp_info = $this->db_list->getInfo($cam_id,'campagins','cam_id');
				$html_info = $this->db_list->getInfo($cam_id,'content_'.$this->user->get_program(),'cam_id');
				$images = $this->db_list->getInfo($cam_id,'image_gallary','cam_id');				
				$templatesConfig = $this->db_list->getTemplateConfig($camp_info[0]->cam_theme);
				
				
				$camp_info[0]->cam_name = $camp_info[0]->cam_name."_copy";
				$camp_info = (array)$camp_info[0];
				$camp_info1[] = $camp_info;
				$camp_id = $this->db_insert->addCampagin($camp_info1);
				if ($templatesConfig->mainImage == 'Y'){
					$new_image = date("YmdHisz");
					$this->uploadimg->copyImage($new_image,$images[0]->image01);
					$this->db_insert->updateGallary(0,$new_image);
				}
				$html_info[0]->content_id = $camp_id;
				$html_info[0]->image = $new_image;
				$html_info = (array)$html_info[0];
				$html_info1[] = $html_info;
				$this->db_insert->addHTML($html_info1,$templatesConfig);
				
				redirect(base_url().'template/'.$camp_id);				
				}			
			
			function copy_statement(){
				$cam_id=$this->uri->segment(2);
				$this->load->model('db_insert');
				$this->load->model('db_list');
				$this->load->model('uploadimg');
				$statement_info = $this->db_list->getStatmentInfo($this->uri->segment(2),'statement');
				$offer_info = $this->db_list->getStatmentInfo($this->uri->segment(2),'statement_offers');
				$body_copy_info = $this->db_list->getStatmentInfo($this->uri->segment(2),'stat_content');
				$statement_info[0]->stat_name = $statement_info[0]->stat_name."_copy";
				$topImg = date("YmdHisz");
				sleep(1);
				$banner = date("YmdHisz");
				$this->uploadimg->copyImage($topImg,$statement_info[0]->topImg);
				$this->uploadimg->copyImage($banner,$statement_info[0]->banner);
				$statement_info[0]->topImg = $topImg;
				$statement_info[0]->banner = $banner;		
				$statement_info = (array)$statement_info[0];
				$statement_info1[] = $statement_info;
				$stat_id = $this->db_insert->addstatement($statement_info1);
				$offer_info[0]->stat_id = $stat_id;
				$offer_info = (array)$offer_info[0];
				$offer_info1[] = $offer_info;
				$body_copy_info[0]->stat_id = $stat_id;
				$body_copy_info = (array)$body_copy_info[0];
				$body_copy_info1[] = $body_copy_info;
				$this->db_insert->addoffers($offer_info1);
				$this->db_insert->addBody($body_copy_info1);
				redirect(base_url().'update_statement/'.$stat_id);				
				}

			function testemail(){
				$this->load->model('send');
				$this->send->testemail('chakycool@gmail.com');
			}
			
			
	
}

?>
