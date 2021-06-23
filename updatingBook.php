<?php
    ini_set("session.save_path", "/home/unn_w19021004/sessionData");
    session_start();

    /* Check that a user is indeed logged in before processing the form for book editing */
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
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <link  href = "form.css" rel = "stylesheet" type = "text/css">
        <title> Northumbria Books Limited - Edit book </title>
    </head>
    <body>
        <div class = "formWithImg">
            <div class = "form">

            <?php
            list($input, $errors) = validate_book();
            if ($errors) {
                echo show_errors($errors, $input);
            } 
            else {
                echo update_book($input);
            }

            function validate_book() {
                $input = array();
                $errors = array();
            
                /* Retrieve values form the form and remove white spaces*/
                $input['bookISBN'] = filter_has_var(INPUT_GET, 'bookISBN') ? $_GET['bookISBN']: null;
                $input['bookISBN'] = trim($input['bookISBN']);

                $input['bookTitle'] = filter_has_var(INPUT_GET, 'bookTitle') ? $_GET['bookTitle']: null;
                $input['bookTitle'] = trim($input['bookTitle']);
            
                $input['bookYear'] = filter_has_var(INPUT_GET, 'bookYear') ? $_GET['bookYear']: null;
                $input['bookYear'] = trim($input['bookYear']);

                $input['pubID'] = filter_has_var(INPUT_GET, 'pubID') ? $_GET['pubID']: null;
                $input['pubID'] = trim($input['pubID']);

                $input['catID'] = filter_has_var(INPUT_GET, 'catID') ? $_GET['catID']: null;
                $input['catID'] = trim($input['catID']);

                $input['bookPrice'] = filter_has_var(INPUT_GET, 'bookPrice') ? $_GET['bookPrice']: null;
                $input['bookPrice'] = trim($input['bookPrice']);

                /* check if values have been submitted empty and if they have a valid length or are of a valid type*/
                if(empty($input['bookISBN']) || strlen($input['bookISBN']) != 10 || !filter_var($input['bookISBN'], FILTER_VALIDATE_INT)) { 
                    $errors[] = "<p>Not a valid ISBN.</p>";
                } 


                if(empty($input['bookTitle'])) {
                    $errors[] = "<p>No input for Book Title.</p>";
                }

                if(strlen($input['bookTitle']) > 255) { // since this database field is of varchar(255)
                    $errors[] = "<p>The length of the Book name is too long.<p>";
                } 


                if(empty($input['bookPrice']) || !filter_var($input['bookPrice'], FILTER_VALIDATE_FLOAT)) {
                    $errors[] = "<p>Not a valid price.</p>";
                }
                
                if(strlen($input['bookPrice']) > 7) { // again, the supported data type for this database field is decimal(4,2)
                    $errors[] = "<p>The Book price is too expensive.<p>";
                }
                

                /* check that the user has inputted a valid year */
                if(!filter_var($input['bookYear'], FILTER_VALIDATE_INT) || strlen($input['bookYear']) != 4) {
                    $errors[] = "<p>Not a valid year.</p>";
                }

                /* chech that there is a valid publisher and category or if they are empty */
                try {
                    require_once ("functions.php");
                    $dbConn = getConnection();

                    /* Query to retrieve all publisher ids */
                    $sqlPublisher = "SELECT pubID
                                    FROM NBL_publisher";
                    $publisherResults = $dbConn->query($sqlPublisher);

                    /* Query to retrieve all category ids */
                    $sqlCategory = "SELECT catID
                                    FROM NBL_category";
                    $categoryResults = $dbConn->query($sqlCategory);

                    /* build an array with valid options and dynamically populate it */
                    $validPublishers = array();
                    while($publisherObj = $publisherResults->fetchObject()) {
                        $validPublishers[] = $publisherObj->pubID;
                    }

                    $validCategories = array();
                    while($categoryObj = $categoryResults->fetchObject()) {
                        $validCategories[] = $categoryObj->catID;
                    }

                    /* check for errors */
                    if(!in_array($input['catID'], $validCategories) || empty($input['catID'])) {
                        $errors[] = "<p>Not a valid category.<p>";
                    }
    
                    if(!in_array($input['pubID'], $validPublishers) || empty($input['pubID'])) {
                        $errors[] = "<p>Not a valid publisher.<p>";
                    }
                }
                catch (Exception $e) {
                    return "<p>One of the queries failed: " . $e->getMessage()."</p>";
                }
            
                return array($input, $errors);
            }

            function show_errors(array $errors, array $input) {
                $output = "<h1> Alter the form to edit book </h1>";
            
                            foreach($errors as $error) {
                                $output .= $error;
                            }

                            try {
                                require_once ("functions.php");
                                $dbConn = getConnection();
                    
                                /* Query to retrieve all publisher names and ids for later use */
                                $sqlPublisher = "SELECT pubID, pubName
                                                FROM NBL_publisher
                                                ORDER BY pubName";
                                $publisherResults = $dbConn->query($sqlPublisher);
                    
                                /* Query to retrieve all category descriptions and ids for later use */
                                $sqlCategory = "SELECT *
                                                FROM NBL_category
                                                ORDER BY catDesc";
                                $categoryResults = $dbConn->query($sqlCategory);
                            }
                            catch(Exception $ex) {
                                return "<p>One of the queries failed.</p>";
                            }

                            /* Sanitize again to prevent XSS */
                            $input['bookTitle'] = filter_var($input['bookTitle'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);

                $output .= "<form action='updatingBook.php' method='get'>
                                <label>Book ISBN 
                                    <input type='text' name ='bookISBN' value='{$input['bookISBN']}' readonly>
                                </label>
                                <br>
                                <br>
                                <label>Book Title
                                    <input type='text' name='bookTitle' value='{$input['bookTitle']}'>
                                </label>
                                <br>
                                <br>
                                <label>Book Year
                                    <input type='text' name='bookYear' value='{$input['bookYear']}'>
                                </label>
                                <br>
                                <br>
                                <label>Publisher Name
                                    <select name='pubID'>";

                            while($publisherObj = $publisherResults->fetchObject()) {
                                if($input['pubID'] == $publisherObj->pubID) {
                                    $selected = 'selected';
                                }
                                else {
                                    $selected = '';
                                }
                                $output.= "<option value='{$publisherObj->pubID}' $selected>{$publisherObj->pubName}</option>";
                            }


                    $output .=   "</select>
                               </label>
                               <br>
                               <br>
                               <label>Category Description
                                    <select name='catID'>";

                            while($categoryObj = $categoryResults->fetchObject()) {
                                if($input['catID'] == $categoryObj->catID) {
                                    $selected = 'selected';
                                }
                                else {
                                    $selected = '';
                                }
                                $output .= "<option value='{$input['catID']}' $selected>{$categoryObj->catDesc}</option>";
                            }

                    $output .=   "</select>
                                </label>
                                <br>
                                <br>
                                <label>Book Price
                                    <input type='text' name ='bookPrice' value='{$input['bookPrice']}'>
                                </label>
                                <br>
                                <br>
                                    <input type='submit' value='Update book' id = 'btn'> 
                            </form>
                            </div>

                            <img src = 'img/cover.jpg' alt = 'library image'>
                        </div>
                    </body>
                    </html>";
                                    
                return $output;
            }

            function update_book(array $input) { // if process successful, display a message to the user
                try {
                    require_once ("functions.php");
                    $dbConn = getConnection();

                    /* Query for updating a book record */
                    $updateSQL = "UPDATE NBL_books SET bookTitle = :bookTitle, bookYear = :bookYear, pubID = :pubID, catID = :catID, bookPrice = :bookPrice
                                WHERE bookISBN = :bookISBN";
                    
                    /* Prepare the sql statement */
                    $stmt = $dbConn->prepare($updateSQL);
                    
                    /* Execute the query */
                    $stmt->execute(array(':bookTitle' => $input['bookTitle'], ':bookYear' => $input['bookYear'], ':pubID' => $input['pubID'], ':catID' => $input['catID'],
                                        ':bookPrice' => $input['bookPrice'], ':bookISBN' => $input['bookISBN']));
                }
                catch(Exception $ex) {
                    return "<p>Update unsuccessful. The query failed!<p>
                    </div>

                            <img src = 'img/cover.jpg' alt = 'library image'>
                        </div>
                    </body>
                    </html>";
                }

                return "<p>Successful process.</p>
                        <a href = 'chooseBookList.php' id = 'btn'> Go back </a>
                    </div>

                            <img src = 'img/cover.jpg' alt = 'library image'>
                        </div>
                    </body>
                    </html>";
            }
?>