<?php

    function getListEmployees($username){

        global $db;

        $stmt=$db->prepare('SELECT first_name,last_name
        FROM person
        JOIN
        (
            SELECT employee_id
            FROM employee
             WHERE employee_branch_id = (
                SELECT client_branch
                FROM client
                     JOIN
                     (
                        SELECT client_id AS client
                        FROM person
                        JOIN
                        client ON client_id = person_id
                        WHERE username = ?
                     )
                    ON client_id = client
             )
        )
        ON employee_id = person_id');

        $stmt->execute(array($username));

        return $stmt->fetch();
    }


    function getInfoEmployee($first_name, $last_name){

        global $db;

        $stmt= $db->prepare('SELECT employee_id, first_name, last_name, address, employee_branch_id as branch, employee_room_id as room_id
        FROM employee JOIN( 
            SELECT *
            from person where (first_name like ? and last_name like ?)
            )
            ON employee_id=person_id');

        $stmt->execute(array($first_name, $last_name));

        return $stmt->fetchAll();
    }

    function fireEmployee($first_name, $last_name){

        global $db;

        $stmt= $db->prepare('DELETE from person where first_name like ? and last_name like ?');
        $stmt->execute(array($first_name, $last_name));
        
    }

    //after checking which rooms are available
    function addEmployee($first_name, $last_name, $address, $phone_number, $branch_id, $room_id ){

        global $db;

        $stmt=$db->prepare('INSERT INTO person VALUES(null,?,?,?,null, null, "0")');
        $stmt->execute(array($first_name, $last_name, $address));


        $stmt=$db->prepare('SELECT person_id FROM person ORDER BY person_id DESC LIMIT 1'); // to get by id and not names because we could have 2 employees with the same name
        $stmt->execute();
        $person_id=$stmt->fetchColumn();

        $stmt=$db->prepare('INSERT INTO employee VALUES(?,?,?,?)');
        $stmt->execute(array($person_id,$phone_number, $branch_id, $room_id));

    }



?>