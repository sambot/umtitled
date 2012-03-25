<?php

	include_once('config.php');
	
	$cache_url_param = $GLOBALS['cache_url_param'];
	$cache_url_pass = $GLOBALS['cache_url_pass'];

	if ($_GET[$cache_url_param] == $cache_url_pass) {

		// Settings
		$cachedir = 'cache/caches/'; // Directory to cache files in (keep outside web root)
		
		if ($handle = @opendir($cachedir)) {
		    while (false !== ($file = @readdir($handle))) {
		        if ($file != '.' and $file != '..') {
		            echo $file . ' deleted.<br>';
		            @unlink($cachedir . '/' . $file);
		        }
		    }
		    @closedir($handle);
		}
    
	} else { 
		echo 'Nice try, chump.';
	}	

?>