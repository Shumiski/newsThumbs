<?php

$featuredArticles = $_POST["featuredArticles"];
$latestArticles = $_POST["latestArticles"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    
<link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    
<form action="imagesSave.php" method="post">
<input type="hidden" name="featuredArticles" value="<?php echo $featuredArticles;?>" />
<input type="hidden" name="latestArticles" value="<?php echo $latestArticles;?>" />

   
    Newsletter Number: <br><br>
    <input type="text" name="newsletterNumber"><br><br><br>
    
    Report Top: <br><br>
    <input type="text" name="newsletterReport"><br><br><br>

    Report Middle: <br><br>
    <input type="text" name="newsletterReportMiddle"><br><br><br>
    
    Report Bottom: <br><br>
    <input type="text" name="newsletterReportBottom"><br><br><br>
  
    <?php
    
    echo "<strong>Featured articles</strong><br><br>";
    for ($i = 1; $i <= $featuredArticles; $i++) {
        echo "<input type='text' name='featuredArticle" . $i . "'><br><br>";
    }
    
    echo "<br><br><strong>Latest articles</strong><br><br>";
    for ($j = 1; $j <= $latestArticles; $j++) {
        echo "<input type='text' name='latestArticle" . $j . "'><br><br>";
    }
    
    ?>
   
<input type="submit" value="Submit">
  
  

</form>
    
    
</body>
</html>