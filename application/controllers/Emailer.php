<?php

class Emailer extends CI_Controller {
		var $siteTitel = "E-Cod3r";
		var $siteVersion = "v.2";
		
		function __construct(){
			parent::__construct();
			$this->user->on_invalid_session('/login');
		}
		
		public function addressBook(){
			$data['emailSendMSG'] = "";
			$bookName = $this->input->post('bookName');
			$this->load->model('emailer_list');
			$this->load->model('emailer_send');
			$this->load->model('emailer_insert');
			$ownerName = $this->user->get_name();
			$ownerEmail = $this->user->get_email();
			$ownerId = $this->user->get_Id();
			if ($this->input->post('addAddres')){
			$this->form_validation->set_rules('contactName','name','trim|required');
			$this->form_validation->set_rules('contactEmail','email','trim|required');
			$this->form_validation->set_rules('addressBookId','Select address book','required');
			$this->form_validation->set_rules('contactCompany','trim');
				if ($this->form_validation->run() === true){
					$data[] = $this->input->post(NULL, TRUE);
					$data[0]['owner'] = $ownerName;				
					$this->emailer_insert->addAddress($data);
					redirect(base_url().'addressBook');	
				}
			}
			if ($this->input->post('addBook')){
				$this->form_validation->set_rules('bookName','Book Name','trim|required');
				if ($this->form_validation->run() === true){	
					$data[] = $this->input->post(NULL, TRUE);
					$data[0]['ownerId'] = $ownerId;
					$this->emailer_insert->addAddressBook($data);
					redirect(base_url().'addressBook');	
				}
			}
			
			
			$data['addressBooks'] = $this->emailer_list->getAddressBooks($ownerId);
			if ($bookName==NULL && $data['addressBooks'] != NULL){
				$bookName = $data['addressBooks'][0]->id;
				$data['selectBook']=$bookName;
				}
			$data['selectBook']=$bookName;
			$data['emails'] = $this->emailer_list->getEmails($bookName);
			$this->load->view('email/addressBook',$data);
			
			}
		
		public function emailTemplates(){
			
			$this->load->model('emailer_list');
			$this->load->model('emailer_send');
			$this->load->model('emailer_insert');
			$ownerName = $this->user->get_name();
			$ownerEmail = $this->user->get_email();
			$ownerId = $this->user->get_Id();
			
			$data['templateList'] = $this->emailer_list->getTemplateList();
			
			$this->load->view('email/templates',$data);
			
			}
			
		public function report(){
			$this->load->library('pagination');
			$config['base_url'] = base_url().'report';
			$config['total_rows'] = $this->db->get('emailReport')->num_rows();
			$config['per_page'] = 30;
			$config['num_links'] = 2;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->load->model('emailer_list');
			$data['records'] = $this->emailer_list->getReport($config['per_page'],$this->uri->segment(2));
			$this->load->view('email/report',$data);
			}
			
		public function edit(){
			if(!empty($this->input->post())){
					foreach($_POST as $field_name => $val)
					{
						//clean post values
						$field_userid = strip_tags(trim($field_name));
						
						$val = strip_tags(trim($val));
						//from the fieldname:user_id we need to get user_id
						$split_data = explode(':', $field_userid);
						$user_id = $split_data[1];
						$field_name = $split_data[0];
						if(!empty($user_id) && !empty($field_name) && !empty($val)){
							$this->load->model('emailer_insert');
							$this->emailer_insert->editAddress($user_id,$field_name,$val);
							echo "Updated";
						} else {
							echo "Invalid Requests";
						}
					}
				} else {
					echo "Invalid Requests";
				}
			}
		
