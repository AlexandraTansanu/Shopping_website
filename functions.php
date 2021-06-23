<?php
function getConnection() {
    try {
        $connection = new PDO("mysql:host=localhost; dbname=unn_w19021004", "unn_w19021004", "Alexandra!");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch(Exception $e) {
        throw new Exception("Connection error ".$e->getMessage(), 0, $e);
    }
}

function set_session($key, $value) {
    // Set key element = value
    $_SESSION[$key] = $value;
    return true;
 }

 function get_session($key) {
    if(isset($_SESSION[$key])) {
        $sessionValue = $_SESSION[$key];
        return $sessionValue;
    }

    return;
 }

 function check_login($key) {
     if(get_session($key)) { // If it is true 
        return true;
     }
     else {
         return false;
     }
 }
?>