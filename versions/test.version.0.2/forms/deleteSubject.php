<?php

	// Include includes.php which has a list of included files. Refer admin.php
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
	$path .= "/includes/includes.php";
	include_once($path);
	
	
	$id=$_GET['subject'];
		
	$deletesubject="Delete from subjects where id='$id'";//subjectIndex query
	
	$deletesubject=mysql_query($deletesubject);//run the query
			
	echo "Subject Deleted";		
				

?>