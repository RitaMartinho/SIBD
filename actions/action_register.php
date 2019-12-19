<?php
    include_once('../database/connection.php');
    include_once('../database/user.php');
    include_once('../database/branch.php');
    
    // var_dump($_POST);
    // die;

    if($_POST['confirmpassword'] === $_POST['password']){
        $username       =   $_POST['username'];
        $firstName      =   $_POST['firstName'];
        $lastName       =   $_POST['lastName'];
        $address        =   $_POST['address'];
        $branchAddress  =   $_POST['branchAddress'];
        $password       =   $_POST['password'];
        $birthday       =   $_POST['birthday'];
        $taxID          =   $_POST['taxID'];

        // ADD BIRHTDAY AND TAXID TO REGISTER PAGE

        createUser($firstName, $lastName, $address, $username, $password);
        $clientID=getPersonID($username);
        $branchID=getBranchID($branchAddress);
        // var_dump($clientID);
        // var_dump($branchID);
        // die;
        addClient($clientID, $birthday, $taxID, $branchID);
        attributeAccount($clientID);
        attributeCard($clientID);
        
        include_once('../includes/sessions.php');
        $_SESSION['username'] = $username;
        header("Location: ../pages/generalview_user.php");
    } else echo ("<h1>PASSWORDS DONT MATCH!</h1>");



?>