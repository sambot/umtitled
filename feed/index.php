<?php  
	include_once('../config.php');
	
	if($publish_rss){
		
		filepaths();
		remove_pages();
		
		$filepaths = $GLOBALS['filepaths'];
			
		$count = $GLOBALS['items_in_feed'] - 1;
		
		for ($i=0; $i<=$count; $i++) {
		
			$post_link = preg_replace('#'.$GLOBALS['dropbox_posts_dir'].'/[0-9-]*_([0-9a-z-]*)\.md#', '$1', $filepaths[$i]);
			
			$the_file = file_get_contents($filepaths[$i]);
			$the_file = Markdown($the_file);
			
			$matches = array();
			preg_match('#<h1>(.*)</h1>.*#iU', $the_file, $matches);
			$title = $matches[1];
			
			$body = str_replace('<h1>'.$title.'</h1>', '', $the_file);
			$body = ltrim($body);
			
			echo('filepath: '.$filepaths[$i].'<br />');
			echo('post link: '.$post_link.'<br />');
			echo('title: '.$title.'<br />');
			echo('body: '.$body.'<br />');
			echo('<hr />');
			
		}
		
	}
?>