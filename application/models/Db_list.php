<?php

class db_list extends CI_Model{
	
		private $contenTable = NULL;
	
		function __construct(){
			$this->contenTable = 'content_'.$this->user->get_program();
		}
	
		function getList($per_page,$segment){
			$data = NULL;
			$this->db->order_by('edited', 'desc');
			$this->db->where('deleted', 'n');
			$this->db->where('program', $this->user->get_program());
			$q = $this->db->get('campagins',$per_page,$segment);
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;
		
			}
			
		function getSearchList($search){
			$this->db->order_by('edited', 'desc');
			$this->db->where('deleted', 'n');
			$this->db->where('program', $this->user->get_program());
			$this->db->like('cam_name', $search, 'both');
			$q = $this->db->get('campagins',20);
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			
			return $data;
			}
		}
		
		function getStatmentList($per_page,$segment){
			$this->db->order_by('edited', 'desc');
			$this->db->where('deleted', 'n');
			$q = $this->db->get('statement',$per_page,$segment);
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;
		
			}
			
		function getCamInfo($id,$table,$filter){
			$this->db->limit(1);
			$q = $this->db->get_where($table,array($filter => $id));
			$data = $q->result();
			return $data;		
			}

			
		function getStatmentInfo($id,$table){
			$this->db->limit(1);
			$q = $this->db->get_where($table,array('stat_id' => $id));
			$data = $q->result();
			return $data;		
			}
		
		function getFullInfo($table){
			$q = $this->db->get($table);
			if ($q->num_rows() > 0){
				$data = $q->result();
				return $data;
				}
					
			}
			
		function partnerLogoInfo(){
			$q = $this->db->get_where('partner_logos');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=array('pDesc'=>$row->pDesc,'pCode'=>$row->pCode);
					}
			}
			return $data;		
			}
		
		
		
		function s3BucketImages(){
			$q = $this->db->get_where('partner_logos');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=array('pDesc'=>$row->pDesc,'pCode'=>$row->pCode);
					}
			}
			return $data;		
			}
			
		function getFileList($per_page,$segment){
			$this->db->order_by('updatedOn', 'desc');
			$q = $this->db->get('ext_tnc',$per_page,$segment);
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;
	
		}
		
		function getInfo($id,$table,$filer){
			$this->db->limit(1);
			$q = $this->db->get_where($table,array($filer => $id));
			$data = $q->result();
			return $data;		
			}
		
		function checkUserEmail($email){
			$data = NULL;
			$this->db->where('email', $email);
			$q = $this->db->get('users');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data=$row;
					}
			}
			return $data;
		}
		
		function getUserList($per_page,$segment){
			$this->db->order_by('id', 'desc');
			$q = $this->db->get('users',$per_page,$segment);
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;		
		}
		
		function getTableList($per_page,$segment,$table){
			$this->db->order_by('id', 'desc');
			$q = $this->db->get($table,$per_page,$segment);
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;		
		}
	
		function getFullTableList($table){
			$this->db->order_by('id', 'asc');
			$q = $this->db->get($table);
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;		
		}
		
		function getCampTeplates($program){
			$this->db->order_by('templateName', 'asd');
			$this->db->where('active', 'Y');
			$this->db->where('program', $program);
			$q = $this->db->get('camp_templates');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;		
			}
		function getTemplateConfig($tempName){
			$this->db->where('templateFile', $tempName);
			$q = $this->db->get('camp_templates');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data=$row;
					}
			}
			return $data;		
			}
		
}

?>