<?php  

	function filepaths() {
		global $filepaths;
		if ($GLOBALS['use_dropbox'] == 'yes') {
			$html = file_get_html($GLOBALS['dropbox_posts_page']);
			
			foreach($html->find('.filename-link') as $element) {
				$md = $element->href;
				$md = preg_replace('#.*/#', '', $md);
				$filepaths[] = $GLOBALS['dropbox_posts_dir'].'/'.$md;
			}
			
			$filepaths = array_reverse($filepaths);
			
		} else {
			$filepaths = glob($GLOBALS['posts_dir'].'/*.md');
			$filepaths = array_reverse($filepaths);
		}
	}
	
?>