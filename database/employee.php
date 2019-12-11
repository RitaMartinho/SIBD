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
        return $stmt->fetchAll();
    }
?> 
