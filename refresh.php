<?php

	include_once('config.php');

	$site_root = get_site_root();
	echo('<p><a href="'.$site_root.'">Take me home &rarr;</a></p>');
	
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
		
		echo('<hr />Rebuild: <br />&nbsp;<br />');
		
		include_once('scraped.php');
    
	} else { 
		echo 'Nice try, chump.';
	}	

?>