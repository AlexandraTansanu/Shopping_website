<?php
    ini_set("session.save_path", "/home/unn_w19021004/sessionData");
    session_start();

     /* Check that a user is indeed logged in before allowing him to choose a book to modify */
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
	<title> Northumbria Books Limited - Credits</title>
</head>
<body>
    <div class = "wrapper">
		<!-- Navigation start -->
		<nav class = "main-nav">
			<ul>
				<li><a href = "admin.php">HOME</a></li>
				<li><a href = "chooseBookList.php">EDIT BOOK</a></li>
				<li><a href = "#contact">CONTACT</a></li>
				<li><a href = "credits.php">CREDITS</a></li>
				<li><a href = "logout.php">LOGOUT</a></li>
			</ul>	
        </nav>
        <!-- Navigation End -->
        
        <h1>Credits for the Northumbria Books Limited web site</h1>

        <!-- Identification start --> 
        <section>
            <h2> Personal Details </h2>
            <p>Alexandra-Andreea Tansanu <br>
                W19021004 <br>
                alexandra.tansanu@northumbria.ac.uk</p>
        </section>
         <!-- Identification End -->

         <!-- Referencing start -->
        <section>
            <h2> Referencing: </h2>
            <h3>For generating random text content:</h3>
            <p>Lorem Ipsum (2020) <i>Lipsum generator: Lorem Ipsum - All the facts.</i>. Available at: 
                <a href = "https://www.lipsum.com/">this link</a> (Accessed: 26/12/2020).
            </p>

            <h3>For copyright free pictures:</h3>
            <p>Unsplashed (2020) <i>The internet???s source of freely-usable images.Powered by creators everywhere.</i> Available at: 
                <a href = "https://unsplash.com/">this link</a> (Accessed: 26/12/2020).
            </p>

            <h3>Sources that contribuited to the overall website's layout and design:</h3>
            <p>W3Schools (2020) <i>CSS Tutorial.</i> Available at: 
                <a href = "https://www.w3schools.com/css/default.asp">this link</a> (Accessed: 25/12/2020).
            </p>

            <p>CSS-Tricks (2020) <i>A Complete Guide to Flexbox.</i> Available at: 
                <a href = "https://css-tricks.com/snippets/css/a-guide-to-flexbox/">this link</a> (Accessed: 25/12/2020).
            </p>

            <p>CSS-Tricks (2020) <i>A Complete Guide to Grid.</i> Available at: 
                <a href = "https://css-tricks.com/snippets/css/complete-guide-grid/">this link</a> (Accessed: 25/12/2020).
            </p>

            <h3>For the PHP documentation:</h3>
            <p>Achour M. et all (2020) <i>PHP manual.</i> Available at:
                <a href = "https://www.php.net/manual/ro/index.php">this link</a>  (Accessed: 22/12/2020).
            </p>

            <h3>For the documentation of PHP refferer:</h3>
            <p>Stackoverflow (2013) <i>Redirecting to previous page after login? PHP.</i> Available at:
                <a href = "https://stackoverflow.com/questions/14523468/redirecting-to-previous-page-after-login-php">this link</a>  (Accessed: 28/12/2020).
            </p>
        </section>
        <!-- Referencing End --> 

        <!-- Footer Start -->
        <footer id = "contact">
            <div class = "footer-left">
                <h4>?? Copyright 2020 Northumbria Books Limited</h4>
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
    <!-- Wrapper Ends -->

</body>
</html>	