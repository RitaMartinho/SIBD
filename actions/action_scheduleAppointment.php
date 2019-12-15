<?php

    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/appointment.php');

    var_dump($_GET);
    
    if(!isset($_GET['day']) || !isset($_GET['startHour']) || !isset($_GET['employee']) ){
        //TODO
        ?> <h1>ERROR</h1><?php

        //PRINT ERROR MESSAGE
    }
    else {
        $username = $_SESSION['username'];
        $day = $_GET['day'];
        $startHour = $_GET['startHour'];
        $name = explode(" ", $_GET['employee']);
        $first_name = $name[0];
        $last_name = $name[1];

        if(setAppointment($username, $day, $startHour, $first_name, $last_name)){
            ?> <h1>APPOINTMENT ADDED</h1><?php
        } else ?> <h1>APPOINTMENT ADDED</h1><?php
        // SQL ADD appointment
    }
?>