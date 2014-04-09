<?php 

// Include includes.php which has a list of included files. Refer admin.php
$path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
$path .= "/includes/includes.php";
include_once($path);

$indextableExists=checkTable('tableindex');

if($indextableExists!=0)
{
	$indextableRowExists=checkRows('tableindex');
	
	if($indextableRowExists!=0)
	{
		$result = mysql_query('select table_col from tableindex');
		if (!$result) {
			die('Query failed: ' . mysql_error());
		}
		
		echo '<ul class="clearfix">';
		
		$info=array(); //declaring array
		
		//Refer: http://php.net/manual/en/function.mysql-fetch-row.php
		while($info=mysql_fetch_row($result))
		{
			echo '<li><a class="delete" title="Delete department - '.$info[0].'" href="forms/deleteDepartment.php?department='.$info[0].'">'.(string)$info[0].'</a></li>'."\n"; //Option value gets $infoVal (i.e. lowercase and without whitespace) and the select box content gets the normal string (typecasted).
		}
		
		echo "</ul>";
		
		mysql_free_result($result); //frees the result
	
	}
	else
	{
		echo "<p>No department listed yet. Please add a department</p>";
	}
}
else
{
	echo "No department listed yet. Please add a department";
}
							   
?>        