<?php 

    if(!isset($_POST['username'])) {
        header('Location: ../pages/generalview_user.php');
        //TODO
        //PRINT ERROR MESSAGE
     }
    else{
        //TODO
        // if(VERIFY USER-PASSWORD){
            header('Location: ../pages/generalview_user.php');
        //}

    }

?>