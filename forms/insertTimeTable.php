<?php

	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	$rows=$_POST['rows'];
	$columns=$_POST['columns'];
	
	$createTimeTable="create table if not exists timetable(
								subject varchar(100),
								lecture_start_time varchar(5),
								lecture_end_time varchar(5),
								day varchar(9),
								professor_assigned varchar(60),
								department varchar(100),
								sem int,
								date datetime
								)";							
	
	$createTimeTable=mysql_query($createTimeTable) or die(mysql_error());
	
	
	$isDataExisting="SELECT COUNT(1) FROM timetable WHERE department='$_POST[department]' and sem='$_POST[semester]'";
	
	//echo $isDataExisting;
	
	$isDataExisting=mysql_query($isDataExisting) or die(mysql_error());
	
	if($isDataExisting>0)
	{
		$deleteRow="delete from timetable WHERE department='$_POST[department]' and sem='$_POST[semester]'";
		$deleteRow=mysql_query($deleteRow) or die(mysql_error());
	}
								
	for($i=0;$i<$rows;$i++)
	{
		for($j=0;$j<$columns;$j++)
		{
			if(!empty($_POST['timeTable'.$i.$j]) & $i!=0 & $j!=0)
			{
				$hourPart = explode(':', $_POST['timeTable'.$i.'0']);
				
				$minutes=getLastTwoDigits($_POST['timeTable'.$i.'0']);
				
				$minutes+=$_POST['lectureDuration'];
				
				if($minutes>60)
				{
					$hour=convertMinutes2Hours($minutes);
					$hour = explode(':', $hour);
				}
				else
				{
					$hour=0;
				}
				
				$hour[0]+=$hourPart[0];
				
				$lecture_end_time=$hour[0].":".$hour[1];
				
				//echo "timeTable".$i.$j." : ".$_POST['timeTable'.$i.$j].$_POST['timeTable'.$i.'0'].$_POST['timeTable'.'0'.$j];
				$insertTimeTable="insert into timetable(subject,lecture_start_time,lecture_end_time,day,department,sem,date) values(
									'".$_POST['timeTable'.$i.$j]."',
									'".$_POST['timeTable'.$i.'0']."',
									'$lecture_end_time',
									'".$_POST['timeTable'.'0'.$j]."',
									'$_POST[department]',
									'$_POST[semester]',
									now())";
				
				echo $insertTimeTable."<br>";
				
				//echo $insertTimeTable;
				
				$insertTimeTable=mysql_query($insertTimeTable) or die(mysql_error());
				
			}
		}
	}

?>