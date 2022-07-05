<?php
    // Import Special Session Module And Login Auth
    include_once "../../modules/session-module.php";
    include_once "../../modules/login-auth.php";

    // Import Db Connection
    require "../db-connection.php";

    // Check if Event Action Exists
    if (!empty($_POST['eventAction'])) {
        if ($_POST['eventAction'] == "getAllEventsData") {
            $process_status = array(
                "status" => "error",
                "all_data" => null
            );
            // Get all Events Data
            $events_data = fetch_all("SELECT * FROM events");

            // Check if Fetch Successfully
            if ($events_data !== null) {
                $process_status["status"] = "success";
                $process_status["all_data"] = $events_data;
            }

            // Return a JSON Encoded String
            echo json_encode($process_status);
        } else if ($_POST['eventAction'] == "getEventRowData") { // Get Event Row Data
            $process_status = array(
                "status" => "error",
                "row_data" => null
            );
            // Get an Event ID and Fetch Event Data
            $event_id = escape_this_string(strip_tags($_POST['eventID']));
            $event_data = fetch_record("SELECT * FROM events WHERE id = {$event_id}");
            
            // Check if Fetched Successfully
            if ($event_data !== false) {
                $process_status["status"] = "success";
                $process_status["row_data"] = $event_data;
            }

            // Return a JSON Encoded String
            echo json_encode($process_status);
        } else { // Save Event Row Data
            $process_status = array(
                "action" => null,
                "status" => "error"
            );

            // Fetch all Post into Event Data Array
            $event_data = array(
                "id" => escape_this_string(strip_tags($_POST['eventID'])),
                "title" => escape_this_string(strip_tags($_POST['eventTitle'])),
                "text" => escape_this_string(strip_tags($_POST['eventText'])),
                "datetime_start" => str_replace("T"," ",escape_this_string(strip_tags($_POST['eventDateTimeStart']))),
                "datetime_end" => str_replace("T"," ",escape_this_string(strip_tags($_POST['eventDateTimeEnd'])))
            );

            // Check if the Event Action either Add or Edit
            switch ($_POST['eventAction']) {
                case "addEvent":
                    // Update Process Action
                    $process_status["action"] = "addEvent";
                    
                    // Create an Event and get Insert ID
                    $insert_id = run_mysql_query("INSERT INTO events (created_by, title, text, datetime_start, datetime_end, created_at) VALUES({$current_loggedin_id},'{$event_data["title"]}','{$event_data["text"]}','{$event_data["datetime_start"]}','{$event_data["datetime_end"]}',NOW())");
                    
                    // Check if Runs Successfully
                    if($insert_id > 0) {
                        // Insert is Successfully
                        $process_status["status"] = "success";
                    }
                    break;
                case "editEvent":
                    // Update Process Action
                    $process_status["action"] = "editEvent";
                    
                    // Edit an Event
                    $edit_event = run_mysql_query("UPDATE events SET title = '{$event_data["title"]}', text = '{$event_data["text"]}', datetime_start = '{$event_data["datetime_start"]}', datetime_end = '{$event_data["datetime_end"]}', updated_at = NOW() WHERE id = {$event_data["id"]}");
                    
                    // Check if Run Successfully
                    if($edit_event == true) {
                        // Insert is Successfully
                        $process_status["status"] = "success";
                    }
                    break;
            }

            // Return a JSON Encoded String
            echo json_encode($process_status);
        }
    }
?>