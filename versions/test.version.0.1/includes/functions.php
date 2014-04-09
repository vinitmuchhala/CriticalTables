<?php
	
	//Function to check whether database table exists or not
	function checkTable($table)
	{
		global $db_name;
		$check="SELECT COUNT(*)
				FROM information_schema.tables 
				WHERE table_schema = '$db_name'
				AND table_name = '$table'";
	
		$check=mysql_query($check);
				
		$fetch_check=mysql_fetch_row($check);
		
		return $fetch_check[0];
	}
	
	function checkRows($table)
	{
		$check="SELECT COUNT(*)
				FROM $table";
	
		$check=mysql_query($check);
				
		$fetch_check=mysql_fetch_row($check);
		
		return $fetch_check[0];
	}
	
	function reduceString($string)
	{
		$string=strtolower($string); //Lowercase
		$string=preg_replace(': :', '', $string);
		return $string;
	}
?>