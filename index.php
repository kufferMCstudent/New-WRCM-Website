<!DOCTYPE html>
<html lang = "en">

    <!-- The following code under the "head" tag is metadata for the website, basically stuff that makes the page more searchable -WM Uffer -->
    <head>
		<meta name = "description" content = "WRCM - The Radio Station that Rocks One Whole Block" />
        <meta name = "keywords" content = "WRCM, wrcm, We Are College Music, we are college music, Manhattan College, manhattan college, Manhattan, manhattan, college, College, Manhattan College radio, college radio, College radio, internet radio, radio" />
        <meta name="author" content = "Katherine Uffer" />
		<meta charset="utf-8" />
		<title>WRCM</title>  <!-- Tab Title -WM Uffer -->
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

    $hour = (int)date("H"); //to get the current hour in military time

    $dayof = date("l"); //get the day of the week
    $DAY = "schedule/{$dayof}.txt"; //turn day of the week into the correcponding .txt file name

    $origText = file_get_contents($DAY); //get schedule for the day
    $information = array(); //multidimensional array that holds all of the information
    take_in($origText);
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

            <h1>
                <span class = "bold">W</span>e a<span class = "bold">R</span>e <span class = "bold">C</span>ollege <span class = "bold">M</span>usic
            </h1>

            </br>

            <h2>
                Manhattan College's One and Only Internet Radio Station
            </h2>

            </br>

            <div id = "stream">
                <audio controls="" name="media">
                        <source src="https://wrcmstream01.manhattan.edu/wrcm" type="audio/mp4">
                        <em>Sorry, your browser doesn't support HTML5 audio.</em>
                </audio>
            </div>

            </br>

            <div class = "content">
<?php
                $count = 0;
            foreach($information as $info) // for loop to print all information on page
            {
                if( (int)$info[0] < $hour && $hour < (int)$info[1]) //if programming is longer than an hour and running during current time
                {
                    $count++;
                    time_to_text($hour);
                    $start_time = $time_var;
                    time_to_text($info[1]);
                    $end_time = $time_var;
?>
                    <div class = "row">

                        <div class = "column1">
<?php
                    if($count == 1)
                    {
?>
                            <h3>
                                Live Now:
                            </h3>
<?php
                    }
?>
                        </div>
                        
                        <div class = "column3">
                            <img src = "images/djs/<?= $info[4]?>" alt = "<?= $info[2]?> Logo" width = "150">
                        </div>

                        <div class = "column2">
                            <h4>
                                <?= $info[2]?> with <?= $info[3]?> from <?=$start_time?> - <?=$end_time?>
                            </h4>
                        </div>

                    </div>
                    <p style = "clear:both"></p>
<?php
                }
                else // programming is 1 hour
                {
                            time_to_text($info[0]);
                            $start_time = $time_var;
                            time_to_text($info[1]);
                            $end_time = $time_var;
                    if ( (int)$info[0] < $hour ) //if the programming has passed
                    {
                        continue;
                    }
                    else //one hour show or future show
                    {
                        if($count == 1) //if already printed "Live Now"
                        {
                            $count++;
?>
                    <div class = "row">

                        <div class = "column1">
<?php
                            if($count == 2)
                            {
?>
                                <h3>
                                    Up Next:
                                </h3>
<?php
                            }
?>
                        </div>
                        
                        <div class = "column3">
                            <img data-src = "images/djs/<?= $info[4]?>" alt = "<?= $info[2]?> Logo" width = "150">
                        </div>

                        <div class = "column2">
                            <h4>
                                <?= $info[2]?> with <?= $info[3]?> from <?=$start_time?> - <?=$end_time?>
                            </h4>
                        </div>


                    </div>

                    <p style = "clear:both"></p>
<?php
                        }
                        else //if Live Show
                        {
                            $count++;
?>
                    <div class = "row">

                        <div class = "column1">
<?php
                    if($count == 1)
                    {
?>
                            <h3>
                                Live Now:
                            </h3>
<?php
                    }
?>
                        </div>
                        
                        <div class = "column3">
                            <img src = "images/djs/<?= $info[4]?>" alt = "<?= $info[2]?> Logo" width = "150">
                        </div>

                        <div class = "column2">
                            <h4>
                                <?= $info[2]?> with <?= $info[3]?> from <?=$start_time?> - <?=$end_time?>
                            </h4>
                        </div>

                    </div>
                    <p style = "clear:both"></p>
<?php
                        }
                    }
                }
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

        <script src = "lazyLoad.js"></script>

    </body>
</html>