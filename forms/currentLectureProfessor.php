<?php
$path = $_SERVER['DOCUMENT_ROOT'] . "/critical_final";
$path .= "/includes/includes.php";
include_once($path);

$department = $_SESSION['department'];
$department = reduceString($department);
//$semester   = $_SESSION['semester'];
$whichday   = weekday(gmdate("w", (time() + 19800)));
$hours = gmdate("H", (time() + 19800));
//echo $hours;
$mins  = gmdate("i", (time() + 19800));
//echo $mins;
$get   = "select subject,lecture_start_time,lecture_end_time,id_no,fname, lname from timetable INNER JOIN professors ON timetable.professor_assigned = professors.id_no where department='$_SESSION[department]' and day='$whichday'";

//echo $get;

$get = mysql_query($get) or die(mysql_error());

$count = 1;
while ($row = mysql_fetch_array($get)) {
    $timestart = array();
    $timestart = (explode(':', $row['lecture_start_time']));
    $starthour = $timestart[0];
    $startmins = $timestart[1];
    $timeend   = array();
    $timeend   = (explode(':', $row['lecture_end_time']));
    $endhour   = $timeend[0];
    $endmins   = $timeend[1];
    
    if ($starthour * 60 + $startmins <= ($hours * 60 + $mins) & ($hours * 60 + $mins) < ($endhour * 60 + $endmins)) {
        $count = 0;
		
		echo "<img src='images/clock.png'> Current Lecture: ";
        echo $row['subject']." ";
        
        break;
    }
}
if ($count)
{
	echo "<img src='images/clock.png'>".$whichday;
    echo " - No lecture is ongoing";
}

function weekday($index)
{
    Switch ($index) {
        case 0: {
            $day = "Sunday";
            return $day;
            break;
        }
        case 1: {
            $day = "Monday";
            return $day;
            break;
        }
        case 2: {
            $day = "Tuesday";
            return $day;
            break;
        }
        case 3: {
            $day = "Wednesday";
            return $day;
            break;
        }
        case 4: {
            $day = "Thursday";
            return $day;
            break;
        }
        case 5: {
            $day = "Friday";
            return $day;
            break;
        }
        case 6: {
            $day = "Saturday";
            return $day;
            break;
        }
    }
}

?>