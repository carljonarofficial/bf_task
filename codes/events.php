<?php
    // Import Special Session Module And Login Auth
    include_once "modules/session-module.php";
    include_once "modules/login-auth.php";

    // Import Db Connection
    require "modules/db-connection.php";

    // Get all Event Data
    $event_data = fetch_all("SELECT * FROM events");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "template/meta-info.php"; ?>
        <title>Events - BF Task</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once "template/navbar.php";?>
        <div id="layoutSidenav">
            <?php $active_link = "events"; include_once "template/sidebar.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid position-relative px-4" id="layoutContainer_content">
                        <?php include_once "template/toasts-placeholder.php";?>
                        <!-- Content Header -->
                        <h1 class="mt-4">Events</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">The system events repository</li>
                        </ol>
                        <!-- Add Event Button -->
                        <button type="button" class="btn btn-success mb-4" id="add-event-btn"><i class="fa-solid fa-plus"></i> Add</button>
                        <!-- Events Table Card -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="events-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($event_data as $row) { ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-primary w-100 view-event" value="<?= $row['id']?>"><i class="fa-solid fa-eye"></i> View</button>
                                                </td>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['title'] ?></td>
                                                <td><?= date_format(date_create($row['datetime_start']), "M d, Y h:iA") ?></td>
                                                <td><?= date_format(date_create($row['datetime_end']), "M d, Y h:iA") ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary btn-xs w-100" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i> More</button>
                                                        <div class="dropdown-menu p-1">
                                                            <button type="button" class="btn btn-warning w-100 mb-1 edit-event" value="<?= $row['id']?>"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                                            <button type="button" class="btn btn-danger w-100 delete-event" value="<?= $row['id']?>"><i class="fa-solid fa-trash"></i> Delete</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
                                    <form method="post" id="event-details-form">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Title:</label>
                                                <input type="text" class="form-control" name="eventTitle">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Text (Optional):</label>
                                                <textarea class="form-control" name="eventText" rows="3"></textarea>
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
                                            <input type="hidden" name="eventID">
                                            <input type="hidden" name="eventAction">
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
        <script src="js/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/moment.js"></script>
        <script src="js/scripts.js"></script>
        <!-- General Internal JS -->
        <script>
            var currentDateTime = currentDateTime();
            var eventsDatatables = null;

            // Initialize the Event Table Function
            function initEventTable() {
                eventsDatatables = new simpleDatatables.DataTable('#events-table', {
                    columns: [
                        // Disable sorting on More column
                        {
                            select: [0,5],
                            sortable: false
                        }
                    ]
                });
            }

            // Get All Event Data
            function getAllEventData() {
                $.ajax({
                    url: "./modules/processes/event-process.php",
                    method: "POST",
                    data: { "eventAction": "getAllEventsData" },
                    dataType: "json"
                }).done(function (data) {
                    eventsDatatables.destroy();
                    $("#events-table tbody").html("");
                    for (var i = 0; i < data.all_data.length; i++) {
                        var eventRow = "<tr>" +
                            '<td><button type="button" class="btn btn-primary w-100 view-event" value="'+data.all_data[i]["id"]+'"><i class="fa-solid fa-eye"></i> View</button></td>' +
                            '<td>'+data.all_data[i]["id"]+'</td>' +
                            '<td>'+data.all_data[i]["title"]+'</td>' +
                            '<td>'+moment(data.all_data[i]["datetime_start"]).format('MMM DD, YYYY hh:mmA')+'</td>' +
                            '<td>'+moment(data.all_data[i]["datetime_end"]).format('MMM DD, YYYY hh:mmA')+'</td>' +
                            '<td>' +
                                '<div class="dropdown">' +
                                    '<button class="btn btn-secondary btn-xs w-100" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i> More</button>' +
                                    '<div class="dropdown-menu p-1">' +
                                        '<button type="button" class="btn btn-warning w-100 mb-1 edit-event" value="'+data.all_data[i]["id"]+'"><i class="fa-solid fa-pen-to-square"></i> Edit</button>' +
                                        '<button type="button" class="btn btn-danger w-100 delete-event" value="'+data.all_data[i]["id"]+'"><i class="fa-solid fa-trash"></i> Delete</button>' +
                                    '</div>' +
                                '</div>' +
                            '</td>' +
                        '</tr>';
                        $("#events-table tbody").append(eventRow);
                    }
                    initEventTable();
                });
            }

            // Call an Event Table Init Function
            initEventTable();

            // Add Event Button
            $("#add-event-btn").click(function () {
                $("#event-modal-label").html("Add Event");
                $("input[name='eventTitle']").val("");
                $("textarea[name='eventText']").val("");
                $("input[name='eventDateTimeStart']").val(currentDateTime);
                $("input[name='eventDateTimeEnd']").val(addMinutes());
                $("input[name='eventID']").val(0);
                $("input[name='eventAction']").val("addEvent");
                $("#event-modal").modal('show');
            });

            // Edit Event Button
            $("#events-table").on("click", ".edit-event", function () {
                $.ajax({
                    url: "./modules/processes/event-process.php",
                    method: "POST",
                    data: {
                        "eventAction": "getEventRowData",
                        "eventID": $(this).val()
                    },
                    dataType: "json",
                    beforeSend: function(){
                        toggleLoadingModal();
                    }
                }).done(function (data) {
                    toggleLoadingModal();
                    if (data.status == "success") {
                        $("#event-modal-label").html("Edit Event");
                        $("input[name='eventTitle']").val(data.row_data["title"]);
                        $("textarea[name='eventText']").val(data.row_data["text"]);
                        $("input[name='eventDateTimeStart']").val(data.row_data["datetime_start"]);
                        $("input[name='eventDateTimeEnd']").val(data.row_data["datetime_end"]);
                        $("input[name='eventID']").val(data.row_data["id"]);
                        $("input[name='eventAction']").val("editEvent");
                        $("#event-modal").modal('show');
                    } else {
                        showToastAlert(".toast-container", "An error has occured!", "danger");
                    }
                }).fail(function () {
                    toggleLoadingModal();
                    showToastAlert(".toast-container", "An error has occured!", "danger");
                });
            });
            
            // Validate Date and Time Start
            $("input[name='eventDateTimeStart']").change(function () {
                var dateTimeStart = $(this).val();
                var dateTimeEnd = $("input[name='eventDateTimeEnd']").val();
                if (dateTimeStart >= dateTimeEnd) {
                    var newDateTime = addMinutes(+1, new Date(dateTimeStart));
                    $("input[name='eventDateTimeEnd']").val(newDateTime.replace(" ", "T"));
                }
            });

            // Validate Date and Time End
            $("input[name='eventDateTimeEnd']").change(function () {
                var dateTimeStart = $("input[name='eventDateTimeStart']").val();
                var dateTimeEnd = $(this).val();
                if (dateTimeEnd <= dateTimeStart) {
                    var newDateTime = addMinutes(+1, new Date(dateTimeStart));
                    $(this).val(newDateTime.replace(" ", "T"));
                }
            });

            // Save Event Details Form
            $("#event-details-form").submit(function () {
                // Validate Title
                 $("input[name='eventTitle']").removeClass("is-invalid");
                if ($("input[name='eventTitle']").val() == "") {
                    $("input[name='eventTitle']").addClass("is-invalid");
                } else {
                    var formData = $(this).serialize();
                    $.ajax({
                        url: "./modules/processes/event-process.php",
                        method: "POST",
                        data: formData,
                        dataType: "json",
                        beforeSend: function(){
                            toggleLoadingModal();
                        }
                    }).done(function(data) {
                        toggleLoadingModal();
                        $("#event-modal").modal('hide');
                        if (data.status == "success") {
                            if (data.action == "addEvent") {
                                showToastAlert(".toast-container", "Added an event successfully!", "success");
                            } else {
                                showToastAlert(".toast-container", "Edited an event successfully!", "success");
                            }
                            getAllEventData();
                        } else {
                            showToastAlert(".toast-container", "An error has occured!", "danger");
                        }
                    }).fail(function() {
                        toggleLoadingModal();
                        $("#event-modal").modal('hide');
                        showToastAlert(".toast-container", "An error has occured!", "danger");
                    });
                }
                return false;
            });
        </script>
    </body>
</html>