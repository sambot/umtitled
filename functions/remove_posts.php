<?php  

	function remove_posts() {
	
		global $filepaths;
	
		$filepaths = $GLOBALS['filepaths'];
		$loop_count = 0;
	
		foreach ($filepaths as $file) {
			$this_file = str_replace($GLOBALS['dropbox_posts_dir'].'/', '', $file);
			$this_file = substr($this_file, 0, 1);
			if (is_numeric($this_file)) {
				unset($filepaths[$loop_count]);
			}
			$loop_count++;
		}
		
		//$filepaths = array_values($filepaths); // resets array keys after page cleanse
		
		usort($filepaths, function ($a, $b){
		    return substr($b, -4) - substr($a, -4);
		});
		
		$filepaths = array_reverse($filepaths);
	}
?>