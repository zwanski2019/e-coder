<?php

class emailer_list extends CI_Model{
	
		function getAddressBooks($ownerId){
			$this->db->order_by('bookName', 'ASC');
			$this->db->where('ownerId', $ownerId);
			$q = $this->db->get('address_books');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
				return $data;	
			}
				
		}
		
		function getAddressBooksName($addressBookId){
			$this->db->where('id', $addressBookId);
			$q = $this->db->get('address_books');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data=$row;
					}
			}
			return $data;
		
			}
	
		function getEmails($addressBookId){
			$this->db->order_by('contactName', 'ASC');
			$this->db->where('addressBookId', $addressBookId);
			$q = $this->db->get('address_contacts');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
				return $data;	
			}
				
		}
		
		function getEmailsForCamp($addressBookId){
			$this->db->where('active', 'Y');
			$this->db->where('addressBookId', $addressBookId);
			$q = $this->db->get('address_contacts');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
				return $data;	
			}
				
		}
		
		
		function getTemplateList(){
			//$this->db->order_by('templateName', 'ASC');
			$q = $this->db->get('emailer_templates');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;
		
			}
		
		function getTemplateData($templateID){
			$this->db->where('id', $templateID);
			$q = $this->db->get('emailer_templates');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data=$row;
					}
			}
			return $data;
		
			}
		
		function validateCode($key,$ownerId){
			$this->db->limit(1);
			$this->db->where(array('actCode' => $key, 'ownerId' => $ownerId, 'active' => 'Y'));
			$q = $this->db->get('activationcode');
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data=$row;
					}
			
			return $data;
			}
		
		}	
		
		function getEmailCount($addressBookId){
			$this->db->where('id', $addressBookId);
			$this->db->where('active', 'Y');
			$q = $this->db->count_all_results('address_books');
			return $q;
		
		}
		
		function getReport($per_page,$segment){
			$this->db->order_by('timeStamp', 'desc');
			$q = $this->db->get('emailReport',$per_page,$segment);
			if ($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[]=$row;
					}
			}
			return $data;
		
			}
}
			
?>