<?php
	session_start();
	
	$haveCookie=0;
/*	
if(isset($_COOKIE['login']))
{
	$login=$_COOKIE['login'];
	$password=$_COOKIE['password'];
	$user_type=$_COOKIE['user-type'];
	$haveCookie=1;
}
else
{
	$_SESSION['noRedirect']=1;
	header("location: home.php");
}*/
$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
   $path .= "/includes/includes.php";
   include_once($path);
	
	//Start session
	//Select database
	$db = mysql_select_db('critical_db');
	if(!$db) {
		die("Unable to select database");
	}
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	if($haveCookie!=1)
	{
		$login = clean($_POST['login']);
		$password = clean($_POST['password']);
		$user_type=$_POST['user-type'];
		
	}
	//Create query
	
	if($user_type==1)
	{
		
		$result="select table_col from tableindex";
		
		$result=mysql_query($result) or die($result."<br>".mysql_query());
		
		while($row=mysql_fetch_row($result))
		{
			$row1=reduceString($row[0]);
		
			$qry="SELECT * FROM $row1 WHERE id_no='$login' AND password='$password'";
			//password='".md5($password)."' if we are using md5 encyption 
			echo $qry;
			$result1=mysql_query($qry) or die(mysql_error());
			//Check whether the query was successful or not
			if($result1) {
				if(mysql_num_rows($result1) == 1) {
					//Login Successful
					session_regenerate_id();
					$tablename = mysql_fetch_assoc($result1);
					$_SESSION['SESS_MEMBER_ID'] = $tablename['id_no'];
					$_SESSION['SESS_FIRST_NAME'] = $tablename['fname'];
					$_SESSION['SESS_LAST_NAME'] = $tablename['lname'];
					$_SESSION['member-type']=$_POST['user-type'];
					$_SESSION['department'] = $row[0];
					$_SESSION['semester']=$tablename['sem'];
					session_write_close();
					if(isset($_POST['rememberme']))
					{
						$expire=time()+60*60*24*30;
						setcookie("login", $_POST['login'], $expire);
						setcookie("password",$_POST['password'],$expire);
						setcookie("user-type",$_POST['user-type'],$expire);
					}
					header("location: index.php");
					exit();
				}else {
					//Login failed
				echo "WRONG";
				}
			}
		
		}
	}
	if($user_type==2)
	{
		$result="select * from professors WHERE id_no='$login' AND password='$password'";
		
		echo $result;

		$result=mysql_query($result) or die(mysql_error());
		
		if($result) {
			if(mysql_num_rows($result) == 1) {
				//Login Successful
				session_regenerate_id();
				$tablename = mysql_fetch_assoc($result);
				$_SESSION['SESS_MEMBER_ID'] = $tablename['id_no'];
				$_SESSION['SESS_FIRST_NAME'] = $tablename['fname'];
				$_SESSION['SESS_LAST_NAME'] = $tablename['lname'];
				$_SESSION['department'] = $tablename['dept'];
				$_SESSION['member-type']=$_POST['user-type'];
				session_write_close();
				if(isset($_POST['rememberme']))
				{
					$expire=time()+60*60*24*30;
					setcookie("login", $_POST['login'], $expire);
					setcookie("password",$_POST['password'],$expire);
					setcookie("user-type",$_POST['user-type'],$expire);
				}
				header("location: index.php");
				exit();
			}else {
				//Login failed
			echo "WRONG";
			}
		}
	}
	
?>