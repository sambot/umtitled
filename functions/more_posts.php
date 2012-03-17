<?php  

	// Builds out the paginated posts pages
	
	function more_posts() { 	
		$page_num = $_SERVER['QUERY_STRING'];
		$ppp = $GLOBALS['posts_per_page'];
		$filepaths = glob($GLOBALS['posts_dir'].'/*.md');
		$end = $ppp * $page_num;
		$start = $end - $ppp;
		$total = count($filepaths);
		
		for ($i=$start; $i<=$end-1; $i++) {
			title_post($filepaths,$i);
		}
		
		if ($end < $total) {
			$prev_page = $_SERVER['QUERY_STRING'] + 1;
			echo('<a href="'.$prev_page.'">'.$GLOBALS['prev_page_text'].'</a>');
		}	
		
		if ($_SERVER['QUERY_STRING'] == 2) {
			echo('<a href=".">'.$GLOBALS['next_page_text'].'</a>');
		} else {
			$next_page = $_SERVER['QUERY_STRING'] - 1;
			echo('<a href="'.$next_page.'">'.$GLOBALS['next_page_text'].'</a>');
		}
	}

?>