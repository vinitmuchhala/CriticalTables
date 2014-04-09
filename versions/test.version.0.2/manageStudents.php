<!--manage students-->
<div id="manage-students">
        
        <h3>Add Students</h3>
        
        <!--mini module container-->
        <article class="white mini-module-container">
                
                <form action="forms/registerStudent.php" method="post" id="registerStudent">

                        <p><label for="fname">First Name</label><input type="text" id="fname" name="fname"></p>
                        <p><label for="mname">Middle Name</label><input type="text" id="mname" name="mname"></p>
                        <p><label for="lname">Last Name</label><input type="text" id="lname" name="lname"></p>
                        <p><label for="dateofbirth">Date of Birth</label><input type="text" id="dateofbirth" name="dateofbirth"></p>
                        <p><label for="id_no">ID No</label><input type="text" id="id_no" name="id_no"></p>
                        <p><label for="mobile">Mobile</label><input type="text" id="mobile" name="mobile"></p>
                        <p><label for="sem">Semester</label><select id="sem" name="sem"><option value="">Choose Semester</option><option value="1">First Sem</option><option value="3">Third Sem</option><option value="5">Fifth Sem</option><option value="7">Seveth Sem</option></select></p>
                        <p id="get-table-index"><label for="department">Department:</label><?php $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";$path .= "/forms/getDepartmentIndex.php";include($path);
                        ?></p>
                        <p><label for="gender">Gender</label><select id="gender" name="gender"><option value="">Choose Gender</option><option>Male</option><option>Female</option></select></p>
                        
                        <p><input type="submit" value="SUBMIT" class="green"> <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span></p>
                        
                </form>
                
        </article><!--mini module container-->
        
        
        <h3 id="studentList">Students List <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span></h3>
        
        <!--Display Student List Over Here-->
        <article id="displayStudent" class="displayTable">
                                
            
            <?
                   $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
                   $path .= "/forms/displayStudent.php";
                   include_once($path);
            ?>
                            
        </article>
        
</div><!--manage students-->