<?php

class UploadImg extends CI_Model{
	
	
	public function __construct(){
		$this->load->library('s3');
	}

	function getExtension($str) {
		 $i = strrpos($str,".");
		 if (!$i) { return ""; }
		 $l = strlen($str) - $i;
		 $ext = substr($str,$i+1,$l);
		 return $ext;
	}
	
	function uploadImage($fileTempName,$imge_name){		
		$this->s3->putObjectFile($fileTempName, $_SESSION['s3Bucket'], $imge_name, S3::ACL_PUBLIC_READ);
		}
	
	function copyImage($new_image,$imge_name){
		$new_image = $_SESSION['s3ImagePath'].$new_image.".jpg";
		$imge_name = $_SESSION['s3ImagePath'].$imge_name.".jpg";
		$this->s3->copyObject($_SESSION['s3Bucket'], $imge_name, $_SESSION['s3Bucket'], $new_image, S3::ACL_PUBLIC_READ);
		}
	
	function uploadHTML($html,$html_name){
		$this->s3->putObject($html, $_SESSION['s3Bucket'], $html_name, S3::ACL_PUBLIC_READ, array(), array('Content-Type' => 'text/html'));
		}
	
	function uploadDB($db_location,$DB_name){
		$DB_name = "db_bakup/e-coder/".$DB_name.".zip";
		$this->s3->putObjectFile($db_location,$_SESSION['s3Bucket'], $DB_name, S3::ACL_PRIVATE);
		}
	
}
?>