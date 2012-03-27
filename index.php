<?php 
	include_once('config.php'); 
	
	if ($GLOBALS['use_cache'] == true) {
		include_once('cache/begin_caching.php');
	} 
	
	include_once('themes/'.$theme.'/top.php');
	
	if (is_numeric($_SERVER['QUERY_STRING'])) {
		more_posts();
	} elseif (ctype_alpha($_SERVER['QUERY_STRING'])) {
		page(); //this isn't going to work unless pages don't have any - in them.
	} elseif ($_SERVER['QUERY_STRING']) {
		single_post();
	} else {
		main_page();
	}
	
	include_once('themes/'.$theme.'/bottom.php');
	
	if ($GLOBALS['use_cache'] == true) {
		include_once('cache/end_caching.php');
	}
?>