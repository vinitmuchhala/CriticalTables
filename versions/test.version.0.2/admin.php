<?php
   $mtime = microtime();
   $mtime = explode(" ",$mtime);
   $mtime = $mtime[1] + $mtime[0];
   $starttime = $mtime;
;?> 

<?php 
		
		$path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
		$path .= "/includes/includes.php";
		include_once($path);
		
?>

<!DOCTYPE HTML>
<html><head>
<meta charset="utf-8">
<title>Critical Table Administration | <?php if(isset($_GET['page'])){	echo $_GET['page']; }else{	 echo "University Statistics";} ?></title>

<link href="css/admin.css" rel="stylesheet" type="text/css" media="screen">
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
                                
                                		<li><a href="?page=Manage Academics"><img src="images/dashboard-icons/academics.png" alt="Manage Academics">Manage Academics</a></li>
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
        <section id="content">
                
                <!--container-->
                <div class="container clearfix">
        
        				<?php if(empty($_GET)|| ($_GET['page']!="Manage Academics" && $_GET['page']!="Manage Departments")){?>
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
                        <?php } ?>
                        
                        <!--main-->
                        <section id="main" <?php if(!empty($_GET)){if($_GET['page']=="Manage Academics" || $_GET['page']=="Manage Departments"){echo 'style="width:100%"';}} ?> >
                        		
								<?php
									
									if (empty($_GET)) { 
                                
										include("universityStatistics.php");
                                	} 
							  		else if($_GET['page']=="Manage Students")
									{
										include("manageStudents.php");
									}
									else if($_GET['page']=="Manage Departments")
									{
										include("manageDepartments.php");
							  		}
									else if($_GET['page']=="Manage Professors")
									{
										include("manageProfessors.php");
							  		}
									else if($_GET['page']=="Manage Academics")
									{
										include("manageAcademics.php");
									}
									else if($_GET['page']=="Announcements")
									{
										include("announcements.php");
									}
							  ?>
                              
                              
                         <?php
                           $mtime = microtime();
                           $mtime = explode(" ",$mtime);
                           $mtime = $mtime[1] + $mtime[0];
                           $endtime = $mtime;
                           $totaltime = ($endtime - $starttime);
                           echo "<p class='execution'>This page was created in ".$totaltime." seconds</p>";
                        ;?>
                                
                        </section><!--main-->
                        
                
                </div><!--container-->
                
                                
        
        </section><!--content-->
        
        
        <?php include("footer.php"); ?>
		
       