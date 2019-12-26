<?php
    include_once('../database/connection.php');
    include_once('../database/user.php');
    include_once('../database/branch.php');
    include_once('../includes/sessions.php');


    if($_POST['confirmpassword'] === $_POST['password']){
        $username       =   $_POST['username'];
        $firstName      =   $_POST['firstName'];
        $lastName       =   $_POST['lastName'];
        $address        =   $_POST['address'];
        $branchAddress  =   $_POST['branchAddress'];
        $password       =   $_POST['password'];
        $birthday       =   $_POST['birthday'];
        $taxID          =   $_POST['taxID'];

        try {
            createUser($firstName, $lastName, $address, $username, $password);
            $clientID=getPersonID($username);
            $branchID=getBranchID($branchAddress);
            addClient($clientID, $birthday, $taxID, $branchID);
            attributeAccount($clientID);
            attributeCard($clientID);
            include_once('../includes/sessions.php');
            $_SESSION['username'] = $username;
            header("Location: ../pages/generalview_user.php");
        } catch(PDOException $e) {
            if (strpos($e->getMessage(), 'users_pkey') !== false)
                $_SESSION['message'] = 'Username already exists!';
            else
                $_SESSION['message'] = 'Registration failed!';
            header('Location: ../pages/register.php');
        }
    } else $_SESSION['message'] = 'Passwords have to match!';
    



?>