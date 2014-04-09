<?php
	
	//Function to check whether database table exists or not
	if(!function_exists('checkTable'))
	{
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
	}
	
	function checkRows($table)
	{
		error_reporting(E_ERROR | E_PARSE | E_NOTICE);
		
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
	
	function reduceStringUnderscore($string)
	{
		$string=strtolower($string); //Lowercase
		$string=preg_replace(': :', '_', $string);
		return $string;
	}
	
	function dateFormatYearFirst($date)
	{
		$date_array = explode("/",$date); // split the array
		$var_day = $date_array[0]; //day seqment
		$var_month = $date_array[1]; //month segment
		$var_year = $date_array[2]; //year segment
		$new_date_format = "$var_year-$var_month-$var_day";
		return $new_date_format;
	}
	
	function dateFormatDateFirst($date)
	{
		$date_array = explode("-",$date); // split the array
		$var_day = $date_array[2]; //day seqment
		$var_month = $date_array[1]; //month segment
		$var_year = $date_array[0]; //year segment
		$new_date_format = "$var_day/$var_month/$var_year";
		return $new_date_format;
	}
	
	function isCheckboxSet($name)
	{
		if(isset($_POST[$name]))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function getLastTwoDigits($string)
	{
		$length = strlen($string);
		$characters = 2;
		$start = $length - $characters;
		$string = substr($string , $start ,$characters);
		return $string; 
	}
	
	function convertMinutes2Hours($minutes) {
		$minutes = round($minutes); // assume full minutes
		$hours = floor($minutes / 60);
		$minutes = $minutes - ($hours * 60);
		return str_repeat('0', 2 - strlen($hours)) . $hours . ':' . str_repeat('0', 2 - strlen($minutes)) . $minutes;
	}
?>