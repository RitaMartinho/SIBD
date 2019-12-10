<?php
    include_once('connection.php');

    //works
    //gets client's offers by account_id
    function getClientsOffer($account_id){

        global $db;

        $stmt= $db->prepare('SELECT distinct insurance_name, insurer_name

        FROM insurance,insurer
               INNER JOIN
               (
                   SELECT insurer_id as insurer,
                          insurance_id AS insurance
                     FROM offers
                          INNER JOIN
                          card ON (card_type_id = type_of_card) 
                          INNER JOIN
                          account ON (associated_account = account_id) 
                    WHERE account_client = ?
               )
               ON (insurance = insurance_id and insurer=insurer_id)');

        $stmt->execute(array($account_id));
        return $stmt->fetchAll();

    }

    //WORKS
    //gets number of offers by receiving the array of offers
    function getNumberOfOffers($array){

        return sizeof($array);
    }


?>