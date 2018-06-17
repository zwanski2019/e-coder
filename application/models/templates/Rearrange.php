<?php

class Rearrange extends CI_Model{
	
	function sortData($offerInfo,$count){
		//print_r($offerInfo);exit;
		$newArray = explode("|",$offerInfo);
				foreach ($newArray as $segments) {
						if ($segments != NULL){
							$segment = explode("##",$segments);
							$orderedArray[$segment[4]] = $segment;
				
						}
					}
				//print_r($orderedArray);exit;
				for ($x = 1; $x <= $count; $x++) {
					$indexRest[] = $orderedArray[$x];
				}
				//print_r($indexRest);exit;
				$fullString = NULL;
				$String = NULL;
				foreach ($indexRest as $infos) {
					
						$fullString .=$infos[0].'##'.$infos[1].'##'.$infos[2].'##'.$infos[3].'##'.$infos[4].'##|';
					
					//$fullString .= $fullString.'|'.$String;
				}
		//exit;
				
		//print_r($fullString);exit;
				return $fullString;
		
	}
	
}

?>