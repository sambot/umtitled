<?php include_once('config.php');

	//include_once('cache/begin_caching.php');
					
		$html = file_get_html('https://www.dropbox.com/sh/isyrm6akavgy8mh/obUwTUmZf5');
		
		foreach($html->find('.filename-link') as $element) {
			$md = $element->href;
			$md = preg_replace('#.*/#', '', $md);
			// $filepaths[] = $GLOBALS['dropbox_posts_dir'].'/'.$md;
			echo ('<a href="'.$GLOBALS['dropbox_posts_dir'].'/'.$md.'" class="filename-link">'.$md.'</a><br />');		
		}
	
	//include_once('cache/end_caching.php');

?>