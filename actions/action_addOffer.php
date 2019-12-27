<?php

    include_once('../database/offers.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');


    if(isset($_GET['Insurance']) && isset($_GET['Insurer']) && isset($_GET['CardType'])){

        $ret=addOffer($_GET['Insurance'],$_GET['Insurer'], $_GET['CardType']);
        if($ret===true){
            $_SESSION['message'] = "Offer added!"; 
        }
        else $_SESSION['message'] = "Error while adding offer!";
    }
    header('Location: ../pages/offers.php');
    
?>