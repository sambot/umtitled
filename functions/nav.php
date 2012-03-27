<?php  

	// Builds out the nav li's

	function nav() { 
		
		filepaths();
		remove_posts();
		
		// START HERE
		
		foreach ($GLOBALS['filepaths'] as $files) {
			$page_link = preg_replace('#'.$GLOBALS['dropbox_posts_dir'].'/([a-z-]*)\.md#', '$1', $files);
			echo ('<li><a href="'.$page_link.'">'.$page_link.'</a></li>');
		}
	
	}

?>