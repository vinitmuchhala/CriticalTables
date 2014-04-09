<?php

	$host="localhost"; // Host name
	$username="rahulpar_cri"; // Mysql username
	$password="helloworld"; // Mysql password
	$db_name="rahulpar_critical"; // Database name
	
	// Connect to server and select databse.
	$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	
	error_reporting(E_ALL);

?>