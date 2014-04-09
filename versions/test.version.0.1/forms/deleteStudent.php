<?php

	// Include includes.php which has a list of included files. Refer admin.php
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	
	$result="select table_col from tableindex";
	$result = mysql_query($result);
	if (!$result) {
		die('Query failed: ' . mysql_error());
	}
	
	$id_no=$_GET['id_no'];
	
	$department=$_GET['department'];
		
	$department=reduceString($department); //Lowercase
		
	$deleteStudent="Delete from $department where id_no='$id_no'";//tableindex query
			
	$deleteStudent=mysql_query($deleteStudent);//run the query
		
	echo "User Deleted";		
				

?>