<?php 

	if ($GLOBALS['use_cache'] == true) {
		include_once('cache/begin_caching.php');
	} 
	
	filepaths();
	remove_pages();
		
	$count = count($GLOBALS['filepaths']);

	ob_start();
		for ($i=0; $i<=$count; $i++) {
			title_post($GLOBALS['filepaths'],$i);
	
			$filepath = $GLOBALS['filepaths'];
			post_date($filepath[$i]);
			echo ('<footer><p>Posted on '.$GLOBALS['post_date'].'</p></footer></article>');
		}
		$guts = ob_get_contents();
	ob_end_clean();
	
	$html = str_get_html($guts);
	
	foreach($html->find('article') as $element) {
		foreach($element->find('h1') as $h1) {
			$h1 = str_replace('h1','h2',$h1);
			echo '<article class="archive">';
			echo $h1;
		}
		foreach($element->find('footer') as $post_footer) {
			echo $post_footer;
			echo '</article>';
		}
    }
    	
	if ($GLOBALS['use_cache'] == true) {
		include_once('cache/end_caching.php');
	}    
    
?>