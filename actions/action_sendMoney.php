<?php 
    include_once('../database/connection.php');
    include_once('../database/account.php');
    include_once('../database/user.php');
    include_once('../includes/sessions.php');
    
     $origin = getAccountID($_SESSION['username']);
    if(checkIfSendMoneyIsPossible($_POST['quantity'], $_POST['destiny'], $origin)){
        header("Location:../pages/generalview_user.php");
    }else echo "NO GOOD";
?>