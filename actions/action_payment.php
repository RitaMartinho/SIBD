<?php 
    include_once('../database/connection.php');
    include_once('../database/account.php');
    include_once('../database/users.php');
    
    if(!isset($_POST['destiny']) || !isset($_POST['quantity']) ){
        //TODO
        //PRINT ERROR MESSAGE
    }
    else {
        $destiny =$_POST['destiny'];
        $quantity =$_POST['quantity'];
        //TODO
        // SQL ADD $quantity to $destiny
    }

    // $origin = getAccountID($_SESSION['username']);
    if (checkIfPaymentIsPossible($_POST['quantity'], $_POST['destiny'], $origin)) {
        echo "GOOD PAYMENT";
    }else echo "NO GOOD";
?>