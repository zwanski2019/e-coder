<?php

class emailer_send extends CI_Model{
	
		
		function sendCampagin($emails_info,$ownrname,$ownremail,$templateData){
				$this->load->library('email');
				$this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'shakila',
				  'smtp_pass' => 'nokiaN95',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n",
				  'mailtype' => 'html'
				));
				$html = file_get_contents(base_url()."templates/".$templateData->templateFile.".html", true);
				$html = str_replace(array('%%FULLNAME%%'), array($emails_info->contactName), $html);
				$this->email->from($ownremail, $ownrname);
				$this->email->to($emails_info->contactEmail);
				$this->email->subject($templateData->subject);
				$this->email->message($html);	
				$this->email->send();				
		}
		
		
		function sendTest($ownrname,$ownremail,$templateData){
				$this->load->library('email');
				//$this->email->set_header('category',$templateData->templateFile);
				$this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'shakila',
				  'smtp_pass' => 'nokiaN95',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n",
				  'mailtype' => 'html'
				));
				$html = file_get_contents(base_url()."templates/".$templateData->templateFile.".html", true);
				$html = str_replace(array('%%FULLNAME%%'), array($ownrname), $html);
				$this->email->from('test@airmilesme.com', 'Test Mail');
				$this->email->to($ownremail);
				$this->email->subject($templateData->subject);
				$this->email->message($html);	
				$this->email->send();				
		}
		
		function sendActivation($ownremail,$actCode,$mailCount){
				$this->load->library('email');
				$this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'shakila',
				  'smtp_pass' => 'nokiaN95',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n",
				  'mailtype' => 'html'
				));
				//$html = file_get_contents(base_url()."templates/".$template.".html", true);
				//$html = str_replace(array('%%FULLNAME%%'), array($ownrname), $html);
				$html = "<p>Activation Code : ".$actCode."</p><p>Selected Email Count : ".$mailCount."</p>";
				$this->email->from('e-coder@airmilesme.com', 'Activation Mail');
				$this->email->to($ownremail);
				$this->email->subject('Activation Mail');
				$this->email->message($html);	
				$this->email->send();				
		}
		
		
		function testemail(){
				$this->load->library('email');
				$this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'shakila',
				  'smtp_pass' => 'nokiaN95',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n",
				  'mailtype' => 'html'
				));
				$this->email->from('no-reply@auto.airmilesme.com', 'Air Miles');
				$this->email->to('shakila@airmilesme.com');
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('chaycool@gmail.com');
				$this->email->subject('Welcome - Test Email');
				$this->email->message('Test email body');	
				$this->email->send();
				
				echo $this->email->print_debugger();				
				
				}
}

?>
