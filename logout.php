<?php

session_start();

if(isset($_SESSION['SESS_MEMBER_ID']))
{
	
header("refresh:2;url=home.php"); 

session_regenerate_id(); 
session_destroy();
setcookie ("login", "", time() - 3600);
setcookie ("password", "", time() - 3600);
setcookie ("user-type", "", time() - 3600);


?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Critical Table</title>

<link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/fonts/fonts.css" rel="stylesheet" type="text/css" media="screen">

<!--[if lt IE 9]>
<link href="css/ie78.css" rel="stylesheet" type="text/css" media="screen">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body id="home">
	
    <header>
        		
                <!--container-->
                <div class="container clearfix">

                        <!--logo-->
                        <h1 id="logo"><a href="home.php"><img src="images/logo.png" alt="Critical Table"></a></h1>
                        
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
    	
	<section id="main">

		<!--container-->
        <div class="container clearfix">

                <article class="white mini-module-container clearfix">
                        
                        <h2 class="center">You have been logged out successfully</h2>
                        
                </article>
        
        </div><!--container-->
      
	  
	  </section>
</body>
</html>

<?php

	}
	else
	{
		header("location:home.php"); 
	}
?>