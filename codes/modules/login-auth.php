<?php
    // Check if not currently logged in
    if (!isset($_SESSION["user_id"])) {
        header("Location: ./login.php");
    } 
?>