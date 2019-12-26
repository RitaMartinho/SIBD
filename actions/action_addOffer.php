<?php

    include_once('../database/offers.php');
    include_once('../database/connection.php');

    $ret=addOffer($_GET['Insurance'],$_GET['Insurer'], $_GET['CardType']);
    if($ret===true){
        header('Location: ../pages/offers.php');
    }
?>