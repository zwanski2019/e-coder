<?php
class Automailer extends CI_Controller {
	
	public function checkEmail(){
		$email = trim($this->input->get('email'));
		$this->load->model('db_list');
		$info = $this->db_list->checkUserEmail($email);
		if ($info == NULL){
			echo "Invalid Email";
			}
		else {
			$this->user->reset_pw('password',$info->id);
			$this->load->model('send');
			$this->send->resetPass($info->email);
			echo "Password reset information is emailed";
			}
		}
	
	//function sampleEmail(){
//		$template = trim($this->input->get('template'));
//		$email = trim($this->input->get('email'));
//		$camId = trim($this->input->get('camId'));
//		if ($email == NULL){
//			echo "Invalid Email";
//			}
//		else {
//			
//			$this->load->model('send');
//			
//			$this->send->sampleEmail($email,$camId,$template);
//			echo "Sample email send!";
//			}
//		}
		

	
}
?>
