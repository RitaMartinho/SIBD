<?php 

    // if(!isset($_POST['username'])) {
    //     header('Location: ../pages/generalview_admin.php');
    //     //TODO
    //     //PRINT ERROR MESSAGE
    //  }
    // else{
    //     //TODO
    //     //CHECK IF USER IS ADMIN
    //         header('Location: ../pages/generalview_admin.php');
    //     // if(VERIFY USER-PASSWORD){
    //         //header('Location: ../pages/generalview_user.php');
    //     //}
    // }

    include_once('../includes/sessions.php');
    include_once('../database/user.php');
    include_once('../database/connection.php');
  
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if (verifyUser($username, $password)== true) {
      $_SESSION['username'] = $username;
      header('Location: ../pages/generalview_user.php');
    } else {
      header('Location: ../pages/generalview_admin.php');
    }

?>