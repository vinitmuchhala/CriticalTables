<?php

	// Include includes.php which has a list of included files. Refer admin.php
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
	$path .= "/includes/includes.php";
	include_once($path);
	
	
	$department=$_GET['department'];
		
	$departmentReduced=reduceString($department); //Lowercase
		
	$deletedepartment="Delete from tableindex where table_col='$department'";//departmentIndex query
	
	$deletedepartment=mysql_query($deletedepartment);//run the query
	
	$deleteDepartmentTable="Drop table $departmentReduced";
			
	$deleteDepartmentTable=mysql_query($deleteDepartmentTable);//run the query
			
	echo "Department Deleted";		
				

?>