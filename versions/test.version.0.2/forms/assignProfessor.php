<?php
	
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	$indextableExists=checkTable('tableindex');
	
		
	if($indextableExists!=0)
	{	
		$subjectName=$_POST['professorSubjectList'];
		$professorID=$_POST['professorList'];
		$assignProfessor="UPDATE timetable SET professor_assigned='$professorID' WHERE subject='$subjectName'";
		$assignProfessor=mysql_query($assignProfessor) or die(mysql_error());
		echo "success";
	}		
	else
	{
		echo "<p>No Department Added</p>";
	}
	
	
	mysql_close($con); //closes connection
	
?>