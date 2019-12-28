<?php

    include_once('../includes/sessions.php');
    include_once('../database/employee.php');
    include_once('../database/connection.php');

    fireEmployee(intval($_GET['id']));
    $_SESSION['message'] = "Employee fired!";

    header('Location: ' . $_SERVER['HTTP_REFERER']);  
?>