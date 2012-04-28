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
					<li><a href="#">Search</a></li>
				</ul>
			</nav>
			<hgroup>
				<h1><a href="<?php echo ($site_root); ?>"><?php echo($site_title); ?></a></h1>
			</hgroup>
		</header>
		
		
			
