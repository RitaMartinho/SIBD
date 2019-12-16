<?php 
    include_once('../includes/sessions.php');
    include_once('../database/user.php');
    include_once('../database/connection.php');
      
    $username = $_POST['username'];
    $password = $_POST['password'];
    // session_destroy();
    if (verifyUser($username, $password)== true) {
      $_SESSION['username'] = $username;
      header('Location: ../pages/generalview_user.php');
    } else {
      header('Location: ../pages/generalview_admin.php');
    }

?>