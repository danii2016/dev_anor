<?php 
	if(isset($Scripts)){
		foreach ($Scripts as $js) {
			echo "<script src='".base_url("assets/js/".$js)."' type='text/javascript'></script>\n";		
		}	
	} 
?>

