<?php 
include_once ('cache/begin_caching_scrape.php');
	
	include_once ('config.php');
		
	$html = file_get_html($GLOBALS['dropbox_posts_page']);
	
	echo ('<!doctype html><html><head><title></title></head><body>');
	
	$links = array();
	
	foreach($html->find('.filename-link') as $element) {
		$md = $element->href;
		$md = preg_replace('#.*/#', '', $md);
		
		// echo('<a class="filename-link" href="'.$GLOBALS['dropbox_posts_dir'].'/'.$md.'">'.$GLOBALS['dropbox_posts_dir'].'/'.$md.'</a><br />');
		
		array_push($links,'<a class="filename-link" href="'.$GLOBALS['dropbox_posts_dir'].'/'.$md.'">'.$GLOBALS['dropbox_posts_dir'].'/'.$md.'</a><br />');
		
	}
	
	$links = array_unique($links);
	
	// print_r($links);
	
	foreach($links as $link) {
		echo $link;
	}
	
	echo ('</body></html>');

include_once ('cache/end_caching.php'); 
?>