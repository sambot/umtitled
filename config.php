<?php 

	// BLOG VARIABLES - Go ahead and edit away!

		$posts_dir			=	'posts'						;
		$posts_per_page		= 	3							;
		$comments			= 	'off'						;
		$site_title			= 	'Markdown Blog'				;
		$theme				= 	'grumblecakes'				;
	
	////////////////////////////////////////////////////////////////////////
	
	
	
	// ADVANCED CONFIG VARIABLES - Edit ONLY if you know what you're doing.

		$next_page_text		= 	'Next Page &rarr;'			;
		$prev_page_text		= 	'&larr; Previous Page | '	;

	////////////////////////////////////////////////////////////////////////



	// FUNCTIONS - Don't touch these!
	
		include_once (		'functions/markdown.php'		);
		include_once (		'functions/title_post.php'		);
		include_once (		'functions/main_page.php'		);
		include_once (		'functions/more_posts.php'		);
		include_once (		'functions/single_post.php'		);

	////////////////////////////////////////////////////////////////////////

?>