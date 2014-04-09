<?php

	// Include includes.php which has a list of included files. Refer admin.php
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	
	$id_no=$_GET['no'];
		
	$deleteStudent="Delete from announcements where id='$id_no'";//tableindex query
			
	$deleteStudent=mysql_query($deleteStudent) or die(mysql_error());//run the query
		
	echo "Announcement Deleted";		
				

?>