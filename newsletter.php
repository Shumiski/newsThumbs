<?php

$featuredArticles = $_POST["featuredArticles"];
$latestArticles = $_POST["latestArticles"];
$newsletterNumber = $_POST["newsletterNumber"];
$newsletterSubject = $_POST["newsletterSubject"];
$newsletterDate = $_POST["newsletterDate"];
$newsletterReport = $_POST["newsletterReport"];
$newsletterReportMiddle = $_POST["newsletterReportMiddle"];
$newsletterReportBottom = $_POST["newsletterReportBottom"];
$imagesPathChoice = $_POST["imagesPath"];
$aprimo = $_POST["aprimo"];


if ($imagesPathChoice == "et"){
$imagesPath = "http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/";
} else {
$imagesPath = "images/saved/";
}

require "vendor/autoload.php";
use PHPHtmlParser\Dom;

function featWrite($i, $headline, $info){
    $fH[$i] = $headline;
}

// Dependendo do número de articles, pega variáveis
for ($i = 1; $i <= $featuredArticles; $i++) {
       $featuredArticle[$i] = $_POST["featuredArticle" . $i];
        $featDom[$i] = new Dom;
        $featDom[$i]->load($featuredArticle[$i]);
        $featuredH[$i] = $featDom[$i]->find('h1')[0];
        $featuredC[$i] = $featDom[$i]->find('.tag-list a')[0];
        $featuredHeadline[$i] = $featuredH[$i]->text;
        $featuredCategory[$i] = $featuredC[$i]->text;
}

for ($i = 1; $i <= $latestArticles; $i++) {
       $latestArticle[$i] = $_POST["latestArticle" . $i];
        $latDom[$i] = new Dom;
        $latDom[$i]->load($latestArticle[$i]);
        $latestH[$i] = $latDom[$i]->find('h1')[0];
        $latestC[$i] = $latDom[$i]->find('.tag-list a')[0];
        $latestHeadline[$i] = $latestH[$i]->text;
        $latestCategory[$i] = $latestC[$i]->text;
}


// Report top DOM
        $report1Dom = new Dom;
        $report1Dom->load($newsletterReport);
        $report1H = $report1Dom->find('h1')[0];
        $report1Headline = $report1H->text;

// Report middle DOM
        $report2Dom = new Dom;
        $report2Dom->load($newsletterReport);
        $report2H = $report2Dom->find('h1')[0];
        $report2Headline = $report2H->text;

// Report bottom DOM
        $report3Dom = new Dom;
        $report3Dom->load($newsletterReport);
        $report3H = $report3Dom->find('h1')[0];
        $report3Headline = $report3H->text;
?>

%%[var @Program_Name, @encrypted_email, @Subject_Line                
SET @encrypted_email = EncryptSymmetric([Email Address], "AES", "Encrypt_P", @null, "Encrypt_Salt", @null, "Encrypt_IV", @null)
Set @Subject_Line = <?php echo '"' . $newsletterSubject . '"' . "\n"; ?>
Set @Program_Name = 'Enterprise NXT'                              
]%%                      
%%[var @Campaign, @Cell_Name, @Aprimo_ID
Set @Campaign = emailname_                 
Set @Cell_Name = _DataSourceName                  
Set @Aprimo_ID = <?php echo "'" . $aprimo . "'" . "\n"; ?>
]%%

