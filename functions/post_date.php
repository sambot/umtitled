<?php 

	function post_date($filepath) {
		
		global $post_date;
	
		$post_date = $filepath;
		$post_date = str_replace($GLOBALS['dropbox_posts_dir'].'/', '', $post_date);
		
		$post_date = substr($post_date, 0, 16);


		// REMOVED FOR PHP 5.2 COMPATIBILITY
		// $post_date = DateTime::createFromFormat('Y-m-d-H-i', $post_date);
		// $post_date = $post_date->format('F j, Y \a\t g:i a');
		
		// ADDED FOR PHP 5.2 COMPATIBILITY
		$post_date = strtotime($post_date);
		$post_date = strftime('%B %e, %Y at %l:%I %p', $post_date);
	
	}

?>