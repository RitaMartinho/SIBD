<?php
    include_once('../database/user.php');
    include_once('../database/connection.php');
    
    var_dump($_POST);
    die;

    if($_POST['confirmpassword'] === $_POST['password']){
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName=$_POST['lastName'];
        $address=$_POST['address'];
        $branchAddress=$_POST['branchAddress'];
        $password=$_POST['password'];
        createUser($firstName, $lastName, $address, $username, $password);
        
        // $clientID= MAKE FUNCTION TO GET HIS person_ID 
        // and make $clientID equal to that
        //ADD ALSO TO CLIENT TABLE (client_id = person_id)
        
        include_once('../includes/sessions.php');
        $_SESSION['username'] = $username;
        header("Location: ../pages/generalview_user.php");
    } else echo ("<h1>PASSWORDS DONT MATCH!</h1>");


?>