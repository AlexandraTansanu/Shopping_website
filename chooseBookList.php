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
    <title> Northumbria Books Limited - Edit book </title>
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
    <!-- Navigation End-->

    <h1> Click on the title of a book to edit its details </h1>

    <!-- Table to hold all books from the database -->
    <table>
            <thead>
                <tr>
                <th>Book ISBN</th>
                <th>Book Title</th>
                <th>Book Year</th>
                <th>Category Description</th>
                <th>Book Price</th>
                </tr>
            </thead>
            <tbody>

    <?php
    try {
        /* Connect to the database */
        require_once("functions.php");
        $dbConn = getConnection();

        /* Query to retrive all book details */
        $querySelect = "SELECT bookISBN, bookTitle, bookYear, catDesc, bookPrice
                        FROM NBL_books INNER JOIN NBL_category ON NBL_books.catID = NBL_category.catID
                        ORDER BY bookTitle";

        $queryResult = $dbConn->query($querySelect);

        /* Building the title of the book as a link and sanitizing database values to prevent XSS */ 
        while($rowObj = $queryResult->fetchObject()) {
            $bookISBN = $rowObj->bookISBN;

            $bookTitle = $rowObj->bookTitle;
            $bookTitle = filter_var($bookTitle, FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS); 

            $bookYear = $rowObj->bookYear;

            $catDesc = $rowObj->catDesc;

            $bookPrice = $rowObj->bookPrice;

            echo "<tr>
                     <td> {$bookISBN} </td>
                     <td><a href = 'editBookForm.php?bookISBN={$bookISBN}'>{$bookTitle} </a></td>
                     <td> {$bookYear} </td>
                     <td> {$catDesc} </td>
                     <td> {$bookPrice} </td>
                  </tr>\n";
        }

    }
    catch(Exception $e) {
        echo "<p>Query failed: " . $e->getMessage() . "</p>";
    }
    ?>

            </tbody>
    </table>
    <!-- Table End -->

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

</body>
</html>
