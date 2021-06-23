<?php
    ini_set("session.save_path", "/home/unn_w19021004/sessionData");
    session_start();

    $_SESSION = array();

    session_destroy();
    
    /* Redirect to the homepage */
    header("Location: http://unn-w19021004.newnumyspace.co.uk/index.html")
?>