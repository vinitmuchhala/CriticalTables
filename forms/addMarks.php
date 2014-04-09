<?php
	
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	$indextableExists=checkTable('tableindex');
	
	$emptyrows=0;
	
	if(empty($_GET['studentpage']))
	{
		$page=1;
	}
	else
	{
		$page=$_GET['studentpage'];
	}
	
	$shown=false;
	
	$per_page = 5;//No of rows per page
	$start = ($page-1)*$per_page;//Get beginning row number for particular page
	$count=0;
	$countNew=0;
	$index=0;
		
	if($indextableExists!=0)
	{		
		if(isset($_GET['department']) && $_GET['department']!="")
		{
			if(isset($_GET['semester']) && $_GET['semester']!="")
			{
				/*if($_GET['semester']%2==0)
				{
					$year=ceil($_GET['semester']/2);
				}else
				{
					$year=ceil($_GET['semester']-($_GET['semester']/2));
				}*/
				
				
				
				$displayMarks="SELECT *
								FROM ".reduceString($_GET['department'])." AS dept
								LEFT JOIN marks_".reduceString($_GET['department'])."_".reduceString($_GET['semester'])." as marks ON dept.id_no = marks.id_no
								where dept.sem=$_GET[semester]";
								
				$displayMarks=mysql_query($displayMarks) or die(mysql_error());
				
				$describeMarksTable="describe marks_".reduceString($_GET['department'])."_".reduceString($_GET['semester'])."";
				
				$describeMarksTable=mysql_query($describeMarksTable) or die(mysql_error());
				
				$describeMarksTableCount=mysql_num_rows($describeMarksTable);
				
				
				echo "<table>
						<thead>";
				
				
				echo"<tr>
						<th>Name</th>";
				
				while($column=mysql_fetch_array($describeMarksTable))	
				{
					if($column[0]!="ID" && $column[0]!="entrydate")
					{
						$columnData=str_replace("_"," ",$column[0]);
						$columnData=str_replace($_GET['semester'],"",$columnData);
						echo "<th><div class='last-word'>".$columnData."</div></th>";
					}
				}
				
					echo "</tr>";				
					
				echo "<tbody>";
				
				$countRows=0;		
				while($row=mysql_fetch_array($displayMarks))
				{		
						
						echo "<tr>";
								echo "<td>".$row[0]." ".$row[1]." ".$row[2]."</td>";
								echo "<td>".$row[5]."</td>";					
							for($countRows=12;$countRows<($describeMarksTableCount+11);$countRows++)
							{
								if($row[$countRows]!=null)
								{
									echo "<td>".$row[$countRows]."</td>";
								}
								else
								{
									echo "<td><input type='text'></td>";
								}
							}
	
						echo "</tr>";
						
				}
				
				
						
				echo	"</tbody>
					</table>";	
				
				
				
				/*Pagination*/
				echo "<ul id='pagination'>";
					
					if(isset($_GET['studentpage']))
					{
						if($_GET['studentpage']>1)
						{	
							echo '<li id="prev"><a href="?page=Manage Students&studentpage='.($_GET['studentpage']-1).'">&lt;</a></li>';
						}
					}
						
					for($i=1; $i<=ceil($countNew/$per_page); $i++)
					{
						if(empty($_GET['studentpage']))
						{
							if($i==1)
							{
								echo '<li class="active" id="'.$i.'"><a href="?page=Manage Students&studentpage='.$i.'">'.$i.'</a></li>';
							}
							else
							{
								echo '<li id="'.$i.'"><a href="?page=Manage Students&studentpage='.$i.'">'.$i.'</a></li>';
							}
						} 
						else if($i==$_GET['studentpage'])
						{
							echo '<li class="active" id="'.$i.'"><a href="?page=Manage Students&studentpage='.$i.'">'.$i.'</a></li>';
						}
						else
						{
							echo '<li id="'.$i.'"><a href="?page=Manage Students&studentpage='.$i.'">'.$i.'</a></li>';
						}
					}
					
					if(isset($_GET['studentpage']))
					{
						if($_GET['studentpage']<$i-1)
						{
							echo '<li id="next"><a href="?page=Manage Students&studentpage='.($_GET['studentpage']+1).'">&gt;</a></li>';
						}
					}
					else
					{
						if(ceil($count/$per_page)>1)
						{
							echo '<li id="next"><a href="?page=Manage Students&studentpage=2">&gt;</a></li>';
						}
					}
						
				echo "</ul>";
			}
			else
			{
				echo "Please select a semester";
			}
		}
		else
		{
			echo "Please select a department";
		}
	}		
	else
	{
		echo "<p>No Student in the database</p>";
	}
	
	
	mysql_close($con); //closes connection
	
?>