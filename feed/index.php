<?php  
	include_once('../config.php');
	
	if($publish_rss){
		
		filepaths();
		remove_pages();
		
		$filepaths = $GLOBALS['filepaths'];
			
		$count = $GLOBALS['items_in_feed'] - 1;
			
		$now_date = date('D, d M Y H:i:s O');
			
		echo ('<?xml version="1.0" encoding="UTF-8" ?>
			<rss version="2.0">
			<channel>
		        <title>'.$site_title.'</title>
		        <description>'.$site_tagline.'</description>
		        <link>'.$_SERVER['SERVER_NAME'].'</link>
		        <lastBuildDate>'.$now_date.'</lastBuildDate>
		        <pubDate>'.$now_date.'</pubDate>
		        <ttl>1400</ttl>
        ');
		
		for ($i=0; $i<=$count; $i++) {
		
			$post_link = preg_replace('#'.$GLOBALS['dropbox_posts_dir'].'/[0-9-]*_([0-9a-z-]*)\.md#', '$1', $filepaths[$i]);
			
			$the_file = file_get_contents($filepaths[$i]);
			$the_file = Markdown($the_file);
			
			$matches = array();
			preg_match('#<h1>(.*)</h1>.*#iU', $the_file, $matches);
			$title = $matches[1];
			
			$body = str_replace('<h1>'.$title.'</h1>', '', $the_file);
			$body = ltrim($body);
			
			post_date($filepaths[$i]);
			$pub_date = $GLOBALS['post_date']; // START HERE
			
			// echo('filepath: '.$filepaths[$i].'<br />');
			// echo('post link: '.$post_link.'<br />');
			// echo('title: '.$title.'<br />');
			// echo('body: '.$body.'<br />');
			// echo('posted: '.$GLOBALS['post_date'].'<br />');
			// echo('<hr />');
			
			echo ('
				<item>
	                <title>'.$title.'</title>
	                <description>'.$body.'</description>
	                <link>'.$_SERVER['SERVER_NAME'].'/'.$post_link.'</link>
	                <guid>unique string per item</guid>
	                <pubDate>Mon, 06 Sep 2009 16:45:00 +0000 </pubDate>
		        </item>
			');
			
		}
		
	}
?></channel>
</rss>