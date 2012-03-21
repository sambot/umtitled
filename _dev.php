<?php 

include_once('_simplehtmldom/simple_html_dom.php');

$html = file_get_html('https://www.dropbox.com/sh/isyrm6akavgy8mh/obUwTUmZf5');

?><!doctype html>
<head>
<title></title>


</head>
<body>
<div id="result"></div>


<?php 

foreach($html->find('.filename-link') as $element) {
	// echo $element->href . '<br>';
	
	$link = $element->href;
	$link = preg_replace('#.*/#', '', $link);
	echo ('<a href="http://dl.dropbox.com/u/1276566/umtitled/posts/'.$link.'">'.$link.'</a><br />');
}

 ?>


</body>
</html>