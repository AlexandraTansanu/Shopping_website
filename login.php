<?php
    ini_set("session.save_path", "/home/unn_w19021004/sessionData");
    session_start();

    list($input, $errors) = validate_logon();
    if ($errors) {
        echo show_errors($errors);
    } 
    else {
        set_session('logged-in', 'true');

        /* Redirect to the originating page */
        if(isset($_SESSION['current_page'])) { // if it has an originating page then redirect to that
            header("Location: ". $_SESSION['current_page']);
        }
        else { // else redirect to the home page
            header("Location: http://unn-w19021004.newnumyspace.co.uk/admin.php");
        }
    }

    function validate_logon() {
        $input = array();
        $errors = array();
    
        /* Retrieve the username and the password from the form and validate them */
        $input['username'] = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
        $input['username'] = trim($input['username']);
    
        $input['password'] = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
        $input['password'] = trim($input['password']);

        try {
            /* Make a database connection */
            require_once("functions.php");
            $dbConn = getConnection();
            
            /* Query the users database table to get the password hash for the username entered by the user */
            $querySQL = "SELECT passwordHash FROM NBL_users 
                         WHERE username = :username";
            
            /* Prepare the sql statement */
            $stmt = $dbConn->prepare($querySQL);
            
            /* Execute the query */
            $stmt->execute(array(':username' => $input['username']));
            
            /* If something has been returned by the query, then the username has been found in the database so retrieve the associated password hash*/
            $user = $stmt->fetchObject();
            if ($user) {
                $passwordHash = $user->passwordHash;
        
                /* Verify that the two passwords match */
                if(!password_verify($input['password'], $passwordHash)) {
                    $errors[] = "<p>Incorrect password.</p>";
                }
            }
            else {
                $errors[] = "<p>Please input valid credentials.</p>";
                }
            } 
            catch (Exception $e) {
                return "<p>Query failed: " . $e->getMessage()."</p>";
            }
    
            return array($input, $errors);
    }
    
    function show_errors(array $errors) {
        $output = "<!doctype html>
                   <html lang = 'en'>
                    <head>
                        <meta charset = 'utf-8'>
                        <meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
                        <link  href = 'form.css' rel = 'stylesheet' type = 'text/css'>
                        <title>Northumbria Books Limited - Login</title>
                    </head>
                    <body>
                    
                    <div class = 'formWithImg'>
                        <div class = 'form'>";

                        /* Output the error */
                        foreach($errors as $error) {
                            $output .= $error;    
                        }
                        
                /* Redisplay the form */
                $output .= "<form method='post' action='login.php'>
                                <label for = 'username'> Username </label>
                                <input type='text' name='username' id = 'username'>
                                <br>
                                <label for = 'password'> Password </label>
                                <input type='password' name='password' id = 'password'>
                                <br>
                                <input type='submit' value='Login' id = 'btn'>
                            </form>
                        </div>

                        <img src = 'img/cover.jpg' alt = 'library image'>
                    </div>

                    </body>
                    </html>";
    
        return $output;
    }
?>