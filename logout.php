<?php
    // Starts Session
	session_start();
    
    // Destroy all session variables
    session_destroy();

    // Redirect back to Login
    header("Location: login.php");
?>