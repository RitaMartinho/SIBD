<?php
    include_once('../database/connection.php');
    include_once('../database/employee.php');

    $string=explode(".", $_POST['branchAndRoom']);
    $room_id=$string[0];
    $branch_id=$string[1];
    $room_id=intval($room_id);
 
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['address']) && isset($room_id) && isset($branch_id) && isset($_POST['phoneNumber']) ){
        $employeeID = addEmployee($_POST['firstName'], $_POST['lastName'], $_POST['address'], $_POST['phoneNumber'], $branch_id, $room_id);
    }

    if(!empty($_FILES['employeePic']['name'])){
        // Generate filenames for original and small files
        $originalFileName = "../database/images/employees/originals/$employeeID.jpg";
        $smallFileName    = "../database/images/employees/small/$employeeID.jpg";

        // Move the uploaded file to its final destination
        if(file_exists($originalFileName)){
            unlink($originalFileName);
        } 
        move_uploaded_file($_FILES['employeePic']['tmp_name'], $originalFileName);

        // Crete an image representation of the original image
        $original = imagecreatefromjpeg($originalFileName);
        
        $width = imagesx($original);     
        $height = imagesy($original);    
        $square = min($width, $height);   

        // Create and save a small square thumbnail
        $small = imagecreatetruecolor(150, 150);
        imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 150, 150, $square, $square);
        imagejpeg($small, $smallFileName);
    }

    header('Location: ../pages/employees.php');

?>