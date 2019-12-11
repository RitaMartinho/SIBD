<?php

    require_once('branch.php');

    $nrEmployees=null;
    $nrClients=null;
    $nrRooms=null;

    if(isset($_GET['nrEmployees'])){
        $nrEmployees= $_GET['nrEmployees']; 
    }

    if(isset($_GET['nrClients'])){
        $nrClients= $_GET['nrClients'];
    }

    if(isset($_GET['nrRooms'])){
        $nrRooms=$_GET['nrRooms'];
    }

    if(isset($_GET['page']))
        $page=$_GET['page'];
    else
        $page=1;

    $branchInfo= getBranchAdmin($nrEmployees, $nrClients, $nrRooms, $page);

    


?>