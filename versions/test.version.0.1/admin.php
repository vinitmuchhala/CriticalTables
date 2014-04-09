<?php 
		
		$path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
		$path .= "/includes/includes.php";
		include_once($path);
		
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Critical Table Administration | <?php if(isset($_GET['page'])){	echo $_GET['page']; }else{	 echo "University Statistics";} ?></title>

<link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/fonts/fonts.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/visualize.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/visualize-light.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/tipsy.css" rel="stylesheet" type="text/css" media="screen">
<link type="text/css" rel="stylesheet" href="css/jquery.validity.css" />

<!--[if lt IE 9]>
<link href="css/ie78.css" rel="stylesheet" type="text/css" media="screen">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="js/excanvas.compiled.js"></script>
<![endif]-->


</head>

<body>

		<header>
        		
                <!--container-->
                <div class="container clearfix">

                        <!--logo-->
                        <h1 id="logo"><img src="images/logo.png" alt="Critical Table"></h1>
                        
                        <!--primary nav-->
                        <nav id="primary-nav">
                        		
                                <ul>
                                		<li class="active"><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">My Profile</a></li>
                                        <li><a href="#">Logout</a></li>
                                </ul>
                        
                        </nav><!--primary nav-->
                        
                </div><!--container-->
                
        </header>
        
        <!--dashboard-->
        <section id="dashboard">
        
		        <!--container-->
                <div class="container clearfix">
                		
                		<!--dashboard message-->
                    	<div id="dashboard-message">
                        
                   				<h2>Welcome to Your Dashboard!</h2>
                                
                            	<p>Welcome to the Dashboard of CriticalTable. <br>
                                    Through this Dashboard, you can manage the entire site effectively as it gives valuable, time-saving shortcuts to effectively administrate the site and quickly access the multitude of options this software provides you for your university and your students!</p>
                                    
                                <br>
                                    
                                <p><strong>Why wait? Dig into it!</strong></p>
                        </div><!--dashboard message-->
                        
                        <!--dashboard options-->
                        <div id="dashboard-options">
                        
                        		<ul>
                                
                                        <li><a href="?page=Manage Departments"><img src="images/dashboard-icons/department.png" alt="Manage Departments">Manage Departments</a></li>
                                		<li><a href="?page=Manage Students"><img src="images/dashboard-icons/student.png" alt="Manage Students">Manage Students</a></li>
                                        <li><a href="?page=Manage Professors"><img src="images/dashboard-icons/professor.png" alt="Manage Professors">Manage Professors</a></li>
                                        <li><a href="?page=Announcements"><img src="images/dashboard-icons/announcement.png" alt="Announcements">Announcements</a></li>
                                        <li><a href="?page=Notifications"><img src="images/dashboard-icons/notification.png" alt="Notifications">Notifications</a></li>
                                        <li><a class="active" href="admin.php"><img src="images/dashboard-icons/statistics.png" alt="University Statistics">University Statistics</a></li>
                                        <li><a href="?page=Technical Feedback and Complaints"><img src="images/dashboard-icons/feedbacks-complaints.png" alt="Technical Feedback &amp; Complaints">Technical Feedback &amp; Complaints</a></li>
                                
                                </ul>		
                        
                        </div><!--dashboard option-->
                        
                        <a href="#" id="dashboard-toggle" class="dashboard-toggle-on">Dashboard</a>
                        
                </div><!--container-->
        
        </section><!--dashboard-->
        
        <!--content-->
        <div id="content">
                
                <!--container-->
                <div class="container clearfix">
        
                        <!--sidebar-->
                        <aside id="sidebar">
                                
                                <!--stats-->
                                <div id="university-stats" class="stats">
                                        
                                    <h4>» University Statistics</h4>
                                        
                                        <ul>
                                                <li><h5>Students</h5></li>
                                                <li>Students Enrolled Currently  - <span class="data">1252</span></li>
                                                <li>Total Students - <span class="data">142252</span></li>
                                                <li>Pass % Jun-Dec 2011 - <span class="data">75%</span></li>
                                                <li>Pass % Jan-May 2011 - <span class="data">49%</span></li>
                                                
                                                <li><h5>Professors</h5></li>
                                                <li>No of Professors - <span class="data">75</span></li>
                                                <li>Top Rated Professor  - <span class="data"> Ms. Abc Xyz</span></li>
                                                <li>Week’s Top Prof  - <span class="data">Mr. Rgb Cmyk</span></li>
                                                
                                                <li><h5>Departments</h5></li>
                                                <li>No of Departments   - <span class="data">6</span></li>
                                                <li>Top Department  - <span class="data">Electronics</span></li>
                                                <li>Weakest Department - <span class="data">Production</span></li>
                                        </ul>
                                                                        
                                </div><!--stats-->
                                
                                <!--stats-->
                                <div id="technical-stats" class="stats">
                                        
                                    <h4>» Technical Statistics</h4>
                                        
                                        <ul>
                                                <li><h5>Uploads</h5></li>
                                                <li>Total Images - <span class="data">1252</span></li>
                                                <li>Total Documents - <span class="data">142252</span></li>
                                                <li>Total Videos  - <span class="data">75%</span></li>
                                                <li>Total Assignments Submitted - <span class="data">49%</span></li>
                                                <li>Total Space Used - <span class="data">49%</span></li>
                                                
                                                <li><h5>Professor Reviews</h5>
                                                </li>
                                                <li>Reviews added this week  - <span class="data">87874</span></li>
                                                <li>Positive Reviews this week  - <span class="data"> 65%</span></li>
                                                <li>Total Reviews Jun-Dec 2011  - <span class="data">48452656</span></li>
                                                <li>Positive Reviews  - <span class="data">45%</span></li>
                                                
                                                <li><h5>Announce’nts/Feedback/Complaints</h5></li>
                                                <li>Announcements made this week   - <span class="data">6</span></li>
                                                <li>Feedback Received this week  - <span class="data">55</span></li>
                                                <li>Complaints Received  - <span class="data">15</span></li>
                                        </ul>
                                                                        
                                </div><!--stats-->
                                
                    	</aside><!--sidebar-->
                        
                        <!--main-->
                        <section id="main">
                        		
                                <?php if (empty($_GET)) { ?>

                                
                                <!--statistics-->
                                <div id="statistics">
                                		
                                        <h3>Random Graph Set #1</h3>
                                        
                                        <table class="pie line area bar">
                                            <caption>2009 Student Marks - Sample Set #1</caption>
                                            <thead>
                                                <tr>
                                                    <td></td>
                                                    <th>Physics</th>
                                                    <th>Chemistry</th>
                                                    <th>Maths</th>
                                                    <th>B.E.E</th>
                                                    <th>Mechanics</th>
                                                    <th>C++</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Mary</th>
                                                    <td>190</td>
                                                    <td>0</td>
                                                    <td>40</td>
                                                    <td>120</td>
                                                    <td>30</td>
                                                    <td>70</td>
                                                </tr>
                                                <tr>
                                                    <th>Tom</th>
                                                    <td>3</td>
                                                    <td>40</td>
                                                    <td>30</td>
                                                    <td>45</td>
                                                    <td>35</td>
                                                    <td>49</td>
                                                </tr>
                                                <tr>
                                                    <th>Brad</th>
                                                    <td>10</td>
                                                    <td>180</td>
                                                    <td>10</td>
                                                    <td>85</td>
                                                    <td>25</td>
                                                    <td>79</td>
                                                </tr>
                                                <tr>
                                                    <th>Kate</th>
                                                    <td>40</td>
                                                    <td>80</td>
                                                    <td>90</td>
                                                    <td>25</td>
                                                    <td>15</td>
                                                    <td>119</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                        		
                                </div><!--statistics-->
                                
                              <?php } 
							  		else if($_GET['page']=="Manage Students")
									{
							  ?>
                              
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
                                                        <p><label for="year">Year</label><select id="year" name="year"><option value="">Choose Year</option><option value="1">First Year</option><option value="2">Second Year</option><option value="3">Third Year</option><option value="4">Fourth Year</option></select></p>
                                                        <p id="get-table-index"><label for="department">Department:</label><?php $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";$path .= "/forms/getDepartmentIndex.php";include_once($path);
														?></p>
                                                        <p><label for="gender">Gender</label><select id="gender" name="gender"><option value="">Choose Gender</option><option>Male</option><option>Female</option></select></p>
                                                        
                                                        <p><input type="submit" value="SUBMIT" class="green"> <span class="loader"><img src="images/loader.gif" class="loader-img" alt="Loading..."></span></p>
                                                        
                                                </form>
                                                
                                        </article><!--mini module container-->
                                        
                                        
                                        <h3>Students List</h3>
                                        
                                        <!--Display Student List Over Here-->
                                        <article id="displayStudent">
                                                                
                                            
                                            <?
                                                   $path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
                                                   $path .= "/forms/displayStudent.php";
                                                   include_once($path);
                                            ?>
                                                            
                                        </article>
                                        
                                </div><!--manage students-->
							  
							  <?php
									  }
									  
							  		else if($_GET['page']=="Manage Departments")
									{
							  ?>
                              
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
                                        
                                        <!--add Department Admins-->
                                        <!--<h3>Add Department Admins</h3>-->
                                        
                                        <!--mini module container-->
                                        <!--<div class="white mini-module-container">
                                        		
                                                <form action="forms/departments.php" method="get" id="add-admins">
                
                                                        <p class="center"><input value="Enter Department Name" data-dafaultvalue="Enter Department Name" type="text" id="deptName" name="deptName" > <input class="green" type="submit" value="SUBMIT"> <span class="loader"><img class="loader-img" src="images/loader.gif" alt="Loading..."></span></p>
                                                        
                                                </form>
                                                
                                                
                                                             
                                        </div>--><!--mini module container-->
                                        <!--add department Admins-->
                                        
                                </div><!--manage departments-->
                                
                                
							  
							  <?php
									  }
							  ?>
                                
                        </section><!--main-->
                
                </div><!--container-->                
        
        </div><!--content-->
        
        <footer>
        
        </footer>
        
        
		
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/visualize.jQuery.js"></script>
        <script type="text/javascript" src="js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="ajax/addDepartment.js"></script>
        <script type="text/javascript" src="ajax/displayDepartment.js"></script>
        <script type="text/javascript" src="ajax/deleteDepartment.js"></script>
		<script type="text/javascript" src="ajax/registerStudent.js"></script>
		<script type="text/javascript" src="ajax/displayStudent.js"></script>
        <script type="text/javascript" src="ajax/deleteStudent.js"></script>
        <script type="text/javascript" src="js/jQuery.validity.min.js"></script>
		<script type="text/javascript" src="js/validate.js"></script>
        <script type="text/javascript">
				
				/*===
							Reset Form Fields on load
				==*/
				function resetForm(form) {
					$('input:not(input[type=submit],input[type=button])').each(function(index, element) {
	
							var $defaultValue=$(this).data('dafaultvalue');
							
                    		if($defaultValue!="")
							{
								$(this).val($defaultValue);
							}
							else
							{
								$(this).val('');
							}    
                    });
					
					$(form).find('select').val('');
					$(form).find('input:radio, input:checkbox')
						 .removeAttr('checked').removeAttr('selected');
				}
				
				resetForm("form");

				
				$(document).ready(function(e) {
					
					/*===
							Ajax Config
					==*/
					$.ajaxSetup ({
						 cache: false,
						 complete: function() {
										$('a[title]').tipsy({fade: true});
								 }

	  				});
					
					
					var isAppended=false;
					
					$('input[type=submit]').ajaxStart(function() {
						
						var $parent=$(this).parent();
						
						$parent.find('.loader img').hide();
						$parent.find('.loader-img').show();
						
                    });
					$('input[type=submit]').ajaxSuccess(function() {
						
						var $parent=$(this).parent();
						
						if(isAppended==false){
							$parent.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
						}
						
						isAppended=true;
						$parent.find('.loader-img').hide();
						$parent.find('.loader img:not(.loader-img)').show();
						$parent.find('.loader img').delay(1000).fadeOut();
						
                    });
					$('input[type=submit]').ajaxError(function() {
						
						var $parent=$(this).parent();
						
						if(isAppended==false){
							$parent.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
						}
						
						isAppended=true;
						$parent.find('.loader-img').hide();
						$parent.find('.loader img:not(.loader-img)').show();
						$parent.find('.loader img').delay(1000).fadeOut();
                    });
					
					/*===
							Default Value Validation
					==*/
					$('input[type=submit]').click(function(e) {
                        $(this).parent().find('input[type=text]').each(function(index, element) {
                            $currentValue=$(this).val();
							$defaultValue=$(this).data('dafaultvalue');
							
							if($currentValue==$defaultValue)
							{
								alert("Please enter a department name");
								e.preventDefault();
							}
							
                        });
                    });
					
					/*===
							Placeholder Manipulation
					==*/
					$('input[type=text]').focus(function(e) {
                        $currentValue=$(this).val();
						$defaultValue=$(this).data('dafaultvalue');
						if($currentValue==$defaultValue)
						{
							$(this).val('');
						}
                    });
					$('input[type=text]').blur(function(e) {
                        $currentValue=$(this).val();
						$defaultValue=$(this).data('dafaultvalue');
						if($currentValue==""||$currentValue==null)
						{
							$(this).val($defaultValue);
						}
                    });
					
					/*===
							Adding an active class to clicked inputs
					===*/
					$('input,select,textarea').live('blur',function(e) {
                        $currentValue=$(this).val();
						if($currentValue!="" && $currentValue!=null)
						{
							$(this).addClass('active');
						}
						else
						{
							$(this).removeClass('active');
						}
					
                    });
					
					
					/*===
							Page Title Manipulation
					==*/
					
					var $documentTitle=$(this).attr('title');
					
					$documentTitle=$documentTitle.replace("Critical Table Administration | ","");
					
					$('#dashboard-options li a').each(function(index, element) {
				
                        if($(this).attr("href")=="?page="+$documentTitle)
						{
							$('#dashboard-options li a').removeClass('active');
							$(this).addClass('active');
						}
                    });
					
					
					/*===
							Dashboard Animation
					==*/
					
					var dashboardHeight=$('#dashboard').height();
					
                    $('.dashboard-toggle-on').live('click',function(e) {
						$('#dashboard-toggle').removeClass('dashboard-toggle-on');
                        $('#dashboard .container,#dashboard').animate({'height':0});
						$('#dashboard div:not(.container)').slideUp('fast');
						$('#dashboard-toggle').addClass('dashboard-toggle-off');
						return false;
                    });
					$('.dashboard-toggle-off').live('click',function(e) {
						$('#dashboard-toggle').removeClass('dashboard-toggle-off');
                        $('#dashboard .container,#dashboard').animate({'height':dashboardHeight});
						$('#dashboard div:not(.container)').slideDown('fast');
						$(this).addClass('dashboard-no-display');
						$('#dashboard-toggle').addClass('dashboard-toggle-on');
						return false;
                    });
					
					
					/*===
							Charts Generation
					==*/
					
					$('table.pie').visualize({type: 'pie', pieMargin: 20});
					$('table.line').visualize({type: 'line'});
					$('table.area').visualize({type: 'area'});
					$('table.bar').visualize({type: 'bar', barDirection: 'vertical'});
					
					//$('.pie,.line,.area,.bar').hide();
					
					/*===
							jQuery Tipsy Tooltip
					==*/
					$('a[title]').tipsy({fade: true});
					
                });
				
		</script>
</body>

</html>