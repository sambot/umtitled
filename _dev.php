<?php 


//$result = preg_replace('[uel*]', 'bot', 'samuel');


$result = preg_replace('#posts/[0-9-]*_([a-z-]*)\.md#', '$1', 'posts/2012-03-16-23-07_an-awesome-post.md');

echo 'result: ' . $result;




?>