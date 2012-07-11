<?php 
	include_once('config.php'); 
	
	if (!file_exists('cache/caches/site_root.html')) {
		ob_start();
			include_once('site_root.php');
		ob_end_clean();
	}
	
	if ($GLOBALS['use_cache'] == true) {
		include_once('cache/begin_caching.php');
	} 
	
	
	
	if (is_numeric($_SERVER['QUERY_STRING'])) {
		include_once('themes/'.$theme.'/top.php');
		more_posts();
	} elseif ($_SERVER['QUERY_STRING']) {

		ob_start();
			single_post();
			$guts = ob_get_contents();
		ob_end_clean();
		
		include_once('themes/'.$theme.'/top.php');
		
		echo $guts;	
		
		if($_SERVER['QUERY_STRING'] == 'archive') {
			include_once('archive.php');
		}

	} else {
		include_once('themes/'.$theme.'/top.php');
		main_page();
	}
	
	include_once('themes/'.$theme.'/bottom.php');
	
	if ($GLOBALS['use_cache'] == true) {
		include_once('cache/end_caching.php');
	}
?>