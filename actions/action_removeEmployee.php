<?php

    include_once('../database/employee.php');
    include_once('../database/connection.php');

    fireEmployee($_GET['id']);
    /*A WAY TO CHEK IF ACTUALLY FIRED???*/

    header('Location: ../pages/employees.php');
?>