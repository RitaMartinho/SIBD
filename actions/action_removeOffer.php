<?php

    include_once('../database/offers.php');
    include_once('../database/connection.php');

    if(isset($_GET['Insurance']) && isset($_GET['Insurer']) && isset($_GET['CardType'])){
        $ret=deleteOffer($_GET['Insurer'],$_GET['Insurance'], $_GET['CardType']);
        if($ret===true){
            header('Location: ../pages/offers.php');
        }
    }
    
?>