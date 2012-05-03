<!doctype html><?php include_once('theme_config.php'); $site_root = get_site_root(); ?>

<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo ($site_title.' | '.$site_tagline); ?></title>
<link rel="stylesheet" href="themes/<?php echo($theme); ?>/styles/reset.css">
<link href='http://fonts.googleapis.com/css?family=Lato:300,700,900' rel='stylesheet'>
<link rel="stylesheet" href="themes/<?php echo($theme); ?>/styles/main.css">
<link rel="alternate" type="application/rss+xml" title="<?php echo ($site_title.' | '.$site_tagline); ?>" href="<?php echo ($site_root.'feed'); ?>" />
</head>
<body>

	<div id="wrapper">
		<header>
			
			<nav>
				<ul>
					<?php nav(); ?>
					<li id="search">
						<input placeholder="Search" type="text" id="q" onkeydown="if (event.keyCode == 13) { googlesearch(); }">
						<a href="#!" onclick="googlesearch();">Go</a>
					</li>
				</ul>
			</nav>
			<script type="text/javascript">
			    function googlesearch() {
			    	var searchterm = document.getElementById('q').value;
			    	var searchurl = 'https://www.google.com/search?q=site:<?php echo $site_root; ?>+' + searchterm;
			    	window.location = searchurl;
			    }
			</script>
			<hgroup>
				<h1><a href="<?php echo ($site_root); ?>"><?php echo($site_title); ?></a></h1>
			</hgroup>
		</header>
		
		
			
