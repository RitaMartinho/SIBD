<?php

    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/appointment.php');

    if(!isset($_GET['day']) || !isset($_GET['startHour']) || !isset($_GET['employee']) ){
	$_SESSION['message'] = 'Please fill out all the fields';
	header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
    else {
        $username = $_SESSION['username'];
        $day = $_GET['day'];
        $startHour = $_GET['startHour'];
        $name = explode(" ", $_GET['employee']);
        $first_name = $name[0];
        $last_name = $name[1];

        if(setAppointment($username, $day, $startHour, $first_name, $last_name)){
	$_SESSION['message'] = 'Appointment Scheduled';
        } else $_SESSION['message'] = 'Date and Hour already taken!';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>