<custom name="opencounter" type="tracking">
<!--tracking pixel-->
<img src="https://fh-main.measure.agilemeasure.com/mailopen?dimid=%%_subscriberkey%%&linkName= mail_open_%%jobid%%&v15=em_vkqcpnrh4t_aid-510366305" width="1" height="1" style="display:block="/>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <!--[if !mso]><!--> <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!--<![endif]--> <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <title></title> <!--[if (gte mso 9)|(IE)]>
<style type="text/css">table {border-collapse: collapse !important;}</style><![endif]-->
<style type="text/css">body,td{padding:0}body,h1,h2,p{Margin:0}#footer p,h1{Margin-bottom:16px}#footer a,a{text-decoration:underline}#featured-article-1-image,#featured-article-1-text,#hero-image,#hero-text,.three-column .column,.two-columns .column{width:100%;display:inline-block;vertical-align:top}body{min-width:100%;background-color:#EBEAEA}table{border-spacing:0;font-family:Arial,sans-serif}img{border:0}.contents{width:100%}.center{text-align:center}h1{font-size:26px;line-height:34px}h2{font-size:18px;line-height:26px;Margin-bottom:18px}.one-column h1,.one-column h2{color:#1f212d}.one-column-article h1 span{font-size:22px;color:#fff;background-color:#1f212d;text-transform:uppercase;padding:10px}.two-columns h1,.two-columns h2{color:#1f212d}#logo h1{font-size:26px;Margin-bottom:0}#cta-text h1,#cta-text h2,#footer h1,#footer h2,#hero-text h1,#hero-text h2{color:#fff}#featured-article-1-text h1,#featured-article-1-text h2,#featured-article-1-text p,#featured-article-2 p,.one-column p,.one-column-article,.two-columns p{color:#1f212d}#cta-text p,#footer p,#hero-text p{color:#fff}#featured-article-2 h1,#featured-article-2 h2{color:#172d46}p{font-size:16px;line-height:24px;Margin-top:16px}#hero-text p{Margin-bottom:20px}#footer p{font-size:13px;line-height:20px}.speaker{font-size:14px;line-height:auto;margin:0}.italic{font-style:italic}.bold{font-weight:700}a[x-apple-data-detectors]{color:inherit!important;text-decoration:none!important;font-size:inherit!important;font-family:inherit!important;font-weight:inherit!important;line-height:inherit!important}a{color:#4A90E2}#footer a{color:#fff}.button-link-1,.button-link-2,.button-link-3,.button-link-4{padding:5px 24px;display:inline-block;text-decoration:none;text-align:center;font-weight:400;font-size:14px;font-family:Arial,sans-serif;-moz-border-radius:0;-webkit-border-radius:0;border-radius:0;line-height:30px}.button-link-1{color:#fff;background:#3683de;border:5px solid #00B388}.button-link-2{color:#1f212d;background:#00B388;border:5px solid #00B388}.button-link-3,.button-link-4{color:#1f212d;background:#fff}#logo-region-back,#subhead-region-back,.article-back,.fullwidthimage-region-back{background-color:#fff}.button-link-3{border:5px solid #ccc}.button-link-4{border:5px solid #eee}.button-radius{-moz-border-radius:0;-webkit-border-radius:0;border-radius:0}.padding-10{padding:10px}.padding-top-10{padding:10px 0 0}.padding-topbottom-10{padding:10px 0}.padding-20{padding:20px}.padding-top-20{padding:20px 0 0}.padding-topbottom-20{padding:20px 0}.padding-toprightleft-20{padding:20px 20px 0}.padding-rightleft-20{padding:0 20px}.padding-right-20{padding:0 20px 0 0}.padding-toprightleft-30{padding:30px 20px 0}.padding-toprightleft-35{padding:35px 20px 0}#cta-image img,#hero-image img,#logo img,.full-width-image img,.left-sidebar img,.right-sidebar img,.three-column img,.two-columns img{width:100%;height:auto}.two-columns img{max-width:260px}.three-column img{max-width:160px}.full-width-image img{max-width:600px}#logo img{max-width:193px}#social-media img{max-width:22px}#hero-image img{max-width:260px}#cta-image img{max-width:30px}.left-sidebar img,.right-sidebar img{max-width:60px}#featured-article-1-back,#featured-article-2-back{background-color:#eee}#cta-region-back{background-color:#333}#separator-1,#separator-2,#separator-3{font-size:5px;color:#fff;line-height:5px;mso-line-height-rule:exactly}#separator-1{background-color:#efefef}#separator-2{background-color:#ddd}#separator-3{background-color:#0063ae}.article-separator{font-size:4px;color:#fff;mso-line-height-rule:exactly;line-height:4px;border-bottom:4px solid #ccc}#footer-region-back{background-color:#1f212d}#featured-article-2-back .contents,.one-column .contents,.one-column-article .contents{text-align:left}.one-column-article .contents2,.two-columns{text-align:center}.two-columns{font-size:0}.two-columns .contents{font-size:14px;text-align:left}#two-columns-featured,.three-column{text-align:center;font-size:0;padding-top:10px;padding-bottom:10px}#logo,#social-media{width:100%;max-width:300px;display:inline-block;vertical-align:bottom}#cta-image,#cta-text{width:100%;display:inline-block;vertical-align:middle}#cta-text{max-width:500px}#cta-image{max-width:100px}#cta-image-align{text-align:center}#featured-article-1-image,#featured-article-1-text{max-width:300px}.three-column .column{max-width:200px}.three-column .contents{font-size:14px;text-align:center}@media screen and (max-width:400px){.three-column .column,.two-columns .column,.two-columns img{max-width:100%!important}#social-media img{max-width:22px!important}#cta-image img{max-width:30px!important}.three-column img{max-width:50%!important}}@media screen and (min-width:401px) and (max-width:620px){.three-column .column{max-width:33%!important}.two-columns .column{max-width:50%!important}}.outer,.webkit{max-width:600px}#hero-region-back{background-color:red}.wrapper{width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}.outer{Margin:0 auto;width:100%}#hero-image,#hero-text{max-width:300px}</style>
</head>
<body style="Margin:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:100%;width: 100%;background-color:#EBEAEA;" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="width: 100%;border-spacing:0;font-family:Arial, sans-serif;background-color:#EBEAEA;">
  


