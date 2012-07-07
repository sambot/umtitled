<?php  
	
	include_once('../config.php');
	
	if($publish_rss){ 
		

		function get_feed_site_root() {
			ob_start();
		    include_once('../cache/caches/site_root.html');	
		    return ob_get_clean();
		}
		
		global $site_root;
		global $feed;
		$feed = true;
		$site_root = get_feed_site_root();
		
		filepaths();
		remove_pages();
		current_url(); 

		
		// echo('site root: '.$site_root.'<br />');
		// echo('current url: '.$current_url.'<br />');
		// exit;
		
		$filepaths = $GLOBALS['filepaths'];
			
		$count = $GLOBALS['items_in_feed'] - 1;
			
		$now_date = date('D, d M Y H:i:s O');
		
		$current_url = str_replace('','','');
			
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
			
			
			
			
			
			// IMAGE LINK TO ABSOLUTE URL FIX
			
			// TRY THIS: http://stackoverflow.com/questions/10389153/regex-to-change-img-relative-urls-to-absolute/10389252#10389252
			
			$db_img_dir = str_replace('posts','post_images',$GLOBALS['dropbox_posts_dir']);
			
			$the_file = str_replace('<img src="', '<img src="'.$db_img_dir.'/', $the_file);
			$the_file = str_replace($db_img_dir.'/http://', 'http://', $the_file);
			
				
/*
				if(strpos($the_file,'<img')){
				
					$html = str_get_html($the_file);
					
					foreach($html->find('img') as $element) {
						$img_url = $element->src;
						if (strpos($img_url, 'http://')) {} else {
							$db_img_dir = str_replace('posts','post_images',$GLOBALS['dropbox_posts_dir']);
							$abs_img_url = $db_img_dir.'/'.$img_url;
							
							$element = str_replace($img_url, $abs_img_url, $element);
							
						}  
					}
				}	
*/
				
			// END FIX
			
			
			
			
			
			$matches = array();
			preg_match('#<h1>(.*)</h1>.*#iU', $the_file, $matches);
			$title = $matches[1];
			
			$body = str_replace('<h1>'.$title.'</h1>', '', $the_file);
			$body = ltrim($body);
			
			post_date($filepaths[$i]);
			$pub_date = $GLOBALS['feed_post_date'];
			
			
			// FIX THIS!!!
				// $pub_date = DateTime::createFromFormat('F j, Y \a\t g:i a', $pub_date);
				// $pub_date = $pub_date->format('D, d M Y H:i:s O');
			// END FIX
			
			$pub_date = strtotime($pub_date);
	
			// NEEDS TO BE Sat, 07 Sep 2002 00:00:01 GMT
			$pub_date = strftime('%a, %d %b %Y %H:%M:00', $pub_date);
			
			

			
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
	                <link>'.$GLOBALS['site_root'].$post_link.'</link>
	                <guid>'.$GLOBALS['site_root'].$post_link.'</guid>
	                <pubDate>'.$pub_date.'</pubDate>
		        </item>
			');
			
		}
		
	}
?></channel>
</rss>