<?php  

	// Builds out the home page

	function main_page() { 
		
		filepaths();
			
		$count = $GLOBALS['posts_per_page'] - 1;
		
		for ($i=0; $i<=$count; $i++) {
			title_post($GLOBALS['filepaths'],$i);
		}
		
		echo('<a href="2">'.$GLOBALS['prev_page_text'].'</a>');
	
	}

?>