<!-- START HEADER -->
    <tr>
      <td class="one-column-article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
            <tr>
            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
            <![endif]-->
            <table class="outer" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family: Arial, sans-serif;Margin:0 auto;width:100%;max-width:600px;background: #EBEAEA;" >
              <tr>
                <td class="one-column-article" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;" >
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
                    <tr>
                      <td class="contents" style="width:100%;padding-top:0px;padding-bottom:0;padding-right:10px;padding-left:17px;text-align:left;" >
                        <p style="width: 100%;max-width:600px;color: #EBEAEA;font-size:7px;line-height:1.3;text-align: left;">Featuring: <?php echo $featuredHeadline[3] . " - " . $featuredHeadline[4]; ?></p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </div>
        </center>
      </td>
    </tr>
    <!-- END HEADER -->
    
   <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="20" width="100%" style="font-size:20px;line-height:1px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER -->
    <!-- START LOGO -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td width="100%" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <a href="https://www.hpe.com/us/en/insights.html?jumpid=em_fn8ktqmji1_AID-510204404&dimid=EMID_%%_subscriberkey%%" style="display: block;width: 100%;max-width: 395px;"><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/1/logoHead.png" alt="Enterprise.nxt - Weekly Digest" style="display: block;width: 100%;max-width: 395px;"></a>
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END LOGO -->
    <!-- START DATE -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;padding-bottom: 0px;padding-left: 20px;padding-right: 20px;" >
              <tr>
                <td>
                  <p style="color: #898989;Margin: 0; margin: 0;Margin-bottom: 10px;margin-bottom: 10px;text-align: center;font-size: 12px;font-family:Arial, sans-serif;"><?php echo $newsletterDate; ?></p>
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    <!-- END DATE -->
    <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="40" width="100%" style="font-size:40px;line-height:40px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER -->
    
   
  
 
