<?php
    ini_set("session.save_path", "/home/unn_w19021004/sessionData");
    session_start();

     /* Check that a user is indeed logged in before allowing him to edit a book */
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
<!-- Stop here because depending in whether there are errors, a different css file is used -->
            
        <?php
        list($input, $errors) = validate_link();
        if ($errors) {
            echo show_errors($errors);
        } 
        else {
            echo display_form($input);
        }

        function validate_link() {
            $input = array();
            $errors = array();

            $input['bookISBN'] = filter_has_var(INPUT_GET, 'bookISBN')?$_GET['bookISBN']:null;

            if(empty($input['bookISBN']) || strlen($input['bookISBN']) != 10 || !filter_var($input['bookISBN'], FILTER_VALIDATE_INT)) {
                $errors[] = ""; // error will be displayed later
            }

            return array($input, $errors);
        }

        function show_errors(array $errors) { // if there are any errors redisplay the list of books
            $output = "";

            /* add the appropiate css file */
            $output .= "<link  href = 'index.css' rel = 'stylesheet' type = 'text/css'> 
                        <title> Northumbria Books Limited - Edit book </title>
                    </head>
                    <body>
                    <div class = 'wrapper'>
                        <!-- Navigation start -->
                        <nav>
                            <ul>
                                <li><a href = 'admin.php'>HOME</a></li>
                                <li><a href = 'chooseBookList.php'>EDIT BOOK</a></li>
                                <li><a href = '#contact'>CONTACT</a></li>
                                <li><a href = 'credits.php'>CREDITS</a></li>
                                <li><a href = 'logout.php'>LOGOUT</a></li>
                            </ul>
                        </nav>
                    <!-- Navigation End -->";

            /* Display error */
            $output .= "<p><b> Tampered with the ISBN! Please try again. </b></p>"; // display the error
            
            /* Redisplay the list of links */
            $output .= "<h1> Click on the title of a book to edit its details </h1> 
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
                                <tbody>";

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
                    
                    $output .= "<tr>
                                    <td> {$bookISBN} </td>
                                    <td><a href = 'editBookForm.php?bookISBN={$bookISBN}'>{$bookTitle} </a></td>
                                    <td> {$bookYear} </td>
                                    <td> {$catDesc} </td>
                                    <td> {$bookPrice} </td>
                                </tr>\n";
                }
        
            }
            catch(Exception $e) {
                $output .= "<p>Query failed: " . $e->getMessage() . "</p>";
            }

            $output .= "</tbody>
                        </table>
                        <!-- Footer Start -->
                        <footer id = 'contact'>
                            <div class = 'footer-left'>
                                <h4>© Copyright 2020 Northumbria Books Limited</h4>
                                <p>Powered by Northumbria University</p>
                                <p>W19021004</p>
                            </div>
                        
                            <div class = 'footer-right'>
                                <address>
                                <ul>
                                    <li> 0154-456-6890 </li>
                                    <li> team_NorthumbriaBooksLimited@gmail.com </li>
                                    <li> http://www.NorthumbriaBooksLimited.com/contactme/  </li>
                                </ul>
                            </address>
                            </div>
                        </footer> 
                        <!-- Footer End -->

                    </div>
                    <!-- Wrapper End -->

                    </body>
                    </html>";

            return $output;
        }

        function display_form(array $input) { // else, if no errors occured, display the form to edit book
             /* add the appropiate css file */
            $output = "<link  href = 'form.css' rel = 'stylesheet' type = 'text/css'>
                        <title> Northumbria Books Limited - Edit book </title>
                    </head>
                    <body>
                    <div class = 'formWithImg'>
                        <div class = 'form'>";

            $output .= "<h1> Alter the form to edit book </h1>";

            /* display the form to edit book */
            try {
                require_once("functions.php");
                $dbConn = getConnection();
    
                /* Query to retrieve all attr for that specified book */
                $selectQuery = "SELECT bookTitle, bookYear, pubName, catDesc, bookPrice 
                                FROM NBL_books INNER JOIN NBL_publisher ON NBL_books.pubID = NBL_publisher.pubID
                                               INNER JOIN NBL_category ON NBL_books.catID = NBL_category.catID
                                WHERE bookISBN = :bookISBN";
                $selectResults = $dbConn->prepare($selectQuery);
                $selectResults->execute(array(':bookISBN' => $input['bookISBN']));
                
                $bookObj = $selectResults->fetchObject();

                /* Sanitize database values to prevent XSS */
                $bookTitle = $bookObj->bookTitle;
                $bookTitle = filter_var($bookTitle, FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);

                $bookYear = $bookObj->bookYear;
                
                $pubName = $bookObj->pubName;
               
                $catDesc = $bookObj->catDesc;
                
                $bookPrice = $bookObj->bookPrice;
                
    
                /* Query to retrieve all publisher names */
                $sqlPublisher = "SELECT pubID, pubName
                                 FROM NBL_publisher
                                ORDER BY pubName";
                $publisherResults = $dbConn->query($sqlPublisher);
    
                /* Query to retrieve all category descriptions */
                $sqlCategory = "SELECT *
                                FROM NBL_category
                                ORDER BY catDesc";
                $categoryResults = $dbConn->query($sqlCategory);

                $output .= "<form action='updatingBook.php' method='get'>
                                <label>Book ISBN 
                                    <input type='text' name ='bookISBN' value='{$input['bookISBN']}' readonly>
                                </label>
                                <br>
                                <br>
                                <label>Book Title
                                    <input type='text' name='bookTitle' value='{$bookTitle}'>
                                </label>
                                <br>
                                <br>
                                <label>Book Year
                                    <input type='text' name='bookYear' value='{$bookYear}'>
                                </label>
                                <br>
                                <br>
                                <label>Publisher Name
                                    <select name='pubID'>";

                        while($publisherObj = $publisherResults->fetchObject()) {
                            if($pubName == $publisherObj->pubName) {
                                $selected = 'selected';
                            }
                            else {
                                $selected = '';
                            }
                            $output .= "<option value='{$publisherObj->pubID}' $selected>{$publisherObj->pubName}</option>";
                        }

                        $output .= "</select>
                                </label>
                                <br>
                                <br>
                                <label>Category Description
                                    <select name='catID'>";

                        while($categoryObj = $categoryResults->fetchObject()) {
                            if($catDesc == $categoryObj->catDesc) {
                                $selected = 'selected';
                            }
                            else {
                                $selected = '';
                            }
                            $output .= "<option value='{$categoryObj->catID}' $selected>{$categoryObj->catDesc}</option>";
                        }

                        $output .= "</select>
                                </label>
                                <br>
                                <br>
                                <label>Book Price
                                    <input type='text' name ='bookPrice' value='{$bookPrice}'>
                                </label>
                                <br>
                                <br>
                                    <input type='submit' value='Update book' id = 'btn'> 
                            </form>";
            }                
             catch(Exception $e) {
                $output .= "<p>One of the queries went wrong: ".$e->getMessage."</p>\n";
            }

            
            $output .= "</div>
                        
                        <img src = 'img/cover.jpg' alt = 'library image'>       

                    </div>
                </body>
                </html>"; 

        return $output;
        }
     ?>