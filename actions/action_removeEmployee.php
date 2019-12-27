<?php

    include_once('../includes/sessions.php');
    include_once('../database/employee.php');
    include_once('../database/connection.php');
    // var_dump($_GET);
    // die;
    // fireEmployee(intval($_GET['id']));
    fireEmployee(10);
    $_SESSION['message'] = "Employee fired!";
    header('Location: ../pages/employees.php');
?>