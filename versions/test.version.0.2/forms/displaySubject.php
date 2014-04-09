<?php 

// Include includes.php which has a list of included files. Refer admin.php
$path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
$path .= "/includes/includes.php";
include_once($path);

$indextableExists=checkTable('subjects');

if($indextableExists!=0)
{
	$indextableRowExists=checkRows('subjects');
	
	if($indextableRowExists!=0)
	{
	
		$selectDepartment = mysql_query('select distinct department from subjects ORDER BY DEPARTMENT') or die(mysql_error());
		
		
		$info=array(); //declaring array
		
		//while 1
		while($department=mysql_fetch_array($selectDepartment))
		{
				echo '<ul class="clearfix">';
				
			$departmentCurrent=$department['department'];
			
			echo "<li><h4>".$departmentCurrent."</h4></li>";
			
			$selectSem=mysql_query("select distinct sem from subjects where department='$departmentCurrent' ORDER BY SEM") or die(mysql_error());
			
			//while 2
			while($sem=mysql_fetch_array($selectSem))
			{
				$subjectNo=1;
				
				$semCurrent=$sem['sem'];
				
				echo "<li class='sem'>Sem ".$semCurrent.":</li>";
				
				$selectName = mysql_query("select department,name,id from subjects where department='$departmentCurrent' and sem='$semCurrent' ORDER BY date") or die(mysql_error());
				
				//while 3	
				while($info=mysql_fetch_array($selectName))
				{
					echo '<li class="rounded-list-display"><a class="delete" title="Delete Subject - '.$info['name'].'" href="forms/deleteSubject.php?subject='.$info['id'].'">'.$subjectNo.'. '.$info['name'].'</a></li>'."\n"; 
					
					$subjectNo++;
					
				}//while 3
				
			}//while 2
			
			
		echo "</ul>";
		
		}//while 1
		
		
		mysql_free_result($selectDepartment); //frees the result
		mysql_free_result($selectName);
	}
	else
	{
		echo "<p>No Subject listed yet. Please add a Subject</p>";
	}
}
else
{
	echo "<p>No Subject listed yet. Please add a Subject</p>";
}
							   
?>        