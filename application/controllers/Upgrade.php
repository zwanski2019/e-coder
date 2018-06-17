<?php

class Upgrade extends CI_Controller {

function __construct(){
			parent::__construct();
			$this->user->on_invalid_session('/login');
			if($this->user->has_permission('email')) {
				redirect('/addressBook');
			}
		}


/// move image data
function movedata(){
				$this->db->order_by('cam_id', 'ASC');
				$q = $this->db->get('content');
				if ($q->num_rows() > 0){
					foreach ($q->result() as $row){
						$update = array('camp_id'=> $row->cam_id,'camp_type'=>'emailCamp', 'image01'=> $row->image);
						$this->db->insert('image_gallary',$update);
						}
				}
				
			}
/// move camp data
	
	function copyData(){
				$this->db->order_by('cam_id', 'ASC');
				$q = $this->db->get('content');
				if ($q->num_rows() > 0){
					foreach ($q->result() as $row){
						$update = array('cam_id'=> $row->cam_id,'adds'=>'Y', 'partners'=> 'Y');
						$this->db->insert('template_config',$update);
						}
				}
				
			}
		
}

?>