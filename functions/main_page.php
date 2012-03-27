<?php  

	// Builds out the home page

	function main_page() { 
		
		filepaths();
		
		$filepaths = $GLOBALS['filepaths'];
		
		$loop_count = 0;
		
		
		foreach ($filepaths as $file) { // cleans pages from posts
			$this_file = str_replace($GLOBALS['dropbox_posts_dir'].'/', '', $file);
			$this_file = substr($this_file, 0, 1);
			if (ctype_alpha($this_file)) {
				unset($filepaths[$loop_count]);
			}
			$loop_count++;
		}
		
		$filepaths = array_values($filepaths); // resets array keys after page cleanse
			
		$count = $GLOBALS['posts_per_page'] - 1;
		
		for ($i=0; $i<=$count; $i++) {
			title_post($filepaths,$i);
		}
		
		echo('<a href="2">'.$GLOBALS['prev_page_text'].'</a>');
	
	}

?>