<?php

    include_once('user.php');
    include_once('branch.php');
    include_once('offers.php');
    include_once('utilities.php');
    include_once('account.php');	    
    include_once('employee.php');
    include_once('appointment.php');

    $ret=getAccountIdBalanceType("nata");	    
    deleteOffer("RitaSeguros", "bue boa","credit");
    
?>