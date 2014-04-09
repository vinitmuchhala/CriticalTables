<!--announcements-->
<div id="announcements">
        
        <h3>Make a New Announcement</h3>
        
        <!--mini module container-->
        <article class="white mini-module-container">
                
                <form action="forms/makeAnnouncement.php" method="post" id="makeAnnouncement">

                        <p><label for="department">Department:</label><?php $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";$path .= "/forms/getDepartmentIndexAll.php";include_once($path);
                        ?></p>
                        <p><label for="semester">Semester:</label><select id="semester" name="semester">
                                <option value="">Choose Semester</option>
                                <option value="0">All Semesters</option>
                                <option value="1">First Sem</option>
                                <option value="2">Second Sem</option>
                                <option value="3">Third Sem</option>
                                <option value="4">Fourth Sem</option>
                                <option value="5">Fifth Sem</option>
                                <option value="6">Sixth Sem</option>
                                <option value="7">Seventh Sem</option>
                                <option value="8">Eight Sem</option>
                        </select></p>


                        <p><label for="userType">Choose Type:</label><select id="userType" name="userType">
                                <option value="">Choose Student or Professor</option>
                                <option value="1">Student</option>
                                <option value="2">Professor</option>
                                
                        </select></p>

                        
                        <p><label for="date">Exxpiry Date:</label><span class="date-span"><input id="date" data-datepicker="datepicker" class="small date" type="text" name="date" value="" /></span></p>
                        
                        <p><label for="title">Title:</label><input type="text" id="title" name="title" /></p>
                        
                        <p class="textarea"><label for="message">Content:</label><textarea id="message" name="message" class="form-text"></textarea></p>
                        
                        <p><input type="submit" value="SUBMIT" class="green"> <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span></p>
                        
                </form>
                
        </article><!--mini module container-->
        
        
        <h3 id="announcementList">Announcement List <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span></h3>
        
        <!--Display Announcement List Over Here-->
        <article id="displayAnnouncement" class="displayTable">
        
				<?
                   $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
                   $path .= "/forms/displayAnnouncement.php";
                   include_once($path);
                ?>
                             
                                        
        </article>
        
</div><!--announcements-->