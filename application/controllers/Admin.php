<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
		var $siteTitel = "E-Cod3r";
		var $siteVersion = "v.2";
		
		function __construct(){
			parent::__construct();
			$this->user->on_invalid_session('/login');
			
		}
		
		
		function index(){
			if ($this->user->user_data->active == 2){
				redirect('profile');
				}
			if ($this->user->user_data->active == 3){
				redirect('/login/logout');
				}
			$this->load->view('home');
			}
		
		function profile(){
				$data['msg'] ="";
				$data['tab'] = 1;
				if ($this->input->post('create')){
					$this->session->set_flashdata('error_message', 'Fill in all infomation');
					$this->form_validation->set_rules('name','name','required|xss_clean');
					if ($this->form_validation->run() === true){
						$data[] = $this->input->post(NULL, TRUE);
						$fullname = $this->input->post('name');
						$email = $this->input->post('email');
						$login = $this->input->post('username');
						$password = $this->input->post('password');
						$program = $this->input->post('program');
						$active = 2;
						$permissions = $this->input->post('permissions');					
						if ($this->user_manager->save_user($program,$fullname, $login, $password,$email, $active, $permissions)){
							$this->session->set_flashdata('error_message', 'Account created with password as defult.');

						}
					$this->session->set_flashdata('error_message', 'Username already exists');
					$data['tab'] = 3;				
					}				
				}
				if ($this->input->post('update')){
					$old_pw = $this->input->post('old_pw');
					$new_pw = $this->input->post('new_pw');
					if ($this->user->match_password($old_pw)){						
						if ($this->user->update_pw($new_pw)) $data['msg']="Done";				
						}
					else $data['msg']="Failed";
				}
				
				$this->load->library('pagination');
				$config['base_url'] = base_url().'profile';
				$config['total_rows'] = $this->db->get('users')->num_rows();
				$config['per_page'] = 15;
				$config['num_links'] = 2;
				$config['uri_segment'] = 2;
				$this->pagination->initialize($config);
				$this->load->model('db_list');
				$data['records'] = $this->db_list->getUserList($config['per_page'],$this->uri->segment(2));
				$data['permissions'] = $this->db_list->getFullTableList('permissions');
				$this->load->view('admin/profile',($data));
			}
			
			
	
}

?>
