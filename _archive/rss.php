<?php  

	// Builds out the rss feed

	function rss() { 
		
		filepaths();
		remove_pages();
		
		$filepaths = $GLOBALS['filepaths'];
			
		$count = $GLOBALS['items_in_feed'] - 1;
		
		for ($i=0; $i<=$count; $i++) {
		
			$post_link = preg_replace('#'.$GLOBALS['dropbox_posts_dir'].'/[0-9-]*_([0-9a-z-]*)\.md#', '$1', $filepaths[$i]);
			
			$the_file = fopen($filepaths[$i], 'r');
			
			$post_title = fgets($the_file);
			//$post_title = str_replace('# ', '', $post_title);
			
			$matches = array();
			preg_match('/<h1>(.*)</h1>.*/iU', $the_file, $matches);
			echo('matches: ');
			print_r($matches);exit;
			
			echo('filepath: '.$filepaths[$i].'<br />');
			echo('post link: '.$post_link.'<br />');
			echo('title: '.$post_title.'<br />');
			echo('<hr />');
			
		}
	
	}

?>