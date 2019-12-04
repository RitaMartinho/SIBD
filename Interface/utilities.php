<?php 

    function searchBirthdate(){
        $dbh = new PDO('sqlite:bank_db.db');

        $stmt= $dbh->prepare('SELECT birthdat from client ');
        $stmt=execute(array($birthdate));

        while($row= $stmt->fetch()){
            
            echo $rom['birthdate'];
        }

    }   
?>