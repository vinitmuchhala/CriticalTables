<? 
	$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path .= "/includes/includes.php";
	$path1 = $_SERVER['DOCUMENT_ROOT']."/critical_final";
	$path1 .= "/login.php";
	if(!isset($_SESSION))
	{ 
		session_start();
	}
	include_once($path);
	if(isset($_SESSION['noRedirect']))
	{
	   if($_SESSION['noRedirect']!=1)
	   {
			require_once($path1);     
	   }
	}
   
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
                        
                        <form action="login.php" method="post" id="signup">
                        		
                                <h2 class="center">Please Login</h2>
                                
                                <p><label for="login">Username</label><input name="login" type="text" id="name"></p>
                                <p><label for="password">Password</label><input type="password" id="user" name="password"></p>
                                
                                <p><label for="user-type">User Type:</label><select id="user-type" name="user-type"><option value="">Choose User Type</option><option value="1">Student</option><option value="2">Professor</option></select></p>
                                
                                <p class="rememberMe"><input style="vertical-align:middle" type="checkbox" name="rememberme" value="1" id="rememberme"> &nbsp; <label style="vertical-align:middle" for="remember">Remember Me?</label></p>
        
                                <p><input type="submit" value="Log IN" class="green"></p>
                                
                        </form>
                        
                </article>
        
        </div><!--container-->
      
	  
	  </section>
</body>
</html>