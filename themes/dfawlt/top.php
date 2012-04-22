<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo ($site_title.' | '.$site_tagline); ?></title>
<link rel="stylesheet" href="themes/<?php echo($theme); ?>/styles/reset.css">
<link href='http://fonts.googleapis.com/css?family=Lato:300,700,900' rel='stylesheet'>
<link rel="stylesheet" href="themes/<?php echo($theme); ?>/styles/main.css">
</head>
<body>

	<div id="wrapper">
		<header>
			
			<nav>
				<ul>
					<?php nav(); ?>
				</ul>
			</nav>
			<hgroup>
				<h1><a href="/"><?php echo($site_title); ?></a></h1>
			</hgroup>
		</header>
		
		
		
		
			
		<nav id="older_newer">
			<ul>
				<li><a href="2"><span>&laquo;</span> Older</a></li>
			</ul>
		</nav>
	</div>
	
	<footer>
		<p>Lorem ipsum dolor sit amet, <a href="">consectetur adipiscing</a> elit.<br />Pellentesque tincidunt porttitor magna, quis molestie augue sagittis quis.</p>
	</footer>
</body>
</html>