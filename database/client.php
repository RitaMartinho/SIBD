<?php

    //WORKS REALLY WELL
    //gets age by client_id
    function getClientAge($client_id){
    
        global $db;

        $stmt=$db->prepare('SELECT birthdate from client where client_id= ? ');
        $stmt->execute(array($client_id));
        $birthDate=$stmt->fetchColumn();
        $age = date_diff(date_create($birthDate), date_create('now'))->y;

        return $age;
    }

    //WORKS
    //gets client info except age which has to be calculated using the function above
    function getClientInfo($first_name, $last_name){

        global $db;

        $stmt=$db->prepare('SELECT client_id, first_name, last_name, address, client_branch as branch, account_id
                            FROM client JOIN( 
                                SELECT *
                                from person where (first_name like ? and last_name like ?)
                                )
                                ON client_id=person_id
                                JOIN(
                                    select account_id, account_client
                                    from account
                                )
                                ON client_id=account_client');
        $stmt->execute(array($first_name, $last_name));

        return $stmt->fetchAll();
    }

?>