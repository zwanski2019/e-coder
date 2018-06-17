<?php

class send extends CI_Model{
	
		
		function resetPass($email){
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
				$this->email->from('no-reply@auto.airmilesme.com', 'E-coder');
				$this->email->to($email);
				$this->email->subject('Password Reset');
				$this->email->message('Password rest to "password"');	
				$this->email->send();				
		}
		
		function sampleEmail($email,$html){
				$this->load->library('email');
				$this->load->model('db_list');
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
				
				$this->email->from('no-reply@auto.airmilesme.com', 'E-coder');
				$this->email->to($email);
				$this->email->subject('Sample Email');
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
