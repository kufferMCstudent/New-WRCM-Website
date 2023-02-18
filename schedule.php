<!DOCTYPE html>
<html lang = "en">

    <!-- The following code under the "head" tag is metadata for the website, basically stuff that makes the page more searchable -WM Uffer -->
    <head>
		<meta name = "description" content = "WRCM - The Radio Station that Rocks One Whole Block" />
        <meta name = "keywords" content = "WRCM, wrcm, We Are College Music, we are college music, Manhattan College, manhattan college, Manhattan, manhattan, college, College, Manhattan College radio, college radio, College radio, internet radio, radio" />
        <meta name="author" content = "Katherine Uffer" />
		<meta charset="utf-8" />
		<title>Schedule</title>  <!-- Tab Title -WM Uffer -->
        <link href = "images/favicon.png" rel = "icon" type = "image/gif"/> <!-- Icon in the Tab -WM Uffer -->
		<link type = "text/CSS" rel = "stylesheet" href = "style2.css"/>
        
	</head>  

    <?php
        function take_in($info) //function created so that all variables that are unused after this process are removed once the process is done
        {
            global $information; //the final array that stores all of the information
            $lines = explode("\n",$info); //breaks text into individual lines
            for($i = 0; $i < count($lines); $i++)
            {
                $information[] = explode("|", $lines[$i]); //break lines into individual data
            }
        }
    
        function time_to_text($hour) // function that will turn the military time version of the hour to a string AM/PM version
        {
            global $time_var;
            $time_var = (int)$hour;

            if ($time_var == 0) //if 12am
            {
                $time_var = 12 . "am";
            }
            else if ($time_var == 12) //if 12pm
            {
                $time_var = 12 . "pm";
            }
            else if ($hour < 13)
            {
                $time_var = $time_var . "am";
            }
            else
            {
                $time_var = (int)$hour % 12; //to change from military to normal
                $time_var = $time_var . "pm";
            }
        }

    date_default_timezone_set("America/New_York"); //set to correct timezone

    //$hour = (int)date("H"); //to get the current hour in military time

    //$dayof = date("l"); //get the day of the week
    ?>
    
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
                Weekly Schedule Fall 2022
            </h1>

            </br>

            <div class = "content">

                <input type="text" id = "filterInput" placeholder="Search...">
<?php
                $weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
                foreach ($weekdays as $dayof)
                {
                    $DAY = "schedule/{$dayof}.txt"; //turn day of the week into the correcponding .txt file name
                    $origText = file_get_contents($DAY); //get schedule for the day
                    $information = array(); //multidimensional array that holds all of the information
                    take_in($origText);
                    $counter = 0;
?>
                <div class = "schedule">
                    <h5>
                        <?= $dayof?>
                    </h5> 
<?php
                    
                    foreach($information as $info) // to print full schedule
                    {    
                        if($info[2] == "WRCM After Hours")
                        {
                            continue;
                        }
                        else
                        {
                            time_to_text($info[0]);
                            $start_time = $time_var;
                            time_to_text($info[1]);
                            $end_time = $time_var;
?>
                <div class = "show">
                    <h3>
                        <?= $info[2]?>
                    </h3>
<?php
                            //need to split up which images are being lazy loaded and which ones arent.
                            //Lazy Loading all images (starting with ones already on screen) was leading to no images being loaded
                            if($counter > 2)
                            {
?>
                    <img data-src = "images/djs/<?= $info[4]?>" alt = "<?= $info[2]?> Logo">
<?php
                            }
                            else
                            {
?>
                    <img src = "images/djs/<?= $info[4]?>" alt = "<?= $info[2]?> Logo">
<?php
                            }
?>
                    <h4 class = "person">
                        with <?= $info[3]?>
                    </h4>
                    <h4>
                        from <?=$start_time?> - <?=$end_time?>
                    </h4>
                    <p>
                        <?= $info[5]?>
                    </p>
                    <hr>
                    </br>   
<?php
                        }
?>
                        </div> <!-- end of Show -->
        <?php
                    }
?>
                    </div>
<?php
                }
?>
            <p style="clear:both;"></p>

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
                    <a href = "news.html">News and Reviews</a> </br>
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

        <script src = "searchBar.js"></script>
        <script src = "lazyLoad.js"></script>

    </body>
</html>