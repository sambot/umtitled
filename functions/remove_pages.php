<?php  

	function remove_pages() {
	
		global $filepaths;
	
		$filepaths = $GLOBALS['filepaths'];
		$loop_count = 0;
	
		foreach ($filepaths as $file) {
			$this_file = str_replace($GLOBALS['dropbox_posts_dir'].'/', '', $file);
			$this_file = substr($this_file, 0, 1);
			if (ctype_alpha($this_file)) {
				unset($filepaths[$loop_count]);
			}
			$loop_count++;
		}
		
		$filepaths = array_values($filepaths); // resets array keys after page cleanse

	}
?>