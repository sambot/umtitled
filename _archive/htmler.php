<?php  

	function htmler() {
		
		$html = file_get_html($GLOBALS['dropbox_posts_page']);
		
		echo ('<!doctype html><html><head><title></title></head><body>');
		
		foreach($html->find('.filename-link') as $element) {
			$md = $element->href;
			$md = preg_replace('#.*/#', '', $md);
			echo('<a class="filename-link" href="'.$GLOBALS['dropbox_posts_dir'].'/'.$md.'">'.$GLOBALS['dropbox_posts_dir'].'/'.$md.'</a><br />');
		}
		
		echo ('</body></html>');
		
	}

?>