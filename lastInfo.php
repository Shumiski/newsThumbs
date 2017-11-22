<?php

$featuredArticles = $_POST["featuredArticles"];
$latestArticles = $_POST["latestArticles"];
$newsletterNumber = $_POST["newsletterNumber"];
$newsletterReport = $_POST["newsletterReport"];
$newsletterReportMiddle = $_POST["newsletterReportMiddle"];
$newsletterReportBottom = $_POST["newsletterReportBottom"];

// Dependendo do número de articles, pega variáveis
for ($i = 1; $i <= $featuredArticles; $i++) {
       $featuredArticle[$i] = $_POST["featuredArticle" . $i];
}

for ($i = 1; $i <= $latestArticles; $i++) {
       $latestArticle[$i] = $_POST["latestArticle" . $i];
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
  <form action="newsletter.php" method="post">
    <input type="hidden" name="featuredArticles" value="<?php echo $featuredArticles;?>" />
    <input type="hidden" name="latestArticles" value="<?php echo $latestArticles;?>" />
    <input type="hidden" name="newsletterNumber" value="<?php echo $newsletterNumber;?>" />
    <input type="hidden" name="newsletterReport" value="<?php echo $newsletterReport;?>" />
    <input type="hidden" name="newsletterReportMiddle" value="<?php echo $newsletterReportMiddle;?>" />
    <input type="hidden" name="newsletterReportBottom" value="<?php echo $newsletterReportBottom;?>" />
   
    Subject line: <br><br>
    <input type="text" name="newsletterSubject"><br><br><br>
    
    Date: <br><br>
    <input type="text" name="newsletterDate"><br><br><br>
    
    Aprimo: <br><br>
    <input type="text" name="aprimo"><br><br><br>
   
    Images path: <br><br>
    <select name="imagesPath">
    <option value="local">Local</option>
    <option value="et">ExactTarget</option>
    </select>
   
   
    <?php 
    
    for ($i = 1; $i <= $featuredArticles; $i++) {
        echo "<input type='hidden' name='featuredArticle" . $i . "' value='" . $featuredArticle[$i] . "' /> \n";
    }

    for ($i = 1; $i <= $latestArticles; $i++) {
        echo "<input type='hidden' name='latestArticle" . $i . "' value='" . $latestArticle[$i] . "' /> \n";
    }
    
    ?>

    <input type="submit" value="Next">
        
    </form>
    
</body>
</html>