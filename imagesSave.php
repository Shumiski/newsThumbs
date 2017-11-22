<?php

$featuredArticles = $_POST["featuredArticles"];
$latestArticles = $_POST["latestArticles"];
$newsletterNumber = $_POST["newsletterNumber"];
$newsletterReport = $_POST["newsletterReport"];
$newsletterReportBottom = $_POST["newsletterReportBottom"];


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
$imgUrl = "https://www.hpe.com/" . $getImgUrl;
    
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
$img->save('images/saved/' . $news . '_featured_' . $name . '.jpg');
    
}


function resizeLatest($news, $url, $name){
$img = Image::make(theImage($url));

// now you are able to resize the instance
$img->resize(null, 73, function ($constraint) {
    $constraint->aspectRatio();
});

//crop
$img->crop(100, 73);

// finally we save the image as a new file
$img->save('images/saved/' . $news . '_latest_' . $name . '.jpg');
    
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
  <form action="lastInfo.php" method="post">
    <input type="hidden" name="featuredArticles" value="<?php echo $featuredArticles;?>" />
    <input type="hidden" name="latestArticles" value="<?php echo $latestArticles;?>" />
    <input type="hidden" name="newsletterNumber" value="<?php echo $newsletterNumber;?>" />
    <input type="hidden" name="newsletterReport" value="<?php echo $newsletterReport;?>" />
    <input type="hidden" name="newsletterReportBottom" value="<?php echo $newsletterReportBottom;?>" />

    <?php 
    
    for ($i = 1; $i <= $featuredArticles; $i++) {
        resizeFeatured($newsletterNumber, $featuredArticle[$i], $i);
        echo "<input type='hidden' name='featuredArticle" . $i . "' value='" . $featuredArticle[$i] . "' /> \n";
    }

    for ($i = 1; $i <= $latestArticles; $i++) {
        resizeLatest($newsletterNumber, $latestArticle[$i], $i);
        echo "<input type='hidden' name='latestArticle" . $i . "' value='" . $latestArticle[$i] . "' /> \n";
    }
    
    ?>
        <input type="submit" value="Next">

    
    </form>
    
</body>
</html>