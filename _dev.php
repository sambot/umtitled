<?php  

function current_url() {
	$current_url = 'http';
	
	if ($_SERVER['HTTPS'] == 'on') {
		$current_url .= 's';
	}
 	
 	$current_url .= '://';
 	$site_root = $current_url;
 	
 	if ($_SERVER["SERVER_PORT"] != '80') {
	 	$site_root .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
  		$current_url .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	} else {
	 	$site_root .= $_SERVER['SERVER_NAME'];
  		$current_url .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
 	}
 	
 	echo 'site root: '.$site_root.'<br />';
 	echo $current_url;
 	
}

?>