<?php  
include_once ('cache/begin_caching_site_root.php');

	include_once('config.php');
	
	current_url();
	
	$site_root = $GLOBALS['current_url'];
	$site_root = str_replace('/site_root.php', '', $site_root);
	$site_root = str_replace('/refresh.php?'.$GLOBALS['cache_url_param'].'='.$GLOBALS['cache_url_pass'], '', $site_root);
	
	echo ($site_root);

include_once ('cache/end_caching.php');
?>