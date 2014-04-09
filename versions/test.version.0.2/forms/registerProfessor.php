<?php
	
	/* Open a new db connection. Refer admin.php
   */
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	
	if($_POST['fname']!="" || $_POST['fname']!=null) {
	
		$createProfesorTable="CREATE TABLE IF NOT EXISTS professors(
						fname varchar(20) NOT NULL,
						mname varchar(20) NOT NULL,
						lname varchar(20) NOT NULL,
						email varchar(30) NOT NULL default 'inactive',
						password varchar(32) NOT NULL default 'helloworld',
						id_no varchar(12) PRIMARY KEY,
						dept text NOT NULL,
						d_o_b date NOT NULL,
						mobile varchar(10) NOT NULL,
						gender text NOT NULL,
						created datetime)";
			
		$createProfesorTable=mysql_query($createProfesorTable);
		
		$userid=$_POST['id_no'];//Get ID number and store it in variable $userid
		
		$userid=strtoupper($userid);//Uppercase
		
		$tableName=$_POST['department'];//Store the department input value into $tableName variable
		
		$dept=$tableName;
		
		$date=$_POST['dateofbirth'];
		
		$date=dateFormatYearFirst($date); // join them together
		
		$tableName=strtolower($tableName); //lowercase
		
		$tableName=preg_replace(': :', '', $tableName); //remove whitespace
		
		//Insert data into appropriate database based on whichever value was input into $tableName;
		$insertProfessorTable="INSERT INTO professors (fname, mname,lname,id_no,dept,d_o_b,mobile,gender,created)
							VALUES
							('$_POST[fname]','$_POST[mname]','$_POST[lname]','$userid','$dept','$date','$_POST[mobile]','$_POST[gender]',now())";
		
		$insertProfessorTable=mysql_query($insertProfessorTable) or die(mysql_error());//run query
		
		$dbStatus="success";
		
		echo $dbStatus;
	
	}
	
	mysql_close($con);//close connection
?>