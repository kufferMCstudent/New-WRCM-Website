<!DOCTYPE html>
<html lang = "en">

    <!-- The following code under the "head" tag is metadata for the website, basically stuff that makes the page more searchable -WM Uffer -->
    <head>
		<meta name = "description" content = "WRCM - The Radio Station that Rocks One Whole Block" />
        <meta name = "keywords" content = "WRCM, wrcm, We Are College Music, we are college music, Manhattan College, manhattan college, Manhattan, manhattan, college, College, Manhattan College radio, college radio, College radio, internet radio, radio" />
        <meta name="author" content = "Katherine Uffer" />
		<meta charset="utf-8" />
		<title>News and Reviews</title>  <!-- Tab Title -WM Uffer -->
        <link href = "images/favicon.png" rel = "icon" type = "image/gif"/> <!-- Icon in the Tab -WM Uffer -->
		<link type = "text/CSS" rel = "stylesheet" href = "style2.css"/>
	</head>  
    
    <body>

        <!-- The following code under class "header" is where the navigation menu goes -WM Uffer -->
        <div class = "header">

            <ul>
                <li>
                    <img id = "logo-mobile" src = "images/WRCMLogoBig.png" alt = "WRCM Logo">
                </li>
                <li class = "text">
                    <a href = "index.php">Home</a>
                </li>

                <li class = "text">
                    <a href = "aboutus.html">About Us</a>
                </li>

                <li class = "text">
                    <a href = "schedule.php">Schedule</a>
                </li>
                
                <li class = "text">
                    <a href = "news.php">News and Reviews</a>
                </li>
            </ul>

            <img id = "logo" src = "images/WRCMLogoBig.png" alt = "WRCM Logo">

            <p></p>

        </div>
            
        <!-- The following code under class "body" is where the content of the website goes -WM Uffer -->
        <div class = "body">

            </br>

            <h2>
                Manhattan College's One and Only Internet Radio Station
            </h2>

            </br>

            <h1>
                News and Reviews
            </h1>

            </br>

            <div class = "content">
<?php
            $listOfFiles = scandir("./news/");
            for($i = 2; $i < count($listOfFiles); $i++) //for every article in the news folder
            {
                $fullPath = "./news/{$listOfFiles[$i]}"; //create full local path for the article
                $origText = file_get_contents($fullPath); //get content of the file
                $theEnd = array(); //create an array in the global variable of information
                $information = explode("\n",$origText); //breaks text into individual lines
    ?>
            <div class = "article">
                <img class = "newsImg" src = "./images/news/<?=$listOfFiles[$i]?>.jpeg" alt = "Article Logo" >
                <h3>
                    <?= $information[0]?>
                </h3>
                <h4>
                    <?= $information[1]?>. <?= $information[2]?>
                </h4>
<?php
                for($j = 3; $j < count($information); $j++)
                {
?>
                <p>
                    <?= $information[$j] ?>
                </p>
<?php
                }
?>
            </div>

            <p style = "clear: right;"></p>
    <?php
            }
?>
            <a class = "button" href = "./submit-article.php">
                <div class = "button">
                    <h5>
                        Submit an Article Here
                    <h5>
                </div>
            </a>

            </div><!-- End of Content-->

        </div><!-- End of Body-->

        <!-- The following code under class "footer" is where credits and some navigation goes -WM Uffer -->
        <div class = "footer">
            <div class = "left">
                <h5>
                    WRCM - Manhattan College Radio
                </h5>
                <p>
                    <a href = "index.php">Home</a> </br>
                    <a href = "aboutus.html">About Us</a> </br>
                    <a href = "schedule.php">Schedule</a> </br>
                    <a href = "news.php">News and Reviews</a> </br>
                </p>
            </div>
            
            <div class = "right">
                <h5>
                    Mission Statement:
                </h5>
                <p>
                    WRCM is the student-run, independent radio station of Manhattan College. WRCM aims to build a community of creative, driven and passionate students that will enrich our campus by providing innovative content promoting diversity, tolerance and freedom of expression.
                </p>
            </div>
            
            <p style = "clear: both;">
            </p>
        </div>

    </body>
</html>