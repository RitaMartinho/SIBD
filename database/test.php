<?php

    include_once('user.php');
    include_once('branch.php');
    include_once('offers.php');
    include_once('utilities.php');
    include_once('account.php');

    $ret=getAccountIdBalanceType("nata");
    var_dump($ret);
    
?>