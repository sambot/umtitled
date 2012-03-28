<!doctype html>
<head>
<title></title>
</head>
<body>
<div id="result"></div>


<?php 
$donuts[0] = "Chocolate 02";
$donuts[1] = "Jelly 16";
$donuts[2] = "Glazed 01";
$donuts[3] = "Frosted 12";

function sort_last($a, $b){

    return substr($a, -2) - substr($b, -2);
}


print_r($donuts);

usort($donuts, 'sort_last');

echo '<br />';

print_r($donuts);
 
 ?>


</body>
</html>