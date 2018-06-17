<?php

class System extends CI_Controller {
		var $siteTitel = "E-Cod3r";
		var $siteVersion = "v.2";
		
		function __construct(){
			parent::__construct();
			$this->user->on_invalid_session('/login');
			if($this->user->has_permission('email')) {
				redirect('/addressBook');
			}
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
		
		function addlogo(){
			$this->load->library('pagination');
			$this->load->model('upload');
			$this->load->model('db_list');
			$this->load->model('db_insert');
			$data['error'] = 0;
			if ($this->input->post('upload_logo')){
				$this->form_validation->set_rules('logo_name','Logo Name','required|xss_clean');
				$this->form_validation->set_rules('logo_code','Logo Code','required|is_unique[partner_logos.pCode]|xss_clean');
				$data['error'] = 1;
				if ($this->form_validation->run() === true){					
					$logodata = $_FILES['logo']['tmp_name'];				
					$logo_name = "am/logos/all/".$this->input->post('logo_code').".jpg";
					$this->upload->uploadImage($logodata,$logo_name);
					$db_data[] = $this->input->post(NULL, TRUE);
					$this->db_insert->addLogo($db_data);
					$data['error'] = 0;
				}
			}
			
			$config['base_url'] = base_url().'addlogo';
			$config['total_rows'] = $this->db->get('partner_logos')->num_rows();
			$config['per_page'] = 50;
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
			$data['records'] = $this->db_list->getTableList($config['per_page'],$this->uri->segment(2),'partner_logos');
			$this->load->view('system/addlogo',$data);
			}
			
		
			
			
			
	
}

?>
