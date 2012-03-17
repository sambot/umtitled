<?php include_once ('functions.php'); ?><!doctype html>
<head>
<title><?php echo $site_title; ?></title>
</head>
<body>

<?php 
	
	if (is_numeric($_SERVER['QUERY_STRING'])) {
		
		more_posts();
	
	} elseif ($_SERVER['QUERY_STRING']) {
	
		single_post();
	
	} else {
	
		main_page();
		
	}
	
?>

</body>
</html>