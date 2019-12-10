<?php
    include_once('../database/user.php');
    include_once('../database/connection.php');
    

    if($_POST['confirmpassword'] == $_POST['password']){
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName=$_POST['lastName'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        createUser($firstName, $lastName, $address, $username, $password);
        include_once('../includes/sessions.php');
        $_SESSION['username'] = $username;
        header("Location: ../pages/generalview_user.php");
    } else echo ("<h1>PASSWORDS DONT MATCH!</h1>");


?>