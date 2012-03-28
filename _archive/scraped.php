<?php 

	include_once('config.php'); 
	
	$html = file_get_html($GLOBALS['dropbox_posts_page']);
	
	echo $html;

?>