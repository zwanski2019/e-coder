<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emailer_insert extends CI_Model{		

		function addAddressBook($data){
			extract($data[0], EXTR_PREFIX_SAME, "wddx");
			$update = array ("ownerId" => $ownerId, 
							"bookName" => $bookName,
							"active" => "Y"
							);
							
			$this->db->insert('address_books',$update);
		}
		
		function addAddress($data){
			extract($data[0], EXTR_PREFIX_SAME, "wddx");
			$update = array ("addressBookId" => $addressBookId, 
							"owner" => $owner,
							"contactName" => $contactName,
							"contactEmail" => $contactEmail,
							"contactCompany" => $contactCompany,
							"active" => "Y"
							);
			$this->db->insert('address_contacts',$update);
		}
		
		function editAddress($user_id,$field_name,$val){
			$this->db->where('id', $user_id);
			$update = array($field_name => $val);		
			$this->db->update('address_contacts',$update);
			}
		
		function editSubject($user_id,$field_name,$val){
			$this->db->where('id', $user_id);
			$update = array($field_name => $val);		
			$this->db->update('emailer_templates',$update);
			}
		
		function createActiveCode($data){
			extract($data[0], EXTR_PREFIX_SAME, "wddx");
			$update = array('ownerId' => $ownerId,'templateId' => $templateId,'addressBookId' => $addressBookId, 'actCode' => $actCode, 'active' => 'Y' );		
			$this->db->insert('activationcode',$update);
			}
		
		function removeActiveCode($actCode){
			$this->db->where('actCode', $actCode);
			$update = array('active' => 'N' );		
			$this->db->update('activationcode',$update);
			}
		
		function emailReport($data){
			extract($data[0], EXTR_PREFIX_SAME, "wddx");
			$update = array('email' => $email,'status' => $event,'originalTime' => $timestamp);		
			$this->db->insert('emailReport',$update);
			}
}
?>