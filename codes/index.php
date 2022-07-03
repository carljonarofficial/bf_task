<?php
    // Starts Session
	session_start();
    $url = "login.php";
    
    // Check if currently logged in this browser
    if (isset($_SESSION["user_id"])) {
         $url = "dashboard.php";
    }
    header("Location: $url");
?>