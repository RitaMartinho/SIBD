<?php

    include_once('../database/offers.php');
    include_once('../database/connection.php');

    $ret=deleteOffer($_GET['Insurer'],$_GET['Insurance'], $_GET['CardType']);
    var_dump($ret);
    if($ret===true){
        header('Location: ../pages/offers.php');
    }
?>