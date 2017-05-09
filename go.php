<?php 

// Assuming you installed from Composer:
require "vendor/autoload.php";
use PHPHtmlParser\Dom;


function theData($url, $call){
$dom = new Dom;
$dom->load($url);


$headline = $dom->find('h1')[0];
$category = $dom->find('.tag-list a')[0];

$img = $dom->find('.marquee-img');
$getImgUrl = $img->getAttribute('src');
$imgUrl = "https://insights.hpe.com/" . $getImgUrl;

$info = array("headline"=>$headline->text, "category"=>$category->text, "image"=>$imgUrl);

echo $info[$call]; 
}




theData('https://insights.hpe.com/articles/thanks-to-iot-predictive-maintenance-gets-an-extreme-makeover-1705.html', "category");

?>