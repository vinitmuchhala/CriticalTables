<?php
	
	/* Open a new db connection. Refer admin.php
   */
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	$indextableExists=checkTable('tableindex');
	
	$emptyrows=0;
	
	if($_POST['title']!="" && $_POST['message']!="")
	{
	
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
			
			$createAnnouncementTable="create table if not exists announcements (
					id int AUTO_INCREMENT PRIMARY KEY,
					posted_by varchar(100),
					posted_at datetime,
					expires_in_days date,
					announcement_title varchar(200),
					content varchar(10000),
					department varchar(100),
					semester int,
					user_type int
					) engine=innoDb";
					
			$createAnnouncementTable=mysql_query($createAnnouncementTable) or die($createAnnouncementTable."<br>".mysql_error());
			
				
			$insertAnnouncement="insert into announcements(posted_by,posted_at,expires_in_days,announcement_title,content,department,semester,user_type)
			 values(
				'admin',
				now(),
				'".dateFormatYearFirst($_POST['date'])."',
				'$_POST[title]',
				'$_POST[message]',
				'$_POST[department]',
				'$_POST[semester]',
				'$_POST[userType]'
			)";			
				
			$insertAnnouncement=mysql_query($insertAnnouncement) or die($insertAnnouncement."<br>".mysql_error());
			
			echo "success";
		}
		else
		{
			echo "<p>No Student in the database</p>";
		}
	
	}
	
	mysql_close($con); //closes connection
	
?>