<?php
	
	/* Open a new db connection. Refer admin.php
   */
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	
	$userid=$_POST['id_no'];//Get ID number and store it in variable $userid
	
	$userid=strtoupper($userid);//Uppercase
	
	$tableName=$_POST['department'];//Store the department input value into $tableName variable
	
	$dept=$tableName;
	
	$date=$_POST['dateofbirth'];
	
	$date=dateFormatYearFirst($date); // join them together
	
	$tableName=strtolower($tableName); //lowercase
	
	$tableName=preg_replace(': :', '', $tableName); //remove whitespace
	
	//Insert data into appropriate database based on whichever value was input into $tableName;
	$insertStudentTable="INSERT INTO $tableName (fname, mname,lname,id_no,dept,sem,d_o_b,mobile,gender)
						VALUES
						('$_POST[fname]','$_POST[mname]','$_POST[lname]','$userid','$dept','$_POST[sem]','$date','$_POST[mobile]','$_POST[gender]')";

	$insertStudentTable=mysql_query($insertStudentTable) or die(mysql_error());//run query
	
	$dbStatus="success";
	
	echo $dbStatus;
	
	mysql_close($con);//close connection
?>