<?php  

	// Builds out the nav li's

	function nav() { 
		
		filepaths();
		remove_posts();
		
		foreach ($GLOBALS['filepaths'] as $files) {
			$page_link = preg_replace('#'.$GLOBALS['dropbox_posts_dir'].'/([a-z-]*)_[0-9]*\.md#', '$1', $files);
			$the_file = fopen($files, 'r');
			$page_title = fgets($the_file);
			$page_title = str_replace('# ', '', $page_title);
			echo ('<li><a href="'.$page_link.'">'.$page_title.'</a></li>');
		}
	
	}

?>