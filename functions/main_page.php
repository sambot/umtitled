<?php  

	// Builds out the home page

	function main_page() { 
	
		if ($GLOBALS['use_dropbox'] == 'yes') {
			$html = file_get_html($GLOBALS['dropbox_posts_page']);
			
			foreach($html->find('.filename-link') as $element) {
				$md = $element->href;
				$md = preg_replace('#.*/#', '', $md);
				$filepaths[] = $GLOBALS['dropbox_posts_dir'].'/'.$md;
			}
		} else {
			$filepaths = glob($GLOBALS['posts_dir'].'/*.md');
		}
			
		$count = $GLOBALS['posts_per_page'] - 1;
		
		for ($i=0; $i<=$count; $i++) {
			title_post($filepaths,$i);
		}
		
		echo('<a href="2">'.$GLOBALS['prev_page_text'].'</a>');
	
	}

?>