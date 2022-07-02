<?php
    // Import Special Session Module And Login Auth
    include_once "modules/session-module.php";
    include_once "modules/login-auth.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "template/meta-info.php"; ?>
        <title>Events - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once "template/navbar.php";?>
        <div id="layoutSidenav">
            <?php include_once "template/sidebar.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Events</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">The system events repository</li>
                        </ol>
                        <!-- Add Event Button -->
                        <button type="button" class="btn btn-success mb-4" id="add-event-btn"><i class="fa-solid fa-plus"></i> Add</button>
                        <!-- Events Table Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="events-table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Start</th>
                                            <th>End</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Start</th>
                                            <th>End</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Event Modal -->
                        <div class="modal" id="event-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="event-modal-label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="event-modal-label">Add Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Title:</label>
                                                <input type="text" class="form-control" name="eventTitle" placeholder="Enter your title">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Text:</label>
                                                <textarea class="form-control" name="eventTExt" rows="3"></textarea>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label class="form-label">Date and Time Start:</label>
                                                    <input type="datetime-local" class="form-control" name="eventDateTimeStart">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Date and Time End:</label>
                                                    <input type="datetime-local" class="form-control" name="eventDateTimeEnd">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" name="event-action" value="add-event">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include_once "template/footer.php"; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- General Internal JS -->
        <script>
            var eventsTable = document.getElementById('events-table');
            if (eventsTable) {
                new simpleDatatables.DataTable(eventsTable);
            }

            // Add Event Button
            $("#add-event-btn").click(function () {
                $("#event-modal").modal('show');
            });
        </script>
    </body>
</html>