<?php
    include_once('../database/connection.php');
    include_once('../database/employee.php');

    $string=explode(".", $_GET['branchAndRoom']);
    $room_id=$string[0];
    $branch_id=$string[1];
    $room_id=intval($room_id);
 

    if(isset($_GET['firstName']) && isset($_GET['lastName']) && isset($_GET['address']) && isset($room_id) && isset($branch_id) && isset($_GET['phoneNumber']) ){
        addEmployee($_GET['firstName'], $_GET['lastName'], $_GET['address'], $_GET['phoneNumber'], $branch_id, $room_id);
    }

    /** a way to check if actually added? */
    header('Location: ../pages/employees.php');

?>