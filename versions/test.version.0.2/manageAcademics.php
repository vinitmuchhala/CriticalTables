<!--manage academics-->
<div id="manage-academics">

		<!--add delete subjects-->
        <h3>Add Subjects</h3>
        
        <!--mini module container-->
        <div class="white mini-module-container clearfix">
                
                <form action="forms/addSubjects.php" method="post" id="addSubjects">

                        <p><label for="subject">Subject Name</label><input type="text" id="subject" name="subject"></p>
                        
                        <p><label for="department">Department:</label><?php $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";$path .= "/forms/getDepartmentIndex.php";include_once($path);?></p>
                        
                        <p><label for="semester">Semester</label><select id="semester" name="semester">
                                <option value="">Choose Semester</option>
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
                        
                        <p><label for="totalMarks">Total Theory Marks:</label><span class="twothirtypixel"><input type="text" id="totalMarks" name="totalMarks" maxlength="3" style="width: 26px;"></span></p>
                        
                        <p><label for="termWork">Term Work:</label><span class="twothirtypixel"><input type="checkbox" id="termWork" name="termWork[]" value="1"></span></p>
                        
                        <p><label for="practicals">Practicals:</label><span class="twothirtypixel"><input type="checkbox" id="practicals" name="practicals[]" value="1"></span></p>
                        
                        <p><label for="tutorials">Tutorials:</label><span class="twothirtypixel"><input type="checkbox" id="tutorials" name="tutorials[]" value="1"></span></p>
                        
                        <p><label for="practicalExams">Practical Exams:</label><span class="twothirtypixel"><input type="checkbox" id="practicalExams" name="practicalExams[]" value="1"></span></p>
                        
                        <p><label for="vivas">Vivas:</label><span class="twothirtypixel"><input type="checkbox" id="vivas" name="vivas[]" value="1"></span></p>
                        
                        <p><input type="submit" value="SUBMIT" class="green"> <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span></p>
                        
                </form>
                
                <!--seventy percent width-->
                <article id="subjects-display" class="seventy-percent-width clearfix">
                		
                        <h4><br>List of Subjects</h4>
                        
                        <?php
                            $path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
                            $path .= "/forms/displaySubject.php";
                            include_once($path);
                    	?>
                
                </article><!--seventy percent width-->
                
        </div><!--mini module container-->
        <!--add delete subjects-->
       
        <!--add marks-->
        <h3 id="marksList" class="clearfix">Add Marks <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span>
        
        <span class="float-right">
		
		<?php
		 $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";$path .= "/forms/getDepartmentIndex.php";include($path);
		echo '  <select id="semester" name="semester">
				<option value="">Choose Semester</option>
				<option value="1">First Sem</option>
				<option value="2">Second Sem</option>
				<option value="3">Third Sem</option>
				<option value="4">Fourth Sem</option>
				<option value="5">Fifth Sem</option>
				<option value="6">Sixth Sem</option>
				<option value="7">Seventh Sem</option>
				<option value="8">Eight Sem</option>
			</select>';
		?>
        </span></h3>
        
        <!--Display Student List Over Here-->
        <article id="addMarks" class="displayTable">
        
			<?
               $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
               $path .= "/forms/addMarks.php";
               include_once($path);
            ?>
        
        </article><!--mini module container-->
       <!--add marks-->
        
</div><!--manage academics-->