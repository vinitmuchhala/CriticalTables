<?php
	
	/* Open a new db connection. Refer admin.php
   */
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
	
	$per_page = 10;//No of rows per page
	$start = ($page-1)*$per_page;//Get beginning row number for particular page
	$count=0;
	
	if($indextableExists!=0)
	{
		
		$result="select table_col from tableindex";
		$result = mysql_query($result);
		if (!$result) {
			die('Query failed: ' . mysql_error());
		}
		$info=array();
		$row=array();
		
		$shown=false;
		
		echo "<table><thead>";
				
		while($info=mysql_fetch_row($result))
		{
			$infoVal=strtolower($info[0]); //Lowercase
			$infoVal=preg_replace(': :', '', $infoVal); //Takes out whitespaces
			
			$departmentStudentExists=checkRows($infoVal);	
			
			
			if($departmentStudentExists!=0)
			{
									
				$displayStudent="Select *,DATE_FORMAT(d_o_b, '%e/%m/%Y') as formattedDate from $infoVal limit $start,$per_page";//tableindex query
				
				$displayStudent=mysql_query($displayStudent);//run the query
				
				$displayStudentComplete=mysql_query("Select * from $infoVal");
				
				$count+=$count;
				
				$count = mysql_num_rows($displayStudentComplete);
				
				while ($row = mysql_fetch_array($displayStudent, MYSQL_ASSOC)) 
				{
						
						if($shown==false)
						{
							
								echo"
										<tr>
												<th>ID No</th>
												<th>Name</th>
												<th>Surname</th>
												<th>Email</th>
												<th>Ph. No</th>
												<th>Year</th>
												<th>Department</th>
												<th>Gender</th>
												<th>D.O.B</th>
												<th>Edit</th>
												<th>Del</th>
										</tr>
								</thead>
								<tbody>";
								
							$shown=true;							
						}
						
						$year=$row['year'];
						
						if($year==1)
						{
							$year="First";
						}
						else if($year==2)
						{
							$year="Second";
						}
						else if($year==3)
						{
							$year="Third";
						}
						else if($year==4)
						{
							$year="Fourth Year";
						}
							
							echo '<tr>';
							echo '<td>'.$row['id_no'].'</td>
								<td>'.$row['fname'].'</td>
								<td>'.$row['lname'].'</td>
								<td>'.$row['email'].'</td>
								<td>'.$row['mobile'].'</td>
								<td>'.$year.'</td>
								<td>'.$row['dept'].'</td>
								<td>'.$row['gender'].'</td>
								<td>'.$row['formattedDate'].'</td>
								<td><a title="Edit '.$row['fname'].' '.$row['lname'].' '.$row['id_no'].'" href="forms/editStudent.php?id_no='.$row['id_no'].'&fname='.$row['fname'].'&lname='.$row['lname'].'&email='.$row['email'].'&mobile='.$row['mobile'].'&department='.$row['dept'].'&gender='.$row['gender'].'"><img src="images/edit.png" alt="Edit"></a></td>
								<td><a class="delete" title="Delete '.$row['fname'].' '.$row['lname'].' '.$row['id_no'].'" href="forms/deleteStudent.php?id_no='.$row['id_no'].'&department='.$row['dept'].'"><img src="images/cross.png" alt="Delete"></a></td>';
							echo '</tr>';
							 
				}
			}
			else
			{
				$emptyrows++;
			}
			
		}
		
		
		
		if($emptyrows==mysql_num_rows($result))
		{
			echo "<p>No Student in the database</p>";
		}
		else
		{
			echo "</tbody></table>";
			echo "<ul id='pagination'>";
				
				if(isset($_GET['studentpage']))
				{
					if($_GET['studentpage']>1)
					{	
						echo '<li class="prev" id="previous"><a href="?page=Manage Students&studentpage='.($_GET['studentpage']-1).'">Previous</a></li>';
					}
				}
					
				for($i=1; $i<=ceil($count/$per_page); $i++)
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
						echo '<li class="next" id="previous"><a href="?page=Manage Students&studentpage='.($_GET['studentpage']+1).'">Next</a></li>';
					}
				}
				else
				{
					if(ceil($count/$per_page)>1)
					{
						echo '<li class="next" id="previous"><a href="?page=Manage Students&studentpage=2">Next</a></li>';
					}
				}
					
			echo "</ul>";
		}
		
	}
	else
	{
		echo "<p>No Student in the database</p>";
	}
	
	
	mysql_close($con); //closes connection
	
?>