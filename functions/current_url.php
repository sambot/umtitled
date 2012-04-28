<?php  

function current_url() {
	//global $site_root;
	global $current_url;

	$current_url = 'http';
	
	if (!empty($_SERVER['HTTPS'])) {
		$current_url .= 's';
	}
 	
 	$current_url .= '://';
 	//$site_root = $current_url;
 	
 	if ($_SERVER["SERVER_PORT"] != '80') {
	 	//$site_root .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
  		$current_url .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	} else {
	 	//$site_root .= $_SERVER['SERVER_NAME'];
  		$current_url .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
 	}
 	
 	//return $site_root;
 	return $current_url;
 	
}


?>