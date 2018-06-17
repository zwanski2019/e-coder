<?php

class filter extends CI_Model{
	
		
		
		function textFotmat($body){
				
				$patchedBody = str_replace(array('<td>'),
				array(''), $body);
				
				echo $patchedBody;exit;
							
		}
		
		
}

?>
