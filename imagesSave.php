<?php

$featuredArticles = $_POST["featuredArticles"];
$latestArticles = $_POST["latestArticles"];
$newsletterNumber = $_POST["newsletterNumber"];

// Dependendo do número de articles, pega variáveis
for ($i = 1; $i <= $featuredArticles; $i++) {
       $featuredArticle[$i] = $_POST["featuredArticle" . $i];
}

for ($i = 1; $i <= $latestArticles; $i++) {
       $latestArticle[$i] = $_POST["latestArticle" . $i];
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
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;


function resizeFeatured($news, $url, $name){
$img = Image::make(theImage($url));

// now you are able to resize the instance
$img->resize(null, 305, function ($constraint) {
    $constraint->aspectRatio();
});

//crop
$img->crop(600, 305);

// paste another image
$img->insert('images/mask.png');

// finally we save the image as a new file
$img->save('images/saved/' . $news . '_' . $name . '.jpg');
    
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
        resizeFeatured($newsletterNumber, $featuredArticle[$i], $i);    
    }


    
    ?>
    
    
    
</body>
</html>