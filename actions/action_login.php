<?php 

    if(!isset($_POST['username'])) {
        header('Location: ../pages/generalview_admin.php');
        //TODO
        //PRINT ERROR MESSAGE
     }
    else{
        //TODO
        //CHECK IF USER IS ADMIN
            header('Location: ../pages/generalview_admin.php');
        // if(VERIFY USER-PASSWORD){
            //header('Location: ../pages/generalview_user.php');
        //}

    }

?>