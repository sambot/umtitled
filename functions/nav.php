<?php  

	// Builds out the nav li's

	function nav() { 
		
		filepaths();
		remove_posts();
		current_url();

		foreach ($GLOBALS['filepaths'] as $files) {
			$page_link = preg_replace('#'.$GLOBALS['dropbox_posts_dir'].'/([a-z-]*)_[0-9]*\.md#', '$1', $files);
			$the_file = fopen($files, 'r');
			$page_title = fgets($the_file);
			$page_title = str_replace('# ', '', $page_title);

			if (strpos($GLOBALS['current_url'], $page_link)) {
				$active_nav = ' class="active_nav"';
			} else {
				$active_nav = '';
			}
			
			echo ('<li><a href="'.$page_link.'"'.$active_nav.'>'.$page_title.'</a></li>');
		}
	
	}

?>