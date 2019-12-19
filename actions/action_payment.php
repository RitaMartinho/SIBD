<?php 
    include_once('../database/connection.php');
    include_once('../database/account.php');
    include_once('../database/user.php');
    include_once('../includes/sessions.php');
    
    $origin = getAccountID($_SESSION['username']);
    if (checkIfPaymentIsPossible($_POST['quantity'], $origin, $_POST['destiny'])) {
        echo "GOOD PAYMENT";
    }else echo "NO GOOD";
?>