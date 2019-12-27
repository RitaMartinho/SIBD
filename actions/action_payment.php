<?php 
    include_once('../database/connection.php');
    include_once('../database/account.php');
    include_once('../database/user.php');
    include_once('../includes/sessions.php');
    
    $origin = getAccountID($_SESSION['username']);
    if (checkIfPaymentIsPossible($_POST['quantity'], $origin, $_POST['destiny'])) 
        header("Location:../pages/generalview_user.php");
    else header('Location: ' . $_SERVER['HTTP_REFERER']);


?>