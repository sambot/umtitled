<?php  

$DOM = new DOMDocument;
$DOM->loadHTML($html);

$imgs = $DOM->getElementsByTagName('img');
foreach($imgs as $img){
    $src = $img->getAttribute('src');
    if(strpos($src, 'http') !== 0){
        $img->setAttribute('src', "http://sitename.com/path/$src");
    }
}

$html = $DOM->saveHTML();

$html = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html><body>', '', $html);

$html = str_replace('</body></html>', '', $html);

echo $html;

?>