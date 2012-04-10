<?php  

	// Builds out the home page

	function main_page() { 
		
		filepaths();
		remove_pages();
			
		$count = $GLOBALS['posts_per_page'] - 1;
		
		for ($i=0; $i<=$count; $i++) {
			title_post($GLOBALS['filepaths'],$i);

			$filepath = $GLOBALS['filepaths'];
			post_date($filepath[$i]);
			echo ('<p>Posted on: '.$GLOBALS['post_date'].'</p>');
		}
		
		echo('<a href="2">'.$GLOBALS['prev_page_text'].'</a>');
	
	}

?>