<!-- ARTICLE 01 - IMAGE -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td width="100%" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <a href="<?php echo $featuredArticle[1] . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="display: block;width: 100%;max-width: 600px;"><img src="<?php echo $imagesPath . $newsletterNumber . "_featured_1.jpg";?>" style="display: block;width: 100%;max-width: 600px;" alt="<?php echo $featuredHeadline[1]; ?>
" /></a>
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END IMAGE -->
    <!-- ARTICLE 01 - TEXT -->
    <tr>
      <td class="one-column-article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
            <tr>
            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
            <![endif]-->
             <table class="outer" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family: Arial, sans-serif;Margin:0 auto;width:100%;max-width:600px;background: #ffffff;" >
              <tr>
                <td class="one-column-article" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;" >
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
                    <tr>
                      <td class="contents" style="width:100%;padding-top:0px;padding-bottom:15px;padding-right:10px;padding-left:17px;text-align:left;" >
                        <a href="<?php echo $featuredArticle[1] . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="text-decoration:none;">
                        <span style="font-family: Arial, sans-serif;font-size: 11px;color: #6B6B6B;display: block;"><?php echo $featuredCategory[1]; ?></span>
                        <h2 style="font-family: Arial, sans-serif;font-size: 22px;line-height: 1;color: #000000;Margin-bottom: 10px;margin-bottom: 10px;Margin-top: 10px;margin-top: 10px;"><?php echo $featuredHeadline[1]; ?></h2>
                        </a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </div>
        </center>
      </td>
    </tr>
    <!-- END ARTICLE 01 -->
    <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="15" width="100%" style="font-size:15px;line-height:15px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER -->


<!-- BANNER - IMAGE -->
     <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td width="100%" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <a href="<?php echo $newsletterReport . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="display: block;width: 100%;max-width: 600px;"><img src="<?php echo $imagesPath . $newsletterNumber . "_report.jpg";?>" style="display: block;width: 100%;max-width: 600px;" alt="<?php echo $report1Headline; ?>" /></a>
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- BANNER IMAGE -->
    <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="15" width="100%" style="font-size:15px;line-height:15px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER -->



<?php
for ($i = 2; $i <= $featuredArticles; $i++) {
?>

<!-- ARTICLE - IMAGE -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td width="100%" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <a href="<?php echo $featuredArticle[$i] . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="display: block;width: 100%;max-width: 600px;"><img src="<?php echo $imagesPath . $newsletterNumber . "_featured_" . $i . ".jpg";?>" style="display: block;width: 100%;max-width: 600px;" alt="<?php echo $featuredHeadline[$i]; ?>
" /></a>
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END IMAGE -->
    
    <!-- ARTICLE - TEXT -->
    <tr>
      <td class="one-column-article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
            <tr>
            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
            <![endif]-->
             <table class="outer" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family: Arial, sans-serif;Margin:0 auto;width:100%;max-width:600px;background: #ffffff;" >
              <tr>
                <td class="one-column-article" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;" >
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
                    <tr>
                      <td class="contents" style="width:100%;padding-top:0px;padding-bottom:15px;padding-right:10px;padding-left:17px;text-align:left;" >
                        <a href="<?php echo $featuredArticle[$i] . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="text-decoration:none;">
                        <span style="font-family: Arial, sans-serif;font-size: 11px;color: #6B6B6B;display: block;"><?php echo $featuredCategory[$i]; ?></span>
                        <h2 style="font-family: Arial, sans-serif;font-size: 22px;line-height: 1;color: #000000;Margin-bottom: 10px;margin-bottom: 10px;Margin-top: 10px;margin-top: 10px;"><?php echo $featuredHeadline[$i]; ?></h2>
                        </a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </div>
        </center>
      </td>
    </tr>
    <!-- END ARTICLE -->
    
    <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="15" width="100%" style="font-size:15px;line-height:15px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER -->

<?php
    }
?>

<?php if ($newsletterReportBottom != "no"){ ?>
<!-- BANNER - IMAGE -->
     <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td width="100%" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <a href="<?php echo $newsletterReportMiddle . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="display: block;width: 100%;max-width: 600px;"><img src="<?php echo $imagesPath . $newsletterNumber . "_reportMiddle.jpg";?>" style="display: block;width: 100%;max-width: 600px;" alt="<?php echo $report2Headline; ?>" /></a>
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- BANNER IMAGE -->
    <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="15" width="100%" style="font-size:15px;line-height:15px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER -->
<?php } ?>

