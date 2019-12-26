<?php

    include_once('../database/offers.php');
    include_once('../database/connection.php');

    if(isset($_GET['Insurance']) && isset($_GET['Insurer']) && isset($_GET['CardType'])){

        $ret=addOffer($_GET['Insurance'],$_GET['Insurer'], $_GET['CardType']);
        if($ret===true){
            header('Location: ../pages/offers.php');
        }
    }
    
?>