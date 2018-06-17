<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Constants {
	
	public function setSession($program){
		$CI = get_instance();
		switch ($program){
			case 'ooredoo':
				$countries = array("Qatar" => "qa");
				$emailClient = array("Campaign commander" => "cc");
				$data = array ("s3Bucket" => "ooredoo",
							   "s3ImagePath" => "business-news/img/",
							  	"imagePath"=>"https://ooredoo.s3.amazonaws.com/business-news/img/",
							  "countries"=> $countries,
							  "emailClient"=> $emailClient);
				$CI->session->set_userdata($data);
			break;
			case 'airmiles':
				$countries = array("UAE" => "ae","Qatar" => "qa","Bahrain" => "bh");
				$emailClient = array("Silver Pop" => "sp","Campaign commander" => "cc");
				$data = array ("s3Bucket" => "enews.airmilesme.com",
							   "s3ImagePath" => "am/img/",
							   "imagePath"=>"http://enews.airmilesme.com/am/img/",
							   "countries"=> $countries,
							   "emailClient"=> $emailClient);
				$CI->session->set_userdata($data);
			break;
			}
		
	}
	

}


?>