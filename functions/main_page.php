<?php  

	// Builds out the home page

	function main_page() { 
	
		$count = $GLOBALS['posts_per_page'] - 1;
		$filepaths = glob($GLOBALS['posts_dir'].'/*.md');
		
		for ($i=0; $i<=$count; $i++) {
			title_post($filepaths,$i);
		}
		
		echo('<a href="2">'.$GLOBALS['prev_page_text'].'</a>');
	
	}

?>