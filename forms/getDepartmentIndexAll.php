<?php
   
   /* Open a new db connection. Refer admin.php
   */	
   $path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
   $path .= "/includes/includes.php";
   include_once($path);
	
	$indextableExists=checkTable('tableindex');
	
	if($indextableExists!=0)
	{
		echo '<select id="department" name="department">';
		echo '<option value="">Choose Department</option>';
		echo '<option value="all">All Departments</option>';
		
		$result = mysql_query('select table_col from tableindex');
		if (!$result) {
			die('Query failed: ' . mysql_error());
		}		
		
		$info=array(); //declaring array
		
		//Refer: http://php.net/manual/en/function.mysql-fetch-row.php
		while($info=mysql_fetch_row($result))
		{
			echo '<option value="'.(string)$info[0].'">'.(string)$info[0].'</option>'."\n"; //Option value gets $infoVal (i.e. lowercase and without whitespace) and the select box content gets the normal string (typecasted).
		}
		
		mysql_free_result($result); //frees the result
		
		echo '</select>';
	
	}
	else
	{
		echo "You have not added any department yet";
	}
	
	
?>