<?php


    //WORKS
    //returns true if account_id is on database and false if not
    function checkIfAccountExists($account_id){

        global $db;
        $stmt= $db->prepare('SELECT * from account where account_id = ?');
        $stmt->execute(array($account_id));

        $ret= $stmt->fetch();

        if( $ret == null){

            return false;
        }
        else{

            return true;
        }
    }

    //WORKS
    //gets balance on the account by username
    function getBalanceAccount($username){

        global $db;
        $stmt= $db->prepare('SELECT balance from account 
        JOIN(
        
            SELECT client_id AS client
            FROM person
                JOIN
                client ON client_id = person_id
            WHERE username = ?
            )
            ON client=account_client');

        $stmt->execute(array($username));

        return $stmt->fetch();
    }

    function getAccountId($username){

        global $db;
        $stmt= $db->prepare('SELECT account_id from account 
        JOIN(
        
            SELECT client_id AS client
            FROM person
                JOIN
                client ON client_id = person_id
            WHERE username = ?
            )
            ON client=account_client');

        $stmt->execute(array($username));

        return $stmt->fetch();  
    }

    //WORKS
    function getAccountIdBalanceType($username){

        global $db;
        $stmt= $db->prepare('SELECT account_id, balance, type from account 
        JOIN(
        
            SELECT client_id AS client
            FROM person
                JOIN
                client ON client_id = person_id
            WHERE username = ?
            )
            ON client=account_client');

        $stmt->execute(array($username));

        return $stmt->fetch();  
    }

    //WORKS
    function getNumberOfCards($username){

        global $db;
        $stmt= $db->prepare('SELECT count(*) as nrOfCards from card where associated_account = (
        
        SELECT account_id from account 
        JOIN(
        
            SELECT client_id AS client
            FROM person
                JOIN
                client ON client_id = person_id
            WHERE username = ?
            )
            ON client=account_client)');

        $stmt->execute(array($username));
        return $stmt->fetch();
    }

    function getInfoCards($username){

        global $db;
        $stmt= $db->prepare('SELECT cvv, expiry_date, card_type from card
        JOIN 
            typeOfCard ON type_of_card = card_type_id
            WHERE = (SELECT account_id from account 
                JOIN(
                
                    SELECT client_id AS client
                    FROM person
                        JOIN
                        client ON client_id = person_id
                    WHERE username = ?
                    )
                    ON client=account_client)');

        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }

?>