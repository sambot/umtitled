<?php  
	include_once('../config.php');
	
	if($publish_rss){
		
		filepaths();
		remove_pages();
		current_url();
		
		echo('site root: '.$site_root);
		
		$filepaths = $GLOBALS['filepaths'];
			
		$count = $GLOBALS['items_in_feed'] - 1;
			
		$now_date = date('D, d M Y H:i:s O');
		
		$current_url = str_replace('')
			
		echo ('<?xml version="1.0" encoding="UTF-8" ?>
			<rss version="2.0">
			<channel>
		        <title>'.$site_title.'</title>
		        <description>'.$site_tagline.'</description>
		        <link>'.$site_root.'</link>
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
			$pub_date = $GLOBALS['post_date'];
			$pub_date = DateTime::createFromFormat('F j, Y \a\t g:i a', $pub_date);
			$pub_date = $pub_date->format('D, d M Y H:i:s O');
			
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
	                <link>'.$GLOBALS['site_root'].'/'.$post_link.'</link>
	                <guid>'.$GLOBALS['site_root'].'/'.$post_link.'</guid>
	                <pubDate>'.$pub_date.'</pubDate>
		        </item>
			');
			
		}
		
	}
?></channel>
</rss>