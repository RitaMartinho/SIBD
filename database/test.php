<?php

    include_once('user.php');
    include_once('branch.php');
    include_once('offers.php');
    include_once('account.php');
    include_once('employee.php');
    include_once('appointment.php');
    include_once('connection.php');
    include_once('rating.php');
    include_once('client.php');

    $ret=getClientInfo("Charles", "Newman");

    var_dump($ret);


?>