<?php

    include_once('../database/employee.php');
    include_once('../database/connection.php');

    fireEmployee($_GET['firstName'], $_GET['lastName']);
    /*A WAY TO CHEK IF ACTUALLY FIRED???*/

    header('Location: ../pages/employees.php');
?>