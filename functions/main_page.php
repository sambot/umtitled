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
			echo ('<footer><p>Posted on: '.$GLOBALS['post_date'].'</p></footer></article>');
		}
		
		echo('<nav id="older_newer"><ul><li><a href="2"><span>&laquo;</span> Older</a></li></ul></nav>');
	
	}

?>