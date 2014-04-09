<?php
	
	/* Open a new db connection. Refer admin.php
   */
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	$indextableExists=checkTable('announcements');
	
	$emptyrows=0;
	
	if(empty($_GET['announcepage']))
	{
		$page=1;
	}
	else
	{
		$page=$_GET['announcepage'];
	}
	
	$per_page = 5;//No of rows per page
	$start = ($page-1)*$per_page;//Get beginning row number for particular page
	$index=0;
	
	if($indextableExists!=0)
	{
		$count="select * from announcements";
		$count=mysql_query($count);
		$count=mysql_num_rows($count);
				
		$result="SELECT `id` , `posted_by` , date( posted_at ) as posted_at , `expires_in_days` , `announcement_title` , `content` , `department` , `semester`, `user_type`
				FROM `announcements`
				ORDER BY posted_at DESC";
		$result = mysql_query($result) or die('Query failed: ' . mysql_error());
		
		if($count>0)
		{
			echo "<table>
					<thead>
					<tr>
						<th>Posted On</th>
						<th>Expires On</th>
						<th>Posted By</th>
						<th>Department</th>
						<th>Semester</th>
						<th>Title</th>
						<th>Content</th>
						<th>Status</th>
						<th>User Type</th>
						<th>Delete</th>
				</tr>
			</thead>
			<tbody>";

			
					while($row=mysql_fetch_array($result))
					{
						
						$postedAt=dateFormatDateFirst($row['posted_at']); 
						$expiresIn=dateFormatDateFirst($row['expires_in_days']); 

						if($row['user_type']==2)
						{
							$user_type="Professor";

						}
						else
						{
							$user_type="Student";
						}
						
						
						if(gmdate("Y-m-d", (time() + 19800))==$row['expires_in_days'])
						{
							$announcementStatus="Expired";
						}
						else
						{
							$announcementStatus="Ongoing";
						}
						
						echo '<tr>';
							echo '<td class="id_no">'.$postedAt.'</td>
								<td class="fname">'.$expiresIn.'</td>
								<td class="mname">'.$row['posted_by'].'</td>
								<td class="mname">'.$row['department'].'</td>
								<td class="lname">'.$row['semester'].'</td>
								<td class="email">'.$row['announcement_title'].'</td>
								<td class="mobile">'.substr($row['content'],0,50).'</td>
								<td>'.$announcementStatus.'</td>
								<td>'.$user_type.'</td>
								<td class="deleteCell"><a class="delete" title="Delete Announcement?" href="forms/deleteAnnouncement.php?no='.$row['id'].'"><img src="images/cross.png" alt="Delete"></a></td>';
						echo '</tr>';
					}
			
			echo "</tbody>
					</table>";
					
			//Loop begins-To print the professor table
				echo "</tbody></table>";
				echo "<ul id='pagination'>";
					
				if(isset($_GET['announcepage']))
				{
					if($_GET['announcepage']>1)
					{	
						echo '<li id="prev"><a href="?page=Announcements&announcepage='.($_GET['announcepage']-1).'">&lt;</a></li>';
					}
				}
					
				for($i=1; $i<=ceil($count/$per_page); $i++)
				{
					if(empty($_GET['announcepage']))
					{
						if($i==1)
						{
							echo '<li class="active" id="'.$i.'"><a href="?page=Announcements&announcepage='.$i.'">'.$i.'</a></li>';
						}
						else
						{
							echo '<li id="'.$i.'"><a href="?page=Announcements&announcepage='.$i.'">'.$i.'</a></li>';
						}
					} 
					else if($i==$_GET['announcepage'])
					{
						echo '<li class="active" id="'.$i.'"><a href="?page=Announcements&announcepage='.$i.'">'.$i.'</a></li>';
					}
					else
					{
						echo '<li id="'.$i.'"><a href="?page=Announcements&announcepage='.$i.'">'.$i.'</a></li>';
					}
				}
				
				if(isset($_GET['announcepage']))
				{
					if($_GET['announcepage']<$i-1)
					{
						echo '<li id="next"><a href="?page=Announcements&announcepage='.($_GET['announcepage']+1).'">&gt;</a></li>';
					}
				}
				else
				{
					if(ceil($count/$per_page)>1)
					{
						echo '<li id="next"><a href="?page=Announcements&announcepage=2">&gt;</a></li>';
					}
				}
					
			echo "</ul>";
		}
		else
		{
			echo "<p>No Announcement Added</p>";
		}
	}
		
	else
	{
		echo "<p>No Announcement Added</p>";
	}
	
	
	mysql_close($con); //closes connection
	
?>