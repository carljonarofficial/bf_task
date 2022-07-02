<?php
    // Starts Session
	session_start();

    /**
     * Set the Session into Flash Data
    */
    function set_flashdata($variable) {
        // Check if the Session Variable Exists
        if (isset($_SESSION[$variable])) {
            $flash_data = $_SESSION[$variable];
            unset($_SESSION[$variable]);
            return $flash_data;
        } else {
            return null;
        }
    }
?>