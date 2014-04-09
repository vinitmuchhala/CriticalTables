<?php
   
   /* Open a new db connection. Refer admin.php
   */	
   $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
   $path .= "/includes/includes.php";
   include_once($path);
	
	$dateofbirth=dateFormatYearFirst($_GET['dateofbirth']);
	$value1=$_GET['id_no'];
	$value2=reduceString($_GET['department']);
	$updateQuery="UPDATE professors
				SET 
						fname='$_GET[fname]',
						mname='$_GET[mname]',
						lname='$_GET[lname]',
						id_no='$_GET[id_no]',
						d_o_b='$dateofbirth',
						mobile='$_GET[mobile]',
						gender='$_GET[gender]',
						email='$_GET[email]'
				WHERE
					id_no='$value1'";
									
	$updateQuery=mysql_query($updateQuery) or die(mysql_error());
	
	if(!isset($_GET['ajax']))
	{
		echo "Student Updated";
	}
	
?>