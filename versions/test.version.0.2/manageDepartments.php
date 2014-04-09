<!--manage departments-->
<div id="manage-departments">
        
        
        <!--add delete departments-->
        <h3>Add &amp; Delete Departments</h3>
        
        <!--mini module container-->
        <div class="white mini-module-container">
                
                <form action="forms/departments.php" method="get" id="add-departments">

                        <p class="center"><input value="Enter Department Name" data-dafaultvalue="Enter Department Name"  class="large" type="text" id="deptName" name="deptName"> <input class="green submitBtn-margin-left" type="submit" value="SUBMIT"> <span class="loader"><img class="loader-img" src="images/loader.gif" alt="Loading..."></span></p>
                        
                </form>

                <article id="department-display">
                
                    <h4>Departments List - Click to Delete</h4>
                
                    <?php
                            $path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
                            $path .= "/forms/displayDepartment.php";
                            include_once($path);
                    ?>
                    
                </article>
                
                             
        </div><!--mini module container-->
        <!--add delete departments-->
        
        <!--Time Tables-->
        <h3>Time Tables</h3>
        
        <!--mini module container-->
        <div class="white mini-module-container">
        		
                <form action="forms/createTimeTable.php" method="get" id="createTimeTable">
                    
                    <p><label>Choose department</label><?php $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";$path .= "/forms/getDepartmentIndex.php";include_once($path);?></p>
                    
                    <p><label>Choose Semester</label><select id="semester" name="semester"><option value="">Choose Semester</option>
                            <option value="1">First Sem</option>
                            <option value="2">Second Sem</option>
                            <option value="3">Third Sem</option>
                            <option value="4">Fourth Sem</option>
                            <option value="5">Fifth Sem</option>
                            <option value="6">Sixth Sem</option>
                            <option value="7">Seventh Sem</option>
                            <option value="8">Eight Sem</option>
                    	</select>
                    </p>
                    
                    <p><label>Enter no. of working days a week</label><input type="text" id="days" name="days"/></p>
                    
                    <p><label>Enter daily start time(HHMM)</label><input type="text" name="sTime" id="sTime"/></p>
                    
                    <p><label>Enter daily end time(HHMM)</label><input type="text" name="eTime" id="eTime"/></p>
                    
                    <p><label>Enter the duration of lectures(Minutes)</label><input type="text" name="durLec" id="durLec"/></p>
                    
                    <p><label>Enter the no of breaks</label><input type="text" class="break" name="breakNo" id="breakNo"/></p>
                    
                    <p>Please enter all time fields in 24 hr time format</p>
                    
                    <p><input type="Submit" value="Proceed" class="green"/> <span class="loader"><img alt="Loading..." src="images/loader.gif" class="loader-img"></span></p>
                    
                </form>
                
                <article id="timeTable" class="clearfix">
                		
                </article>
        
        </div><!--mini module container-->
        
</div><!--manage departments-->