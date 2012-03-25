<?php ini_set('display_errors', '1');

	// BLOG VARIABLES - Go ahead and edit away!

		$site_title			= 	'Markdown Blog'				;
		$posts_per_page		= 	3							;
		$comments			= 	'off'						;
		$theme				= 	'grumblecakes'				;
	
	////////////////////////////////////////////////////////////////////////

	
	
	// DROPBOX VARIABLES - Go ahead and edit away!

		$use_dropbox		=	'yes'						; // 'yes' or 'no'
		$dropbox_posts_dir	=	'http://dl.dropbox.com/u/1276566/umtitled/posts';
		$dropbox_posts_page	=	'https://www.dropbox.com/sh/isyrm6akavgy8mh/obUwTUmZf5';
	
	////////////////////////////////////////////////////////////////////////
	
	
	
	// ADVANCED CONFIG VARIABLES - Edit ONLY if you know what you're doing.
	
		$posts_dir			=	'posts'						;
		$next_page_text		= 	'Next Page &rarr;'			;
		$prev_page_text		= 	'&larr; Previous Page | '	;
		$use_cache			=	true						;
		$cache_lifespan		=	60							;
		$cache_url_param	= 	'cache'						;
		$cache_url_pass		= 	'ruleseverythingaroundme'	;

	////////////////////////////////////////////////////////////////////////



	// FUNCTIONS - Don't touch these!
	
		include_once (		'functions/markdown.php'		);
		include_once (		'functions/simple_html_dom.php'	);
		include_once (		'functions/filepaths.php'		);
		include_once (		'functions/title_post.php'		);
		include_once (		'functions/main_page.php'		);
		include_once (		'functions/more_posts.php'		);
		include_once (		'functions/single_post.php'		);

	////////////////////////////////////////////////////////////////////////

?>