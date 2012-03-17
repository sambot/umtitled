<?php



// HELPERS
	
	include_once ('config.php');
	include_once ('markdown.php');
	
	
			
// FUNCTIONS


	// Creates links to posts from titles and prints HTML post
	
	function title_post($filepaths,$i) { 
		$single_post = preg_replace('#posts/[0-9-]*_([0-9a-z-]*)\.md#', '$1', $filepaths[$i]);
		$md_content = file_get_contents($filepaths[$i]);
		$html_content = (Markdown($md_content));
		$html_content = str_replace('<h1>', '<h1><a href="'.$single_post.'">', $html_content);
		$html_content = str_replace('</h1>', '</a></h1>', $html_content);
		
		echo($html_content);	
	}
	
	

	// Builds out the home page

	function main_page() { 
	
		$count = $GLOBALS['posts_per_page'] - 1;
		$filepaths = glob($GLOBALS['posts_dir'].'/*.md');
		
		for ($i=0; $i<=$count; $i++) {
			title_post($filepaths,$i);
		}
		
		echo('<a href="2">'.$GLOBALS['prev_page_text'].'</a>');
	
	}

	
	
	// Builds out the paginated posts pages
	
	function more_posts() { 	
		$page_num = $_SERVER['QUERY_STRING'];
		$ppp = $GLOBALS['posts_per_page'];
		$filepaths = glob($GLOBALS['posts_dir'].'/*.md');
		$end = $ppp * $page_num;
		$start = $end - $ppp;
		$total = count($filepaths);
		
		for ($i=$start; $i<=$end-1; $i++) {
			title_post($filepaths,$i);
		}
		
		if ($end < $total) {
			$prev_page = $_SERVER['QUERY_STRING'] + 1;
			echo('<a href="'.$prev_page.'">'.$GLOBALS['prev_page_text'].'</a>');
		}	
		
		if ($_SERVER['QUERY_STRING'] == 2) {
			echo('<a href=".">'.$GLOBALS['next_page_text'].'</a>');
		} else {
			$next_page = $_SERVER['QUERY_STRING'] - 1;
			echo('<a href="'.$next_page.'">'.$GLOBALS['next_page_text'].'</a>');
		}
	}
	
	
	
	// Builds out the single post page
	
	function single_post() {
		
		$post_url_title = $_SERVER['QUERY_STRING'];
		
		$filepath = glob($GLOBALS['posts_dir'].'/*'.$post_url_title.'.md');
		
		$post_content = file_get_contents($filepath[0]);
		
		echo (Markdown($post_content));
		
	}
	
	
	
	
	

?>