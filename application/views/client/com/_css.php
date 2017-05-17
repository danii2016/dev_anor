<?php 
	if(isset($Styles)){
		foreach ($Styles as $css) {
			echo "<link rel='stylesheet' href='".base_url("assets/css/".$css)."' type='text/css' />\n";		
		}	
	} 
?>