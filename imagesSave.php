<?php

$featuredArticles = $_POST["featuredArticles"];
$latestArticles = $_POST["latestArticles"];

for ($i = 1; $i <= $featuredArticles; $i++) {
        featuredArticle . $i;
}


// Starting Parser
require "vendor/autoload.php";
use PHPHtmlParser\Dom;


function theImage($url){
$dom = new Dom;
$dom->load($url);

$img = $dom->find('.marquee-img');
$getImgUrl = $img->getAttribute('src');
$imgUrl = "https://insights.hpe.com/" . $getImgUrl;
    
    return $imgUrl;
}


//Starting Intervention
use Intervention\Image\ImageManager;

function resizeImages($url){
    
$img = Image::make(theImage($url));

// now you are able to resize the instance
$img->resize(320, 240);

// finally we save the image as a new file
$img->save('public/bar.jpg');
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    
    <style type="text/css">
    
        body{
            text-align: center;
            font-family: sans-serif;
            margin-top: 100px;
        }
        
        input{
            padding:4px;
        }
        
        
    </style>
    
</head>
<body>
  
    <?php
    

    for ($i = 1; $i <= $featuredArticles; $i++) {
        
        
        echo "<input type='text' name='featuredArticle" . $i . "'><br><br>";
    }
    

    for ($j = 1; $j <= $latestArticles; $j++) {
        echo "<input type='text' name='latestArticle" . $j . "'><br><br>";
    }
    
    ?>
    
    
</body>
</html>