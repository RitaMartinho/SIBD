<?php

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

    //WORKS BUT BETTER ASK PROFESSOR
    //add and offer 
    function addOffer($insurance, $insurer, $typeOfCard){
        global $db;
        $insurer_exists=false;
        $insurance_exists=false;
        $stmt = $db->prepare('SELECT card_type_id from typeOfCard where card_type = ?');
        $stmt->execute(array($typeOfCard));
        
        $card_id=$stmt->fetchColumn();
        
        //We have to do this since it's not a primary key
        //check if already exists in database an insurer with given name
        $stmt = $db->prepare('SELECT insurer_name, insurer_id from insurer');
        $stmt->execute();
        while ( $row = $stmt->fetch()){
            if(strcmp($row['insurer_name'],$insurer)==0){
                $insurer_exists=true;
                $insurer_id=$row['insurer_id'];
            }
        }      
        
        //check if already exists in database an insurance_name
        $stmt = $db->prepare('SELECT insurance_name, insurance_id from insurance');
        $stmt->execute();
        while ( $row = $stmt->fetch()){
           
            if(strcmp($row['insurance_name'],$insurance)==0){
                $insurance_exists=true;
                $insurance_id=$row['insurance_id'];
            }
        }
        //If not, add to the db and get id
        if(!$insurer_exists){
            $stmt=$db->prepare('INSERT INTO insurer VALUES(null, ?)');
            $stmt->execute(array($insurer));
            $stmt=$db->prepare('SELECT insurer_id from insurer where insurer_name = ?');
            $stmt->execute(array($insurer));
            $insurer_id=$stmt->fetchColumn();
        }
        //If not, add to the db and get id
        if(!$insurance_exists){
            $stmt=$db->prepare('INSERT INTO insurance VALUES(null, ?)');
            $stmt->execute(array($insurance));
            $stmt=$db->prepare('SELECT insurance_id from insurance where insurance_name = ?');
            $stmt->execute(array($insurance));
            $insurance_id=$stmt->fetchColumn();
        }
        //finally add the offer
        $stmt=$db->prepare('INSERT INTO offers VALUES (?, ?, ?)');
        $stmt->execute(array($insurer_id, $insurance_id,$card_id));
    }
    //MAYBE ADD A DROPDOWN TO BE EASIER?
    //works
    function deleteOffer($insurer, $insurance, $card_type){
        global $db;
        $stmt=$db->prepare('SELECT insurer_id, insurance_id, card_type_id
            FROM insurer
            INNER JOIN
            insurance
            INNER JOIN
            typeOfCard
            WHERE (insurer_name = ? and insurance_name=? and card_type=?)');
        $stmt->execute(array($insurer,$insurance, $card_type));
        $info=$stmt->fetch();
        $stmt=$db->prepare('DELETE FROM offers where (insurer_id =? and insurance_id=? and card_type_id=?) ');
        $stmt->execute(array($info['insurer_id'], $info['insurance_id'], $info['card_type_id']));
    }
    //WORKS
    //returns complete list of offers
    function getAllOffers(){
        global $db;
        $stmt= $db->prepare('SELECT distinct card_type, insurance_name, insurer_name
            FROM insurance,insurer, typeOfCard
                INNER JOIN
                (
                    SELECT insurer_id as insurer,
                            insurance_id AS insurance,
                            card_type_id as card
                        FROM offers
                            INNER JOIN
                            card ON (card_type_id = type_of_card) 
                            INNER JOIN
                            account ON (associated_account = account_id) 
                )
                ON (insurance = insurance_id and insurer=insurer_id and card=card_type_id)');
        $stmt->execute();
        return $stmt->fetchAll();
    }

?>