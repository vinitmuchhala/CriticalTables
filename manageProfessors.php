<!--manage professors-->
<div id="manage-professors">
        
        <h3>Add Professors</h3>
        
        <!--mini module container-->
        <article class="white mini-module-container">
                
                <form action="forms/registerProfessor.php" method="post" id="registerProfessor">

                        <p><label for="fname">First Name</label><input type="text" id="fname" name="fname"></p>
                        <p><label for="mname">Middle Name</label><input type="text" id="mname" name="mname"></p>
                        <p><label for="lname">Last Name</label><input type="text" id="lname" name="lname"></p>
                        <p><label for="dateofbirth">Date of Birth</label><input type="text" id="dateofbirth" name="dateofbirth"></p>
                        <p><label for="id_no">ID No</label><input type="text" id="id_no" name="id_no"></p>
                        <p><label for="mobile">Mobile</label><input type="text" id="mobile" name="mobile"></p>
                        <p><label for="department">Department:</label><?php $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";$path .= "/forms/getDepartmentIndex.php";include_once($path);
                        ?></p>
                        <p><label for="gender">Gender</label><select id="gender" name="gender"><option value="">Choose Gender</option><option>Male</option><option>Female</option></select></p>
                        
                        <p><input type="submit" value="SUBMIT" class="green"> <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span></p>
                        
                </form>
                
        </article><!--mini module container-->
        
        <h3>Assign Subjects to Professors</h3>
        
        <!--mini module container-->
        <article class="white mini-module-container">
        	
            <form action="forms/assignProfessor.php" method="post" id="assignProfessor">
            
        	<?php
				
				$indextableExists=checkTable("tableindex");
				
				if($indextableExists!=0)
				{

					$dprt="select table_col from tableindex";
					$sem=1;
					
					$dprt=mysql_query($dprt) or die(mysql_error());
					
					echo "<p><select id='professorSubjectList' name='professorSubjectList'><option value=''>Choose Subject</option>";
					
					while($department=mysql_fetch_array($dprt))
					{
						echo "<optgroup label='".$department[0]."'>";

						for($sem=1;$sem<9;$sem++)
						{
							$result="SELECT sub.id,name,tutorial,practical
							FROM subjects sub, subjectsconfig config
							WHERE sub.id = config.id and sem='$sem' and department='".$department[0]."'";
							
							//echo $result."<br>";
							
							$result=mysql_query($result) or die(mysql_error());
							
							while($subject=mysql_fetch_array($result))
							{
								echo "<option>".$subject['name']."</option>";
								
								if($subject['tutorial']==1)
								{
									echo "<option>".$subject['name']." Tutorial</option>";
								}
								if($subject['practical']==1)
								{
									echo "<option>".$subject['name']." Practical</option>";
								}
								
							}
							
						}
						
						echo "</optgroup>";
						
					}
					
					echo "</select></p>";
					
					echo "<p><select id='professorList' name='professorList'> <option value=''>Choose Professor</option>";
					
					$professorList="select fname,lname,id_no from professors";
					
					$professorList=mysql_query($professorList) or die(mysql_error());
					
					while($professor=mysql_fetch_array($professorList))
					{
						echo "<option value='".$professor['id_no']."'>".$professor['fname']." ".$professor['lname']."</option>";
					}
					
					echo "</select>";
					
					echo '<p><input type="submit" class="green" value="ASSIGN PROFESSOR"><span class="loader"><img alt="Loading..." class="loader-img" src="images/loader.gif" style="display: none;"><img alt="Success" class="loader-success" src="images/tick.png" style="display: none;"></span></p>';
				
				}
				else
				{
					echo "No Department Added";
				}
			?>
	            <article class="clearfix displayProfessorAssigned" id="subjects-display">
                		
                        <h4><br>List of Subjects</h4>
                
                        <?php
                            $path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
                            $path .= "/forms/displayProfessorAssigned.php";
                            include($path);
                        ?>   
                        
				</article>                
                
            </form>
        		
        
        </article><!--mini module container-->
        
        
        <h3 id="professorList">Professors List <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span></h3>
        
        <!--Display Professor List Over Here-->
        <article id="displayProfessor" class="displayTable">
        
				<?
                   $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
                   $path .= "/forms/displayProfessor.php";
                   include_once($path);
                ?>
                             
                                        
        </article>
        
</div><!--manage professors-->