<?php
    // Check if not currently logged in
    if (!isset($_SESSION["user_id"])) {
        header("Location: ./login.php");
    } else {
        // Fecth current logged in id 
        $current_loggedin_id = $_SESSION["user_id"];

        // Current Date and Time
        $current_datetime = date('Y-m-d H:i:s');
    }
?>