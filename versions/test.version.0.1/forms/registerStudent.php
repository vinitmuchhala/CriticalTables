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
	
	$date_array = explode("/",$date); // split the array
	$var_day = $date_array[0]; //day seqment
	$var_month = $date_array[1]; //month segment
	$var_year = $date_array[2]; //year segment
	$new_date_format = "$var_year-$var_month-$var_day"; // join them together
	
	//echo $new_date_format;
	
	$tableName=strtolower($tableName); //lowercase
	
	$tableName=preg_replace(': :', '', $tableName); //remove whitespace
	
	//Insert data into appropriate database based on whichever value was input into $tableName;
	$insertStudentTable="INSERT INTO $tableName (fname, mname,lname,id_no,dept,year,d_o_b,mobile,gender)
						VALUES
						('$_POST[fname]','$_POST[mname]','$_POST[lname]','$userid','$dept','$_POST[year]','$new_date_format','$_POST[mobile]','$_POST[gender]')";

	$insertStudentTable=mysql_query($insertStudentTable);//run query
	
	$dbStatus="success";
	
	echo $dbStatus;
	
	mysql_close($con);//close connection
?>