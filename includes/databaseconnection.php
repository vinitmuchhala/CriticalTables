<?php

	$host="mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/"; // Host name
	$username="critical"; // Mysql username
	$password="1234"; // Mysql password
	$db_name="critical_db"; // Database name
	
	// Connect to server and select databse.
	$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	
	error_reporting(E_ALL);

?>
