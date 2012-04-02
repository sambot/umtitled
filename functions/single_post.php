<?php  

	// Builds out the single post page
	
	function single_post() {
	
		$post_url_title = $_SERVER['QUERY_STRING'];
	
		if ($GLOBALS['use_dropbox'] == 'yes') {
			
			$html = file_get_html($GLOBALS['dropbox_posts_page']);
			
			foreach($html->find('.filename-link') as $element) {
				$md = $element->href;
				$md = preg_replace('#.*/#', '', $md);
				$filepaths[] = $GLOBALS['dropbox_posts_dir'].'/'.$md;
			}
			
			// print_r($filepaths);exit;
			
			$post_index = preg_grep('#.*'.$post_url_title.'.*\.md#', $filepaths);
			
			$filepath = print_r($post_index, true);
			$filepath = preg_replace('#Array\s\(\s.*http#', 'http', $filepath);
			$filepath = preg_replace('#\s\)#', '', $filepath);
			$filepath = preg_replace('#\s#', '', $filepath);
		
			$post_content = file_get_contents($filepath);
		
		} else {
			$filepath = glob($GLOBALS['posts_dir'].'/*'.$post_url_title.'.md');
			$post_content = file_get_contents($filepath[0]);
		}
		
		echo (Markdown($post_content));
		
		post_date($filepath);
		
		echo ('<p>Posted on: '.$GLOBALS['post_date'].'</p>');
		
	}

?>