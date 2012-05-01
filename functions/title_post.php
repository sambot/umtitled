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
			// $post_images = str_replace('posts', 'post_images', $GLOBALS['dropbox_posts_dir']);
			// $html_content = str_replace('<img src="', '<img src="'.$post_images.'/', $html_content);
			
			$post_content = $html_content;
			
			$post_images = str_replace('posts', 'post_images', $GLOBALS['dropbox_posts_dir']);
		
			$DOM = new DOMDocument;
			$DOM->loadHTML($post_content);
			
			$imgs = $DOM->getElementsByTagName('img');
			foreach($imgs as $img){
			    $src = $img->getAttribute('src');
			    if(strpos($src, 'http') !== 0){
			        $img->setAttribute('src', $post_images.'/'.$src);
			    }
			}
			
			$html = $DOM->saveHTML();
			
			$html = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html><body>', '', $html);
			
			$html = str_replace('</body></html>', '', $html);
			
			
			
			echo('<article>'.$html);	
		}	
	}

?>