<!-- START ONE COLUMN ARTICLE -->
    <tr>
      <td class="one-column-article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
            <tr>
            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
            <![endif]-->
            <table class="outer" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family: Arial, sans-serif;Margin:0 auto;width:100%;max-width:600px;background: #ffffff;" >
              <tr>
                <td class="one-column-article" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;" >
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
                    <tr>
                      <td class="contents" style="width:100%;padding-top:20px;padding-bottom:0px;padding-right:20px;padding-left:20px;text-align:left;" >
                        <h2 style="font-family: Arial, sans-serif;Margin: 0;font-size: 24px;color: #000000;border-bottom-width: 3px;border-bottom-style: solid;border-bottom-color: #000000;line-height: 2.5;">Articles you can’t miss:</h2>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </div>
        </center>
      </td>
    </tr>
    <!-- END ONE COLUMN ARTICLE -->

<!-- START TWO COLUMN, IMAGE LEFT/TEXT RIGHT -->
    <tr>
      <td class="one-column-article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
            <tr>
            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
            <![endif]-->
            <table class="outer" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family: Arial, sans-serif;Margin:0 auto;width:100%;max-width:600px;background: #ffffff;" >
              <tr>
                <td class="one-column-article" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;" >
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, Arial;" >
                    <tr>
                      <td class="padding-top-10" style="padding-top: 0px;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;" >
                        <!--[if (gte mso 9)|(IE)]>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family: Arial, sans-serif;" >
                        <tr>
                        <td width="100%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                        <![endif]-->
                        <div class="column" style="width:100%;display:inline-block;vertical-align:top;" >
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family: Arial, sans-serif;" >
                          
                          