		public function editSubject(){
			if(!empty($this->input->post())){
					foreach($_POST as $field_name => $val)
					{
						//clean post values
						$field_userid = strip_tags(trim($field_name));
						
						$val = strip_tags(trim($val));
						//from the fieldname:user_id we need to get user_id
						$split_data = explode(':', $field_userid);
						$user_id = $split_data[1];
						$field_name = $split_data[0];
						if(!empty($user_id) && !empty($field_name) && !empty($val)){
							$this->load->model('emailer_insert');
							$this->emailer_insert->editSubject($user_id,$field_name,$val);
							echo "Updated";
						} else {
							echo "Invalid Requests";
						}
					}
				} else {
					echo "Invalid Requests";
				}
			}
		
		public function sendMail(){
			
			$data['emailSendMSG'] = $this->uri->segment(2);
			$this->load->model('emailer_list');
			$this->load->model('emailer_send');
			$this->load->model('emailer_insert');
			$ownerName = $this->user->get_name();
			$ownerEmail = $this->user->get_email();
			$ownerId = $this->user->get_Id();
			
			if ($this->input->post('emailTriger')){
				$actCode = $this->input->post('secutyCode');
				$campData = $this->emailer_list->validateCode($actCode,$ownerId);
				if ($campData){
					$emails = $this->emailer_list->getEmailsForCamp($campData->addressBookId);
					$templateData = $this->emailer_list->getTemplateData($campData->templateId);					
					foreach ($emails as $emails_info){
						$this->emailer_send->sendCampagin($emails_info,$ownerName,$ownerEmail,$templateData);
						}
					$data['emailSendMSG'] =  "All sent";
					$this->emailer_insert->removeActiveCode($actCode);
					redirect(base_url().'sendMail/sent');	
				}				
				else {
					$data['emailSendMSG'] =  "Invalid Code";
					}
			}
				
			if ($this->input->post('sendTest')){
				$this->form_validation->set_rules('templateId','Template Name','required');
				if ($this->form_validation->run() === true){
						$templateID = $this->input->post('templateId');
						$templateData = $this->emailer_list->getTemplateData($templateID);
						$this->emailer_send->sendTest($ownerName,$ownerEmail,$templateData);
				}
			}
				
			if ($this->input->post('sendActivation')){
				$this->form_validation->set_rules('templateId','Template Name','required');
				$this->form_validation->set_rules('addressBookId','Book Name','required');
				if ($this->form_validation->run() === true){
						$actCode = substr(str_shuffle("123456789ABCDEFGHJKLMNPQRSTUVWXYZ"), 0, 10);
						$this->load->model('emailer_insert');
						$data[] = $this->input->post(NULL, TRUE);
						$data[0]['actCode'] = $actCode;
						$data[0]['ownerId'] = $ownerId;
						$this->emailer_insert->createActiveCode($data);
						$this->load->model('emailer_send');
						$mailCount = $this->emailer_list->getEmailCount($this->input->post('addressBookId'));
						$this->emailer_send->sendActivation($ownerEmail,$actCode,$mailCount);
						$data['emailSendMSG'] =  "Activation Code Sent";
					}
			}
			
			
			$data['addressBooks'] = $this->emailer_list->getAddressBooks($ownerId);
			$data['template'] = $this->emailer_list->getTemplateList();
			$this->load->view('email/sendMail',$data);
			}
			
			
			public function validateCode(){
				if(!empty($this->input->post())){
					$this->load->model('emailer_list');
					$ownerId = $this->user->get_Id();
					$actCode = $this->input->post('secutyCode');
					$campData = $this->emailer_list->validateCode($actCode,$ownerId);
					if ($campData){							
							$addressBooksName = $this->emailer_list->getAddressBooksName($campData->addressBookId);
							$templateData = $this->emailer_list->getTemplateData($campData->templateId);
							echo "<p>Email Template Name : ".$templateData->templateName."</p>";
							echo "<p>Address Book : ".$addressBooksName->bookName."</p>";
								
					}
					else {
							echo "Invalid Requests";
					}
				} 
				else {
						echo "Invalid Requests";
				}
			}
			
			public function test(){
				$this->load->view('email/loading');
				
				}

}