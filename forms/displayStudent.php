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
	
	$per_page = 5;//No of rows per page
	$start = ($page-1)*$per_page;//Get beginning row number for particular page
	$count=0;
	$countNew=0;
	$index=0;
	
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
				
				$infoValArray[$index]=$infoVal;
				
				$displayStudentComplete=mysql_query("Select * from $infoVal");
				
				$count = mysql_num_rows($displayStudentComplete);
				
				$countNew+=$count;
				
				++$index;				
				
			}
			else
			{
				$emptyrows++;
			}
			
		}
		if(isset($infoValArray))
		{
			//Declaring Student String Variable
			$displayStudentString="";
			
			//Generation the union query for all tables.
			for($loop=0;$loop<sizeof($infoValArray);$loop++)
			{
			
				$displayStudent[$loop]='Select * from '.$infoValArray[$loop].'';
				if($loop!=(sizeof($infoValArray)-1))
				{			
					$displayStudentString.=$displayStudent[$loop]." union ";
				}
				else
				{
					$displayStudentString.=$displayStudent[$loop]." ";
				}
				
			}
			
			
			$displayStudentString.=" ORDER BY id_no limit $start,$per_page"; //Appending limit to the union query for pagination
		
			
			$displayStudentString=mysql_query($displayStudentString);
		}
		
		if($emptyrows==mysql_num_rows($result))
		{
			echo "<p>No Student in the database</p>";
		}
		else
		{
			//Loop begins-To print the student table
			while ($row = mysql_fetch_array($displayStudentString, MYSQL_ASSOC)) 
			{
					
					if($shown==false)
					{
						
							echo"
									<tr>
											<th>ID No</th>
											<th>Name</th>
											<th>Middle Name</th>
											<th>Surname</th>
											<th>Email</th>
											<th>Ph. No</th>
											<th>Semester</th>
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
					
					//Year Mapping
					$sem=$row['sem'];
					
					if($sem==1){
						$sem="First";
					}else if($sem==2){
						$sem="Second";
					}else if($sem==3){
						$sem="Third";
					}else if($sem==4){
						$sem="Fourth";
					}else if($sem==5){
						$sem="Fifth";
					}else if($sem==6){
						$sem="Sixth";
					}else if($sem==7){
						$sem="Seventh";
					}else if($sem==8){
						$sem="Eight";
					}//Year Mapping
					
					$dateRow=dateFormatDateFirst($row['d_o_b']); //Calling the dateFormat function
					
						
						echo '<tr>';
						echo '<td class="id_no">'.$row['id_no'].'</td>
							<td class="fname">'.$row['fname'].'</td>
							<td class="mname">'.$row['mname'].'</td>
							<td class="lname">'.$row['lname'].'</td>
							<td class="email">'.$row['email'].'</td>
							<td class="mobile">'.$row['mobile'].'</td>
							<td class="sem">'.$sem.'</td>
							<td class="department">'.$row['dept'].'</td>
							<td class="gender">'.$row['gender'].'</td>
							<td class="dateofbirth">'.$dateRow.'</td>
							<td class="editCell"><a class="edit" title="Edit '.$row['fname'].' '.$row['lname'].' '.$row['id_no'].'" href="forms/editStudent.php?id_no='.$row['id_no'].'&fname='.$row['fname'].'&lname='.$row['lname'].'&email='.$row['email'].'&mobile='.$row['mobile'].'&department='.$row['dept'].'&gender='.$row['gender'].'&mname='.$row['mname'].'&d_o_b='.dateFormatDateFirst($row['d_o_b']).'&year='.$row['sem'].'"><img src="images/edit.png" alt="Edit"></a></td>
							<td class="deleteCell"><a class="delete" title="Delete '.$row['fname'].' '.$row['lname'].' '.$row['id_no'].'" href="forms/deleteStudent.php?id_no='.$row['id_no'].'&department='.$row['dept'].'"><img src="images/cross.png" alt="Delete"></a></td>';
						echo '</tr>';
						 
			}//Loop begins-To print the student table
			echo "</tbody></table>";
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
		
	}
	else
	{
		echo "<p>No Student in the database</p>";
	}
	
	
	mysql_close($con); //closes connection
	
?>