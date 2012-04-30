<?php 

	// 	BLOG VARIABLES - Go ahead and edit away!

		$site_title			= 	'Molten Brew'				;
		$site_tagline		= 	'Feed the caffeine monster within';
		$posts_per_page		= 	5							;
		$theme				= 	'dfawlt'					;
	
	////////////////////////////////////////////////////////////////////////

	
	
	// 	DROPBOX VARIABLES - Go ahead and edit away!

		$use_dropbox		=	'yes'						; // 'yes' or 'no'
		$dropbox_posts_dir	=	'http://dl.dropbox.com/u/1276566/umtitled/posts';
		$dropbox_posts_page	=	'https://www.dropbox.com/sh/isyrm6akavgy8mh/obUwTUmZf5';
	
	////////////////////////////////////////////////////////////////////////

	
	
	// 	COMMENTING VARIABLES - Go ahead and edit away!

		$comments			= 	false						;
		$disqus_shortname	= 	'umtitled'					;
	
	////////////////////////////////////////////////////////////////////////
	
	
	
	//  ADVANCED CONFIG VARIABLES - Edit ONLY if you know what you're doing.
	
		$posts_dir			=	'posts'						;
		$next_page_text		= 	'Next Page &rarr;'			;
		$prev_page_text		= 	'&larr; Previous Page'		;
		$publish_rss		= 	true						;
		$cache_rss			= 	true						;
		$items_in_feed		= 	10							;
		$use_cache			=	false						;
		$cache_lifespan		=	60							;
		$cache_url_param	= 	'cache'						;
		$cache_url_pass		= 	'ruleseverythingaroundme'	;
		$dev_mode			=	true						;

	////////////////////////////////////////////////////////////////////////



	//  U CAN'T TOUCH THIS!
	
		$dev_mode ? ini_set('display_errors', '1') : '';
	
		include_once (		'functions/markdown.php'		);
		include_once (		'functions/simple_html_dom.php'	);
		include_once (		'functions/filepaths.php'		);
		include_once (		'functions/remove_pages.php'	);
		include_once (		'functions/remove_posts.php'	);
		include_once (		'functions/title_post.php'		);
		include_once (		'functions/main_page.php'		);
		include_once (		'functions/post_date.php'		);
		include_once (		'functions/more_posts.php'		);
		include_once (		'functions/single_post.php'		);
		include_once (		'functions/nav.php'				);
		include_once (		'functions/current_url.php'		);
		include_once (		'functions/get_site_root.php'	);

	////////////////////////////////////////////////////////////////////////

?>