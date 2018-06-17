<?php

class Tools extends CI_Controller {
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
		
		public function image_list(){
				$this->load->library('s3');
				$bucket = "enews.airmilesme.com";			  
				$images = $this->s3->getBucket($bucket, "am/mail-ex-imge/");
				$images_path = array_shift($images);
				$images  = array_reverse($images);
				$contents['images'] = array_slice($images ,0,60);
				$pdf = $this->s3->getBucket($bucket, "am/mail-ex-pdf/");
				$pdf_path = array_shift($pdf);
				$pdf = array_reverse($pdf);
				$contents['pdfs'] = array_slice($pdf,0,50);
				$this->load->view('tools/image_list',$contents);
			}
			
		public function upload_img(){
				$this->load->model('upload');
				$alert['error']="";
				if ($this->input->post('upload')){
					$filename = stripslashes($_FILES['image']['name']);
					$extension = $this->upload->getExtension($filename);
					$extension = strtolower($extension);
					if ($extension == "jpg" || $extension == "png" || $extension == "pdf") {
						$new_name = date("YmdHisz");
						if ($extension == "pdf") {
							$imge_name = "am/mail-ex-pdf/".str_replace(" ","-",$filename); 
							}
						
						else {
							$imge_name = "am/mail-ex-imge/".$new_name.".".$extension; 
						}
						$fileName = $_FILES['image']['name'];
						$fileTempName = $_FILES['image']['tmp_name'];
						$this->upload->uploadImage($fileTempName,$imge_name);
						$alert['error'] = "Updated";
						}
					else {
						$alert['error'] = 'Only JPG and PNG files allowed!';
					}
				}
				$this->load->view('tools/upload_img',($alert));
			}
			
		
		function create_files(){
				if ($this->input->post('save')){					
					$this->load->model('db_insert');
					$this->load->model('upload');
					$this->form_validation->set_rules('title','title','required|xss_clean');
					$this->form_validation->set_rules('externalHTML','externalHTML','xss_clean');
					if ($this->form_validation->run() === true){
						$data[] = $this->input->post(NULL, TRUE);
						if ($this->input->post('link')==NULL) {
							$new_name = date("YmdHisz");
							$data[0]['link'] = $new_name;
							$tnc_id = $this->db_insert->addFileInfo($data);
						}
						else {
							$new_name = $this->input->post('link');
							$tnc_id = $this->db_insert->updateFileInfo($data);
						}
						
						$html_name = "am/tnc/".$new_name.".html";
						$html = file_get_contents(base_url().'create_online_file/'.$tnc_id);
						$this->upload->uploadHTML($html,$html_name);
					}
				}
				$this->load->library('pagination');
				$config['base_url'] = base_url().'create_files';
				$config['total_rows'] = $this->db->get('ext_tnc')->num_rows();
				$config['per_page'] = 10;
				$config['num_links'] = 2;
				$config['uri_segment'] = 2;
				$this->pagination->initialize($config);
				$this->load->model('db_list');
				$data['records'] = $this->db_list->getFileList($config['per_page'],$this->uri->segment(2));
				$this->load->view('tools/create_files',$data);
			}
			
			
	
}

?>
