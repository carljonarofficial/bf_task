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
        <title>Assignments | Tasks - BF Task</title>
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
                        <?php include_once "template/toasts-placeholder.php";?>
                        <!-- Content Header -->
                        <h1 class="mt-4">Assignments and Tasks</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">The system assignments or tasks repository</li>
                        </ol>
                        <div class="row">
                            <!-- Add Assignment or Task -->
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success" id="add-button" value="add-assignment"><i class="fa-solid fa-plus"></i> Add</button>  
                            </div>
                            <!-- Select Assignment or Task -->
                            <div class="col-sm-6">
                                <select class="form-select ms-auto" id="assignment-task-selector" aria-label="Assignment or Task" style="max-width: 140px;">
                                    <option value="assignments">Assignments</option>
                                    <option value="tasks">Tasks</option>
                                </select>
                            </div>
                        </div>
                        <!-- Search Assignment -->
                        <form method="post" id="search-assignment-form" style="max-width: 250px;">
                            <div class="input-group my-3">
                                <input type="text" class="form-control" name="search-assigment" placeholder="Search Assignment" aria-label="Search Assignment">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                        <!-- Assignments -->
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3" id="assignments-row">
                            <?php for ($i = 0; $i < 8; $i++) { ?>
                                <div class="col">
                                    <div class="card">
                                        <!-- Tag/s -->
                                        <div class="card-header">
                                            <p class="mb-0">No Tag</p>
                                        </div>
                                        <!-- Assignment Body -->
                                        <div class="card-body">
                                            <p class="h5 card-title"><a href="#" class="text-decoration-none">Assignment Test</a></p>
                                            <p class="mb-0">No due date</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-end">
                                            <!-- View Assignment -->
                                            <button type="button" class="btn btn-primary me-1"><i class="fa-solid fa-eye"></i> View</button>
                                            <!-- More Button -->
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i> More</button>
                                                <div class="dropdown-menu p-1">
                                                    <button type="button" class="btn btn-warning w-100 mb-1 edit-assignment"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                                    <button type="button" class="btn btn-danger w-100 delete-assignment"><i class="fa-solid fa-trash"></i> Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Assignment Modal -->
                        <div class="modal" id="assignment-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="assignment-modal-label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Assignment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" id="assignment-details-form">
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- General Internal JS -->
        <script>
            // Add Assignment Button
            $("#add-button").click(function () {
                $("#assignment-modal .modal-header .modal-title").html("Add Assignment");
                $("#assignment-modal").modal("show");
            });
        </script>
    </body>
</html>