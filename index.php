<?php 
	include_once('config.php'); 
	include_once('themes/'.$theme.'/top.php');
	
	if (is_numeric($_SERVER['QUERY_STRING'])) {
		more_posts();
	} elseif ($_SERVER['QUERY_STRING']) {
		single_post();
	} else {
		main_page();
	}
	
	include_once('themes/'.$theme.'/bottom.php');
?>