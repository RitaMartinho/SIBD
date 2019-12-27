<?php

    include_once('../database/offers.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');

    if(isset($_GET['Insurance']) && isset($_GET['Insurer']) && isset($_GET['CardType'])){
        $ret=deleteOffer($_GET['Insurer'],$_GET['Insurance'], $_GET['CardType']);
        if($ret===true){
            $_SESSION['message'] = "Offer removed!"; 
        } else $_SESSION['message'] = "Error while deleting offer!";
    }
    header('Location: ../pages/offers.php');
    
?>