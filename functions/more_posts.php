<?php  

	// Builds out the paginated posts pages
	
	function more_posts() { 	
		
		filepaths();
		remove_pages();
		
		$page_num = $_SERVER['QUERY_STRING'];
		$ppp = $GLOBALS['posts_per_page'];
		$end = $ppp * $page_num;
		$start = $end - $ppp;
		$total = count($GLOBALS['filepaths']);
		
		for ($i=$start; $i<=$end-1; $i++) {
			title_post($GLOBALS['filepaths'],$i);

			$filepath = $GLOBALS['filepaths'];
			
			if(isset($filepath[$i])) {
				post_date($filepath[$i]);
				echo ('<footer><p>Posted on: '.$GLOBALS['post_date'].'</p></footer></article>');
			}
		}
		
		
		echo('<nav id="older_newer"><ul>');
		
		if ($end < $total) {
			$prev_page = $_SERVER['QUERY_STRING'] + 1;
			echo('<li><a href="'.$prev_page.'"><span>&laquo;</span> Older</a></li>');
		}	
		
		if ($_SERVER['QUERY_STRING'] == 2) {
			echo('<li><a href=".">Newer <span>&raquo;</span></a></li>');
		} else {
			$next_page = $_SERVER['QUERY_STRING'] - 1;
			echo('<li><a href="'.$next_page.'">Newer <span>&raquo;</span></a></li>');
		}
	}

?>