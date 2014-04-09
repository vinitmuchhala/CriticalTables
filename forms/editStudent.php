<?php
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	include_once($path);
?>
<html>
<head>
<meta charset="utf-8">
<title>Critical Table</title>
</head>

<body>
				<?php 
					if(!empty($_GET))
					{
				?>
                <form action="processEditStudent.php" method="get" id="editStudent">
                    
                    <?php $year=$_GET['year'];
					
					if($year==1){
						$yearString="First";
					}else if($year==2){
						$yearString="Second";
					}else if($year==3){
						$yearString="Third";
					}else if($year==4){
						$yearString="Fourth Year";
					} ?>
                    
                    <p><label for="fname">First Name</label><input type="text" id="fname" name="fname" value="<?php echo $_GET["fname"]; ?>"></p>
                    <p><label for="mname">Middle Name</label><input type="text" id="mname" name="mname" value="<?php echo $_GET["mname"]; ?>"></p>
                    <p><label for="lname">Last Name</label><input type="text" id="lname" name="lname" value="<?php echo $_GET["lname"]; ?>"></p>
                    <p><label for="dateofbirth">Date of Birth</label><input type="text" id="dateofbirth" name="dateofbirth" value="<?php echo $_GET["d_o_b"]; ?>"></p>
                    <p><label for="id_no">ID No:</label> <input type="hidden" id="id_no" name="id_no" value="<?php echo $_GET["id_no"]; ?>"><?php echo $_GET["id_no"]; ?></p>
                    <p><label for="mobile">Mobile</label><input type="text" id="mobile" name="mobile" value="<?php echo $_GET["mobile"]; ?>"></p>
					<p><label for="email">email</label><input type="text" id="email" name="email" value="<?php echo $_GET["email"]; ?>"></p>
                    <p><label for="year">Year:</label> <!--<input name="year" type="hidden" value="<?php /*echo $year;*/ ?>">--> <?php echo $yearString ?> </p>
                    <!--getTableIndex.php included here to get the dropdown (selectbox) after fetching Department names from tableindex-->
                    <p id="get-table-index"><label for="department">Department:</label><input name="department" type="hidden" value="<?php echo $_GET['department']; ?>"> <?php echo $_GET['department']; ?></p>
                    
                    <p><label for="gender">Gender</label><select id="gender" name="gender" ><option value="<?php echo $_GET['gender']; ?>">Choose Gender</option><option>Male</option><option>Female</option></select></p>
                    
                    <p><input type="submit" value="Submit"></p>
                        
                </form>
                
                <?php 
				
					}else
					{
						echo "No student selected to edit.";
					}
					
				 ?>
        
</body>
</html>