<?php
for ($i = 1; $i <= $latestArticles; $i++) {
?>


<!-- Latest articles -->
                            <tr>
                              <td class="padding-toprightleft-2x0" style="padding-top: 15px;padding-bottom:0;padding-right:20px;padding-left: 20px;" >
                                <table class="contents" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family: Arial, sans-serif;width:100%;font-size:14px;text-align:left;" >
                                  <tr>
                                    <td width="110" class="padding-right-20" valign="top" style="padding-top:0px;padding-bottom:<?php if ($i < $latestArticles){ ?>15px<?php } else { ?>40px<?php } ?>;padding-right:20px;padding-left:0px;<?php if ($i < $latestArticles){ ?>border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #CDD0D1;<?php } ?>" >
                                      <a href="<?php echo $latestArticle[$i] . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="border-width:0;width:100%;height:auto;max-width:260px;"><img src="<?php echo $imagesPath . $newsletterNumber . "_latest_" . $i . ".jpg";?>" width="110" alt="<?php echo $latestHeadline[$i]; ?>" style="border-width:0;width:100%;height:auto;max-width:260px;" /></a>
                                    </td>
                                    <td valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;<?php if ($i < $latestArticles){ ?>border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #CDD0D1;<?php } ?>" >
                                      <a href="<?php echo $latestArticle[$i] . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="text-decoration: none;">
                                        <span style="font-family: Arial, sans-serif;font-size: 11px;color: #6B6B6B;display: block;"><?php echo $latestCategory[$i]; ?></span>
                                        <h2 style="font-family: Arial, sans-serif;font-size: 18px;line-height: 1.1;color: #000000;Margin-bottom: 10px;margin-bottom: 10px;Margin-top: 6px;margin-top: 6px;"><?php echo $latestHeadline[$i]; ?></h2>
                                      </a>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <!-- Latest articles -->
<?php
}
?>


 </table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
                        </td><td width="100%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                        <![endif]-->
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </div>
        </center>
      </td>
    </tr>
    <!-- END TWO COLUMN, IMAGE LEFT/TEXT RIGHT -->
    <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="15" width="100%" style="font-size:15px;line-height:15px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER -->
    <!-- BANNER - IMAGE -->
     <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td width="100%" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <a href="<?php echo $newsletterReportBottom . "&dimid=EMID_%%_subscriberkey%%"; ?>" style="display: block;width: 100%;max-width: 600px;"><img src="<?php echo $imagesPath . $newsletterNumber . "_reportBottom.jpg";?>" style="display: block;width: 100%;max-width: 600px;" alt="<?php echo $report3Headline; ?>" /></a>
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- BANNER IMAGE -->
      
      <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="15" width="100%" style="font-size:15px;line-height:15px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER --> 


    <!--CHAT STARTS-->  
      <body style="min-width:640px;margin: 0 0 0 0;" link="#003366" vlink="#003366" alink="#003366" text="#000000">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                
                
                
                
                
<table width="600" cellspacing="0" cellpadding="0" border="0" align="center">
   <tbody>
      <tr><td height="0" style="line-height:0px;font-size:0px;padding:0;margin:0;max-height:0px;"><a name="eiel1701458"><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/xImage.gif" width="1" height="0" style="display:block" alt="" /></a></td></tr>
      <tr>
         <td>
            <table width="600" cellspacing="0" cellpadding="0" border="0" align="center">
               <tbody>
                  <tr>
                     <td width="20" style="line-height:0px;font-size:0px;"><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/xImage.gif" width="20" height="1" alt="" style="display:block; border:0;" /></td>
                     <td align="center">
                        <table width="560" cellspacing="0" cellpadding="0" border="0" align="center">
                           <tbody>
                              <tr>
                                 <td height="20" style="line-height:0px;font-size:0px;"><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/xImage.gif" width="1" height="20" alt="" style="display:block; border:0;" /></td>
                              </tr>
                              <tr>
                                 <td align="center">
                                    
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                       <tbody>
                                          <tr>
                                             
                                             <td height="28"><table cellspacing="0" cellpadding="0" border="0" align="center"><tr><td height="20" width="20"><a target="_blank" href="https://www.hpe.com/global/hpechat/index.html?jumpid=in_ebar%7Echat&chatsrc=em-en&ActivityID=510396711&AssetID=NA" alias="EM_IMG_B" ><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/Chat_black.png" width="28" height="28" alt="Sales chat" border="0" style="display:block; border:0; max-width:28px; max-height:28px;" /></a></td><td width="10"><img height="1" width="10" style="display:block; border:0;" alt="" src="x.gif" /></td><td valign="middle" align="left"><a style="font-family:arial;font-size:12px;color:#767676;text-decoration:none;" target="_blank" href="https://www.hpe.com/global/hpechat/index.html?jumpid=in_ebar%7Echat&chatsrc=em-en&ActivityID=510396711&AssetID=NA" alias="" >Sales chat</a></td></tr></table></td>
                                             
                                             
                                             <td height="28"><table cellspacing="0" cellpadding="0" border="0" align="center"><tr><td height="20" width="20"><a target="_blank" href="https://www.hpe.com/us/en/contact-hpe.html?jumpid=in_ebar%7Eemail&chatsrc=em-en&ActivityID=510396711&AssetID=NA" alias="EM_IMG_B" ><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/Contact_Us_black.png" width="28" height="28" alt="Contact sales" border="0" style="display:block; border:0; max-width:28px; max-height:28px;" /></a></td><td width="10"><img height="1" width="10" style="display:block; border:0;" alt="" src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/x.gif" /></td><td valign="middle" align="left"><a style="font-family:arial;font-size:12px;color:#767676;text-decoration:none;" target="_blank" href="https://www.hpe.com/us/en/contact-hpe.html?jumpid=in_ebar%7Eemail&chatsrc=em-en&ActivityID=510396711&AssetID=NA" alias="" >Contact sales</a></td></tr></table></td>
                                             
                                             
                                             <td height="28"><table cellspacing="0" cellpadding="0" border="0" align="center"><tr><td height="20" width="20"><a target="_blank" href="tel:6506875817" alias="EM_IMG_B" ><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/smallmobility.png" width="28" height="28" alt="Call" border="0" style="display:block; border:0; max-width:28px; max-height:28px;" /></a></td><td width="10"><img height="1" width="10" style="display:block; border:0;" alt="" src="x.gif" /></td><td valign="middle" align="left"><a style="font-family:arial;font-size:12px;color:#767676;text-decoration:none;" target="_blank" href="tel:6506875817">Call</a></td></tr></table></td>
                                             
                                             
                                             
                                          </tr>
                                       </tbody>
                                    </table>
                                    
                                 </td>
                              </tr>
                              <tr>
                                 <td height="20" style="line-height:0px;font-size:0px;"><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/xImage.gif" width="1" height="20" alt="" style="display:block; border:0;" /></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td width="20" style="line-height:0px;font-size:0px;"><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/2/xImage.gif" width="20" height="1" alt="" style="display:block; border:0;" /></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td width="600" height="1" bgcolor="#cecece" style="line-height:0px;font-size:0px;padding:0;margin:0;max-height:1px;"><img src="x.gif" width="600" height="1" alt="" style="display:block; border:0;padding:0;margin:0;max-height:1px;" /></td>
      </tr>
   </tbody>
</table>


            </td>
        </tr>
    </table>
</body>
      <!-- CHAT ENDS -->
      
    <!-- START SPACER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td height="40" width="100%" style="font-size:40px;line-height:40px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  &nbsp;
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END SPACER -->    
    <!-- START LOGO -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;" >
              <tr>
                <td width="100%" style="padding-top:0;padding-bottom:30px;padding-right:0;padding-left:0;" >
                  <a href="https://www.hpe.com/us/en/insights.html?jumpid=em_fn8ktqmji1_AID-510204404&dimid=EMID_%%_subscriberkey%%" style="display: block;width: 100%;max-width: 217px;text-align: center;margin: auto;"><img src="http://image.emailinfo.mail.hpe.com/lib/fe8f15747462017a7d/m/1/logoHPE.png" alt="Brought to you by HPE" style="display: block;width: 100%;max-width: 217px;"></a>
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    </tr>
    <!-- END LOGO -->
    <!-- START FOOTER -->
    <tr>
      <td class="article-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#EBEAEA;" >
        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
          <div class="webkit" style="max-width:600px;" >
            <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:Arial, sans-serif;padding-bottom: 60px;padding-left: 20px;padding-right: 20px;" >
              <tr>
                <td>
                  <p style="color: #888888;Margin: 0; margin: 0;Margin-bottom: 10px;margin-bottom: 10px;text-align: center;font-size: 11px;font-family:Arial, sans-serif; line-height:17px;">This email was sent to: <span style="color: #888888;">%%emailaddr%%</span></p>

                    
                  <p style="color: #888888;Margin: 0; margin: 0;Margin-bottom: 20px;margin-bottom: 20px;text-align: center;font-size: 11px;font-family:Arial, sans-serif; line-height:17px;">For more information regarding Hewlett Packard Enterprise's privacy policies and practices, <br>please visit our <a href="https://www.hpe.com/us/en/legal/privacy.html" style="color: #888888;">Privacy Statement</a> or contact us <a href="https://www.hpe.com/us/en/privacy/feedback-forms.html" style="color: #888888;">here</a>.<br> 3000 Hanover Street; 94304 Palo Alto; CA; United States of America.</p>
                    
                  <p style="color: #888888;Margin: 0; margin: 0;Margin-bottom: 10px;margin-bottom: 10px;text-align: center;font-size: 11px;font-family:Arial, sans-serif; line-height:17px;">Hewlett Packard Enterprise respects your privacy. Hewlett Packard Enterprise uses automatic data collection tools to personalize your experience. If you'd like to discontinue receiving e-mails from Hewlett Packard Enterprise regarding its products and services, offers and events and those of its partners' special offers and information, please click <a href="https://h41360.www4.hpe.com/unsubscribe-ent-nxt.php?country=US&language=US&e=%%=v(@encrypted_email)=%%&pid=%%jobid%%&dimid=EMID_%%_subscriberkey%%" style="color: #888888;">here</a> to unsubscribe.</p>        
                    <p style="color: #888888;Margin: 0; margin: 0;Margin-bottom: 10px;margin-bottom: 10px;text-align: center;font-size: 11px;font-family:Arial, sans-serif; line-height:17px;">© Copyright 2018 Hewlett Packard Enterprise Development LP.<br> The information contained herein is subject to change without notice.</p>
                  
                </td>
              </tr>
            </table>
          </div>
        </center>
      </td>
    <!-- END FOOTER -->
  </table>
</body>
</html>