<?php
	
	/* Open a new db connection. Refer admin.php
   */
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
    $path .= "/includes/includes.php";
    include_once($path);
	
	$table=trim($_GET["deptName"]); //trims out whitespaces. Ref: http://php.net/manual/en/function.trim.php
	
	$dbstatus; //Declaring variable $dbStatus
	
	if($table!=""||$table!=null)
	{
		$normalTable=$table;//Takes the normal department name and inserts into table index. (eg: $normalTable=Information Technology and $table=informationtechnology upon strtolower and pref_replace
	
		$table=strtolower($table);//lowercase
		
		$table=preg_replace(': :', '', $table);//removes whitespaces
			
		$createIndex="CREATE TABLE IF NOT EXISTS tableindex(table_col varchar(35) PRIMARY KEY)";//tableindex query
		
		$createIndex=mysql_query($createIndex);//run the query
		
		//Creating student table based on department name
		$createStudentTable="CREATE TABLE IF NOT EXISTS $table(
					fname varchar(20) NOT NULL,
					mname varchar(20) NOT NULL,
					lname varchar(20) NOT NULL,
					email varchar(30) NOT NULL default 'inactive',
					password varchar(32) NOT NULL default 'helloworld',
					id_no varchar(12) PRIMARY KEY,
					dept text NOT NULL,
					year int(1) NOT NULL,
					d_o_b date NOT NULL,
					mobile varchar(10) NOT NULL,
					gender text NOT NULL)";
		
		$createStudentTable=mysql_query($createStudentTable); 		//run the query
		
		$insertIndex="INSERT INTO tableindex VALUES('$normalTable')";		//insert department name into tableindex
		
		$insertIndex=mysql_query($insertIndex);		//run the query

		
		$dbStatus="success";
	
		echo $dbStatus;		//return status

	}
	else
	{
		$dbStatus="failure";
		echo $dbStatus;		//return status
	}
	
	mysql_close($con); //close connection

?>