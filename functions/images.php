<?php  

	function images($post_content) {
	
		global $html;
		
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
		
		// this is a really BAD hack
		$html = str_replace('"><img src="', '" class="img_link"><img src="', $html);
	
	}

?>