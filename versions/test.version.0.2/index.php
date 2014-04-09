<?php 
		
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
	$path .= "/includes/includes.php";
	include_once($path);
	
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: home.php");
		exit();
	}
	
		
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Critical Table</title>

<link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/fonts/fonts.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">

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
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">My Profile</a></li>
                                        <li><a href="#">Logout</a></li>
                                </ul>
                        
                        </nav><!--primary nav-->
                        
                </div><!--container-->
                
        </header>
        
        <!--fixed wrapper-->
        <div id="fixed-wrapper">
        
                <!--notifications bar-->
                <section id="notifications-bar">
                
                        <!--container-->
                        <div class="container clearfix">
                                
                                <ul class="clearfix">
                                        <li id="user-meta">Welcome, <strong><?php echo $_SESSION['SESS_FIRST_NAME']." ".$_SESSION['SESS_LAST_NAME'] ?></strong></li>
                                        <li id="notificationIcon">
                                                
                                                <a href="#notifications" id="notificationNumber">1</a>
                                                
                                                <div id="notifications">
                                                    
                                                    <ul>
                                                        <li class="view-all-noti"><a href="#">View All Notifications</a></li>
                                                        <li><a href="#">This is a test notification</a></li>
                                                    </ul>
                                                    
                                                </div>
                                        </li>
                                </ul>
                        
                        </div><!--container-->
                
                </section><!--notifications bar-->
                
                <!--dashboard-->
                <section id="dashboard">
                
                        <!--container-->
                        <div class="container clearfix">
                                
                                <!--dashboard options-->
                                <div id="dashboard-options">
                                
                                        <ul>
                                        
                                                <li><a href="?page=Academics"><img src="images/dashboard-icons/academics.png" alt="Academics">Academics &amp; Stats</a></li>
                                                <li><a href="?page=Professor Reviews"><img src="images/dashboard-icons/professor.png" alt="Professor Reviews">Professor Reviews</a></li>
                                                <li><a href="?page=Attendance"><img src="images/dashboard-icons/statistics.png" alt="Attendance">Attendance</a></li>
                                                <li><a href="?page=Notifications"><img src="images/dashboard-icons/notification.png" alt="Notifications">Notifications</a></li>
                                                <li><a href="?page=Technical Feedback and Complaints"><img src="images/dashboard-icons/feedbacks-complaints.png" alt="Technical Feedback &amp; Complaints">Site Feedback &amp; Complaints</a></li>
                                                <li>&nbsp;</li>
                                        
                                        </ul>		
                                
                                </div><!--dashboard option-->
                                
                                <a href="#" id="dashboard-toggle" class="dashboard-toggle-on">Dashboard</a>
                                
                        </div><!--container-->
                
                </section><!--dashboard-->
        
        </div><!--fixed wrapper-->
        
        
        <!--content-->
        <section id="content">
                
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
                        	
                        	<!--current lecture-->
                        	<article id="current-lecture" class="white mini-module-container">
                            		
									<?php
										$path = $_SERVER['DOCUMENT_ROOT']."/critical_final/";
										$path .= "forms/currentLecture.php";
										include_once($path);
									?>
                            
                            </article><!--current lecture-->
                        	
                            <!--announcements-->
                            <article id="announcements" class="flexslider">
                            	
                                <h3>Announcements</h3>
                                
                                <ul class="slides white mini-module-container">
                                    
                                    <?php 
										
										if(checkTable("announcements"))
										{
											$selectAnnouncements="select * from announcements
												where (department='".$_SESSION['department']."'
													or department='all')
												and (semester='".$_SESSION['semester']."' or semester='0')
												and (posted_at>= '".gmdate("Y-m-d",(time() + 19800))."'
													  and '".gmdate("Y-m-d",(time() + 19800))."' < expires_in_days
													)";
													
											//echo $selectAnnouncements;		
													
											$selectAnnouncements=mysql_query($selectAnnouncements) or die($selectAnnouncements."<br>".mysql_error());	
											
											if(mysql_num_rows($selectAnnouncements) > 0)
											{
													
												while($row=mysql_fetch_array($selectAnnouncements))
												{
													echo '<li>
															<h4>'.$row['announcement_title'].'</h4>
															'.$row['content'].'
													</li>';
												}
												
											}else
											{
												echo "<li>No announcements to show at this point of time</li>";
											}
										}
										else{
											echo "<li>No announcements to show at this point of time</li>";
										}
								
									?>
                                    
                                </ul>
                                
                            </article><!--announcements-->
                        
                        </section><!--main-->
                
                </div><!--container-->
                
		</section><!--content-->        
        
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
			
			$(document).ready(function(e) {
                	
				$('#notificationNumber').toggle(function() { 
					$("#notifications").fadeIn("fast");
				},function() { 
					$("#notifications").fadeOut("fast"); 
				});
				
				$('header,#main,#notifications-bar').live('click',function(e){
					$("#notifications").fadeOut("fast"); 
				});
				
				
				/*===
						Page Title Manipulation
				==*/
				
				var $documentTitle=$(document).attr('title');
				
				console.log($documentTitle);
				
				$documentTitle=$documentTitle.replace("Critical Table","");
				
				$('#dashboard-options li a').each(function(index, element) {
			
					if($(this).attr("href")=="?page="+$documentTitle)
					{
						$('#dashboard-options li a').removeClass('active');
						$(this).addClass('active');
					}
				});
				
				/*===
						Responsive Slider
				==*/
				
				$('.flexslider').flexslider({
					controlNav: false,
					slideshowSpeed: 3000, 
				});
				
				/*var maxHeight = Math.max.apply(null, $("#announcements .slides > li").map(function ()
				{
					return $(this).height();
				}).get());
				
				console.log(maxHeight);
				
				$('#announcements .slides li').height(maxHeight);*/
				
			});
			
			var dashboardHeight;
			
			$(window).resize( function() {
				  orientationChange();
			});	
			
			function orientationChange(){
				dashboardHeight=$('#dashboard').height();
				console.log(dashboardHeight);
			};
			
			$(window).load(function(e){
				
				/*===
						Dashboard Animation
				==*/
				
				dashboardHeight=$('#dashboard').height();
				
				//console.log(dashboardHeight);
				
				$('.dashboard-toggle-on').live('click',function(e) {
					console.log(dashboardHeight);
					$('#dashboard-toggle').removeClass('dashboard-toggle-on');
					$('#dashboard .container,#dashboard').animate({'height':0});
					$('#dashboard div:not(.container)').slideUp('fast');
					$('#dashboard-toggle').addClass('dashboard-toggle-off');
					//$('#content').animate({marginTop:$('#notifications-bar').height()});
					return false;
				});
				$('.dashboard-toggle-off').live('click',function(e) {
					$('#dashboard-toggle').removeClass('dashboard-toggle-off');
					$('#dashboard .container,#dashboard').animate({'min-height':dashboardHeight});
					$('#dashboard div:not(.container)').slideDown('fast');
					$(this).addClass('dashboard-no-display');
					$('#dashboard-toggle').addClass('dashboard-toggle-on');
					//$('#content').animate({marginTop:$('#notifications-bar').height()+dashboardHeight});
					return false;
				});

			});
				
		</script>
</body>
</html>
