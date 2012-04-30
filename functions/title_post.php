<?php 

	// Creates links to posts from titles and prints HTML post
	
	function title_post($filepaths,$i) { 
		if ($GLOBALS['use_dropbox'] == 'yes') {
			$path_prefix = $GLOBALS['dropbox_posts_dir'];
		} else {
			$path_prefix = $GLOBALS['posts_dir'];
		}	
	
		if (array_key_exists($i, $filepaths)) {
		
			$single_post = preg_replace('#'.$path_prefix.'/[0-9-]*_([0-9a-z-]*)\.md#', '$1', $filepaths[$i]);
			$md_content = file_get_contents($filepaths[$i]);
			$html_content = (Markdown($md_content));
			$html_content = str_replace('<h1>', '<h1><a href="'.$single_post.'">', $html_content);
			$html_content = str_replace('</h1>', '</a></h1>', $html_content);
			
			// does the image thingy
			$post_images = str_replace('posts', 'post_images', $GLOBALS['dropbox_posts_dir']);
			$html_content = str_replace('<img src="', '<img src="'.$post_images.'/', $html_content);
			
			echo('<article>'.$html_content);	
		}	
	}

?>