<?php
    // Import Special Session Module And Login Auth
    include_once "modules/session-module.php";
    include_once "modules/login-auth.php";

    // Import Db Connection
    require "modules/db-connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <head>
        <?php include_once "template/meta-info.php"; ?>
        <title>Assignments - BF Task</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once "template/navbar.php";?>
        <div id="layoutSidenav">
            <?php include_once "template/sidebar.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid position-relative px-4" id="layoutContainer_content">
                        <div class="toast-container position-fixed top-3 end-0 me-3" style="z-index: 11">
                            <!-- Toasts Placeholder -->
                        </div>
                        <!-- Content Header -->
                        <h1 class="mt-4">Assignments</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">The system assignments or tasks repository</li>
                        </ol>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>