<?php 
    include_once('../database/connection.php');
    include_once('../database/account.php');
    include_once('../database/users.php');
    

    // $origin = getAccountID($_SESSION['username']);
    if (checkIfPaymentIsPossible($_POST['quantity'], $_POST['destiny'], $origin)) {
        echo "GOOD PAYMENT";
    }else echo "NO GOOD";
?>