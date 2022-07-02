<?php
    // Import Db Connection
    require "../db-connection.php";

    // Starts Session
	session_start();

    /**
     * To login an acount
    */
    if (!empty($_POST['account-action']) && $_POST['account-action'] == "login") {
        $email = escape_this_string($_POST['inputEmail']);
        $password = escape_this_string($_POST['inputPassword']);
        $account_record = check_account_existence($email);
        // Check if the account exists
        if (!empty($account_record)) {
            // Check if input password matches with record
            if (password_verify($password, $account_record['password'])) {
                // Stores Session Variables and proceed to dashboard page
                $_SESSION['user_id'] = $account_record['id'];
				$_SESSION['first_name'] = $account_record['first_name'];
                $_SESSION['last_name'] = $account_record['last_name'];
                $_SESSION['is_admin'] = $account_record['is_admin'];
				$url = "dashboard.php";
            } else {
                // Sets the Session Variable for existing email message
                $_SESSION['registration-status'] = "Invalid password!";
                $url = "login.php";
            }
        } else {
            // Sets the Session Variable for existing email message
            $_SESSION['registration-status'] = "Account doesn't exists!";
            $url = "login.php";            
        }
        // Redirect back to specific page
        header("Location: ../../$url");
    }

    /**
     * To register an account
     */
    if (!empty($_POST['account-action']) && $_POST['account-action'] == "register") {
        $first_name = escape_this_string($_POST['inputFirstName']);
        $last_name = escape_this_string($_POST['inputLastName']);
        $email = escape_this_string($_POST['inputEmail']);
        $password = password_hash(escape_this_string($_POST['inputPassword']), PASSWORD_DEFAULT);
        // Check if the email exists
        if (!empty(check_account_existence($email))) {
            // Sets the Session Variable for existing email message
            $_SESSION['registration-status'] = "Email address already exists!";
            
            // Redirect back to registration page
            header("Location: ../../register.php");
        } else {
            // Count all record
            $all_record = fetch_record("SELECT COUNT(*) AS num_rows FROM accounts");
            // Check if has no account record yet
            if ($all_record["num_rows"] > 0) {
                $is_admin = 1;
            } else {
                $is_admin = 0;
            }
            // Create Account and Get Insert ID
			$insert_id = run_mysql_query("INSERT INTO accounts (first_name, last_name, email, password, position, is_admin, status, created_at) VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$password}', NULL, {$is_admin}, 'active', NOW())");
            // Check if Runs Successfully
			if ($insert_id > 0) {
                // Stores Session Variables and proceed to dashboard page
				$_SESSION['user_id'] = $insert_id;
				$_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['is_admin'] = $is_admin;
				$url = "dashboard.php";
			} else {
				$_SESSION['notification'] = "An error has occured, please try again!.";
				$url = "register.php";
			}

            // Redirect to specific page
            header("Location: ../../$url");
        }
    }

    /**
     * Check account existence function
    */
    function check_account_existence($email) {
        // Fetch Email Record
        $account_record = fetch_record("SELECT id, first_name, last_name, email, password, is_admin FROM accounts WHERE email = '{$email}'");

        // Check if the account exists
        if ($account_record) {
             return $account_record;
        }

        return null;
    }
       
?>