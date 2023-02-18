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

            <h1>
                Submit an Article
            </h1>

            </br>

            <div class = "content">

            <form action="submit-success.php" method="post" enctype="multipart/form-data">
                <label for="fname">First Name:</label>
                <input type="text" placeholder="First Name" id="fname" name="fname" required>
                
                </br>
                </br>
                
                <label for="lname">Last Name:</label>
                <input type="text" placeholder="Last Name" id="lname" name="lname" required>
                
                </br>
                </br>

                <label for="semail">School Email:</label>
                <input type="text" placeholder="Manhattan College Email" id="semail" name="semail" required>
                
                </br>
                </br>

                <label for="file">Attatch Article:</label>
                <input type="file" id="file" name="file" required>
                
                </br>
                </br>

                <label for="image">Attatch Header Image:</label>
                <input type="file" id="image" name="image" required>
                
                </br>
                </br>

                <input type="submit" id="submit" value="Submit">
                
                </br>
                </br>
            </form>

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