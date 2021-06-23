<?php
    ini_set("session.save_path", "/home/unn_w19021004/sessionData");
    session_start();

    /* Check that a user is indeed logged in before displaying the admin functionality */
    require_once ("functions.php");
	$checkLogin = check_login('logged-in');
	
	/* Remember this page as originating page */
	$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

    if($checkLogin === false) {
        header("Location: http://unn-w19021004.newnumyspace.co.uk/loginForm.html");
    }
?>

<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link  href = "index.css" rel = "stylesheet" type = "text/css">
	<title> Northumbria Books Limited - Admin Page </title>
</head>
<body>
	<div class = "wrapper">
		<!-- Navigation start -->
            <nav>
                <ul>
                    
                    <li><a href = "admin.php">HOME</a></li>
                    <li><a href = "chooseBookList.php">EDIT BOOK</a></li>
                    <li><a href = "#contact">CONTACT</a></li>
                    <li><a href = "credits.php">CREDITS</a></li>
                    <li><a href = "logout.php">LOGOUT</a></li>
                </ul>
            </nav>
        <!-- Navigation End -->

	
	<!-- Top Container -->
	<section class = "top-container">
		<header class = "showcase">
			<h1> Northumbria Books Limited </h1>
			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt consectetur sem in tincidunt. Nullam lorem 
			felis, tempor ac mi in, pharetra malesuada nisl. Curabitur mattis iaculis arcu vitae placerat. Ut tempor ac ante at
			porttitor. Donec tristique condimentum eleifend. Donec ut facilisis quam. Aenean tempor et lectus sit amet faucibus.
			Integer quis dolor et metus facilisis pretium ac non erat. Fusce non nisi urna. </p>
		</header>
		
		<!-- AJAX offers -->
		<aside id = "offers">
			
		</aside>	
	
		<aside id = "JSONoffers">
			
		</aside>	
	</section>
	<!-- Top Container End -->	
		
	<!-- Info Section -->
	<section id = "info">
		<img src = "img/cover.jpg" alt = "library photo">
		<div>
			<h2> About Northumbria Books Limited </h2>
			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt consectetur sem in tincidunt.
			Nullam lorem felis, tempor ac mi in, pharetra malesuada nisl. Curabitur mattis iaculis arcu vitae placerat.
			Ut tempor ac ante at porttitor. Donec tristique condimentum eleifend. Donec ut facilisis quam. Aenean tempor
			et lectus sit amet faucibus. Integer quis dolor et metus facilisis pretium ac non erat. Fusce non nisi. </p>
			<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
				dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
				sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
				est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius
				modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima
				veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
				commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam
				nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
		</div>	
	</section>

	<!-- Footer Start -->
	<footer id = "contact">
		<div class = "footer-left">
			<h4>© Copyright 2020 Northumbria Books Limited</h4>
			<p>Powered by Northumbria University</p>
			<p>W19021004</p>
		</div>
	
		<div class = "footer-right">
			<address>
			<ul>
				<li> 0154-456-6890 </li>
				<li> team_NorthumbriaBooksLimited@gmail.com </li>
				<li> http://www.NorthumbriaBooksLimited.com/contactme/  </li>
			</ul>
			</address>
		</div>
	</footer> 
	<!--Footer End-->
	
	</div>
	<!-- Wrapper End -->
	
	<script type="text/javascript" src="offers.js"></script>
</body>
</html>	