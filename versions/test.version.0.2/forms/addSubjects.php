<?php
	
	/* Open a new db connection. Refer admin.php
   */
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
	
	if(!empty($_POST))
	{		
		$createSubjectTable="Create table IF NOT EXISTS subjects(
								id varchar(23) primary key,
								name varchar(100) unique,
								department varchar(50),
								sem int,
								date datetime) engine = innoDB";
		
		$createSubjectTable=mysql_query($createSubjectTable) or die(mysql_error());
		
		$createSubjectConfigTable="Create table IF NOT EXISTS subjectsconfig(
								id varchar(23),
								termwork int default '0',
								practical int default '0',
								practical_exam int default '0',
								tutorial int default '0',
								viva int default '0',
								total_marks int,
								date datetime,
								FOREIGN KEY (id) REFERENCES subjects(id)
								ON DELETE CASCADE) engine = innoDB";				
								
		$createSubjectConfigTable=mysql_query($createSubjectConfigTable) or die(mysql_error());
		
		if($_POST['subject']!="" && $_POST['semester']!="" && $_POST['department']!="")
		{
			
			$termWork=isCheckboxSet("termWork");
			$practicals=isCheckboxSet("practicals");
			$practicalExams=isCheckboxSet("practicalExams");
			$tutorials=isCheckboxSet("tutorials");
			$viva=isCheckboxSet("viva");
			
			if($termWork==1)
			{
				$termWorkString=reduceStringUnderscore($_POST['subject'])."_termwork_".reduceString($_POST['semester'])." int,";
			}else
			{
				$termWorkString="";
			}
			
			if($practicals==1)
			{
				$practicalsString=reduceStringUnderscore($_POST['subject'])."_practical_".reduceString($_POST['semester'])." int,";
				
			}else
			{
				$practicalsString="";
			}
			
			if($practicalExams==1)
			{
				$practicalExamsString=reduceStringUnderscore($_POST['subject'])."_practical_exam_".reduceString($_POST['semester'])." int,";
			}else
			{
				$practicalExamsString="";
			}
			
			if($tutorials==1)
			{
				$tutorialsString=reduceStringUnderscore($_POST['subject'])."_tutorial_".reduceString($_POST['semester'])." int,";
			}else
			{
				$tutorialsString="";
			}
			
			if($viva==1)
			{
				$vivaString=reduceStringUnderscore($_POST['subject'])."_viva_".reduceString($_POST['semester'])." int,";
			}else
			{
				$vivaString="";
			}
			
			
			$uniqueid=uniqid();
			
			$insertSubject="Insert into subjects(id,name,department,sem,date)
							values('$uniqueid','$_POST[subject]','$_POST[department]','$_POST[semester]',now())";		
							
			$insertSubject=mysql_query($insertSubject) or die(mysql_error());
			
			$insertSubjectConfig="Insert into subjectsconfig(id,termwork,practical,practical_exam,tutorial,viva,total_marks,date)
							values('$uniqueid','$termWork','$practicals','$practicalExams','$tutorials','$viva','$_POST[totalMarks]',now())";		
							
			$insertSubjectConfig=mysql_query($insertSubjectConfig) or die("$insertSubjectConfig"+mysql_error());
			
			$createMarksTable="Create table IF NOT EXISTS marks_".reduceString($_POST['department'])."_".$_POST['semester']."(
									id_no varchar(20) unique,
									$termWorkString
									$practicalExamsString
									$tutorialsString
									$vivaString
									".reduceStringUnderscore($_POST['subject'])."_theory int)";
			
			$createMarksTable=mysql_query($createMarksTable) or die(mysql_error());
			
			$alterMarksTable="ALTER TABLE marks_".reduceString($_POST['department'])."_".$_POST['semester']."
							ADD (	$termWorkString
									$practicalExamsString
									$tutorialsString
									$vivaString
									".reduceStringUnderscore($_POST['subject'])."_theory int)";						
			$alterMarksTable=mysql_query($alterMarksTable) or die(mysql_error()) ;						
			
			echo "success";
		}
	}
	
	mysql_close($con);//close connection
?>