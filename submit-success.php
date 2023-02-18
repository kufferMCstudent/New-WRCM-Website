<!DOCTYPE html>
<html lang = "en">

    <!-- The following code under the "head" tag is metadata for the website, basically stuff that makes the page more searchable -WM Uffer -->
    <head>
		<meta name = "description" content = "WRCM - The Radio Station that Rocks One Whole Block" />
        <meta name = "keywords" content = "WRCM, wrcm, We Are College Music, we are college music, Manhattan College, manhattan college, Manhattan, manhattan, college, College, Manhattan College radio, college radio, College radio, internet radio, radio" />
        <meta name="author" content = "Katherine Uffer" />
		<meta charset="utf-8" />
		<title>Submit an Article</title>  <!-- Tab Title -WM Uffer -->
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
<?php
            $firstName = $_POST["fname"];
            $lastName = $_POST["lname"];
            $schoolEmail = $_POST["semail"];

            $data = $firstName." ".$lastName." ".$schoolEmail."\n";
            $saveLocation = "./submissions/".$firstName.",".$lastName."-Details.txt";
            file_put_contents($saveLocation, $data, FILE_APPEND);

            $fileName = $_FILES['file']['name'];
            $imageName = $_FILES['image']['name'];
            $fileSave = "./submissions/".$firstName.",".$lastName."-file";
            $imageSave = "./submissions/".$firstName.",".$lastName."-image";
            if(move_uploaded_file($_FILES['file']['tmp_name'], $fileSave) && (move_uploaded_file($_FILES['image']['tmp_name'], $imageSave)))
            {
?>
            <h1>
                Successfully Submited an Article
            </h1>

            </br>

            <div class = "content">
                <h3 class = "submit-conf">
                    Thank you for submitting an article for the WRCM News and Reviews page. An Executive Board member will screen your submission as soon as they can, and you will be emailed when your submission is approved (and your article goes live on the website!)
                </h3>

<?php
            }
            else
            {
?>
                <h1>
                    Error Submitting Article
                </h1>
            <div class = "content">
                <h3 class = "submit-conf">
                    Whoops! Looks like something went wrong with your file upload! Click the button below to try again. Try a different and/or smaller file format.
                </h3>
    <?php
            }
?>

            <div class = "button">
                <h5>
                    Submit Another Article Here
                </h5>
            </div>

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