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

		$date_string = substr($post_date, 0, 10);

		$time_string = substr($post_date, 12);
		$time_string = str_replace('-', ':', $time_string);

		$post_date = $date_string.' '.$time_string.':00';

		$post_date = strtotime($post_date);

		$post_date = strftime('%B %e, %Y at %l:%M %p', $post_date);
	
	}

?>