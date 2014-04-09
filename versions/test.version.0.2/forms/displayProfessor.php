<?php
	
	/* Open a new db connection. Refer admin.php
   */
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	$indextableExists=checkTable('professors');
	
	$emptyrows=0;
	
	if(empty($_GET['professorpage']))
	{
		$page=1;
	}
	else
	{
		$page=$_GET['professorpage'];
	}
	
	$per_page = 5;//No of rows per page
	$start = ($page-1)*$per_page;//Get beginning row number for particular page
	$index=0;
	
	if($indextableExists!=0)
	{
		$count="select * from professors";
		$count=mysql_query($count);
		$count=mysql_num_rows($count);
				
		$result="select * from professors ORDER BY created desc limit $start,$per_page";
		$result = mysql_query($result) or die('Query failed: ' . mysql_error());
		
		if($count>0)
		{
			echo "<table>
					<thead>
					<tr>
						<th>ID No</th>
						<th>Name</th>
						<th>Middle Name</th>
						<th>Surname</th>
						<th>Email</th>
						<th>Ph. No</th>
						<th>Department</th>
						<th>Gender</th>
						<th>D.O.B</th>
						<th>Edit</th>
						<th>Del</th>
				</tr>
			</thead>
			<tbody>";
			
					while($row=mysql_fetch_array($result))
					{
						
						$dateRow=dateFormatDateFirst($row['d_o_b']); 
						
						echo '<tr>';
							echo '<td class="id_no">'.$row['id_no'].'</td>
								<td class="fname">'.$row['fname'].'</td>
								<td class="mname">'.$row['mname'].'</td>
								<td class="lname">'.$row['lname'].'</td>
								<td class="email">'.$row['email'].'</td>
								<td class="mobile">'.$row['mobile'].'</td>
								<td class="department">'.$row['dept'].'</td>
								<td class="gender">'.$row['gender'].'</td>
								<td class="dateofbirth">'.$dateRow.'</td>
								<td class="editCell"><a class="edit" title="Edit '.$row['fname'].' '.$row['lname'].' '.$row['id_no'].'" href="forms/editProfessor.php?id_no='.$row['id_no'].'&fname='.$row['fname'].'&lname='.$row['lname'].'&email='.$row['email'].'&mobile='.$row['mobile'].'&department='.$row['dept'].'&gender='.$row['gender'].'&mname='.$row['mname'].'&d_o_b='.dateFormatDateFirst($row['d_o_b']).'"><img src="images/edit.png" alt="Edit"></a></td>
								<td class="deleteCell"><a class="delete" title="Delete '.$row['fname'].' '.$row['lname'].' '.$row['id_no'].'" href="forms/deleteProfessor.php?id_no='.$row['id_no'].'&department='.$row['dept'].'"><img src="images/cross.png" alt="Delete"></a></td>';
						echo '</tr>';
					}
			
			echo "</tbody>
					</table>";
					
			//Loop begins-To print the professor table
				echo "</tbody></table>";
				echo "<ul id='pagination'>";
					
				if(isset($_GET['professorpage']))
				{
					if($_GET['professorpage']>1)
					{	
						echo '<li id="prev"><a href="?page=Manage Professors&professorpage='.($_GET['professorpage']-1).'">&lt;</a></li>';
					}
				}
					
				for($i=1; $i<=ceil($count/$per_page); $i++)
				{
					if(empty($_GET['professorpage']))
					{
						if($i==1)
						{
							echo '<li class="active" id="'.$i.'"><a href="?page=Manage Professors&professorpage='.$i.'">'.$i.'</a></li>';
						}
						else
						{
							echo '<li id="'.$i.'"><a href="?page=Manage Professors&professorpage='.$i.'">'.$i.'</a></li>';
						}
					} 
					else if($i==$_GET['professorpage'])
					{
						echo '<li class="active" id="'.$i.'"><a href="?page=Manage Professors&professorpage='.$i.'">'.$i.'</a></li>';
					}
					else
					{
						echo '<li id="'.$i.'"><a href="?page=Manage Professors&professorpage='.$i.'">'.$i.'</a></li>';
					}
				}
				
				if(isset($_GET['professorpage']))
				{
					if($_GET['professorpage']<$i-1)
					{
						echo '<li id="next"><a href="?page=Manage Professors&professorpage='.($_GET['professorpage']+1).'">&gt;</a></li>';
					}
				}
				else
				{
					if(ceil($count/$per_page)>1)
					{
						echo '<li id="next"><a href="?page=Manage Professors&professorpage=2">&gt;</a></li>';
					}
				}
					
			echo "</ul>";
		}
		else
		{
			echo "<p>No Professor in the database</p>";
		}
	}
		
	else
	{
		echo "<p>No Professor in the database</p>";
	}
	
	
	mysql_close($con); //closes connection
	
?>