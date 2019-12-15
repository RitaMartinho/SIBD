<?php
    include_once('user.php');

    //WORKS
    //gets client_branch_id from username
    function getClientBranch($username){

        global $db;

        $stmt= $db->prepare('SELECT client_branch
        FROM client
             JOIN
             (
                 SELECT client_id AS client
                   FROM person
                        JOIN
                        client ON client_id = person_id
                  WHERE username = ?
             )
             ON client_id = client');


        $stmt->execute(array($username));

        return $stmt->fetch();
    }

    //WORKS
    //gets chief name from username
    function getChiefBranch($username){

        global $db;

        $stmt=$db->prepare('SELECT first_name,
        last_name
        FROM person
        JOIN
        employee ON person_id = employee_id
        WHERE employee_id = (
    
            SELECT employee_id
            FROM (
                        SELECT employee_id,
                            employee_branch_id
                        FROM employee
                            JOIN
                            relationship ON employee_id = chief_id
                    )
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
                    ON client_id = client))');

        $stmt->execute(array($username));
        return $stmt->fetch();
    }

    //WORKS
    //gets branch address from username

    function getBranchAddress($username){

        global $db;

        $stmt=$db->prepare('SELECT address from branch JOIN(
        
        SELECT client_branch as branch
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
             ON branch_id=branch;');

        $stmt->execute(array($username));
        return $stmt->fetch();
    }

    //WORKS
    //gets nr of employees on branch from username
    function getNrEmployeesBranch($username){

        global $db;

        $stmt=$db->prepare('SELECT count(*) as nrEmployees from employee
        WHERE employee_branch_id=(
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
                ON client_id = client)');
        
        $stmt->execute(array($username));
        return $stmt->fetch();
    }

    //WORKS
    //draw according with branch address
    function drawIFrame($branch_address){

        if(strcmp("74 Belmont Ave, Belleville, New Jersey", $branch_address)==0){

            ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.3065515649546!2d-74.1843172!3d40.7772743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c254e4eabb71ef%3A0x66c27b361ac14028!2s74%20Belmont%20Ave%2C%20Belleville%2C%20NJ%2007109%2C%20USA!5e0!3m2!1sen!2spt!4v1575931420134!5m2!1sen!2spt"></iframe>
            <?php
        }
        else if(strcmp("258 N 7th St, Newark", $branch_address)==0){
            ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.160059888975!2d-74.1884793!3d40.7585042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c254914c951b37%3A0xd678bcc1145171e7!2s258%20N%207th%20St%2C%20Newark%2C%20NJ%2007107%2C%20USA!5e0!3m2!1sen!2spt!4v1575931565433!5m2!1sen!2spt"></iframe>
            <?php
        }
        else if(strcmp("9821 State Rte 1019, Kempton", $branch_address)==0){

            ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3028.186180019196!2d-75.853212!3d40.625775899999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c5cee0240c1c39%3A0x4fd46ae4d3e3d24b!2sState%20Rte%201019%2C%20Albany%20Township%2C%20PA%2019529%2C%20USA!5e0!3m2!1sen!2spt!4v1575931642519!5m2!1sen!2spt"></iframe>
            <?php
        }
        else if(strcmp("118 Belmont Ave, Belleville", $branch_address)==0){
            ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.2551854858766!2d-74.1831476!3d40.7784037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c254e3562031d1%3A0x53fb27baae6bc888!2s118%20Belmont%20Ave%2C%20Belleville%2C%20NJ%2007109%2C%20USA!5e0!3m2!1sen!2spt!4v1575931700908!5m2!1sen!2spt"></iframe>
            <?php
        }
        if(strcmp("215 Alienta Ln, Ladera Ranch, California", $branch_address)==0){

            ?>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.1651034062693!2d-117.598639!3d33.54908639999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dceda059b528dd%3A0x46308ca517e720d!2s215%20Alienta%20Ln%2C%20Ladera%20Ranch%2C%20CA%2092694%2C%20USA!5e0!3m2!1sen!2spt!4v1575931797853!5m2!1sen!2spt"</iframe>
            <?php
            
        }

    }


    function getBranchAdmin($criteria, $page, $criteriaASCDESC){
        
        global $db;

        

        if($criteria != null && $criteriaASCDESC != null){


            $stmt=$db->prepare('SELECT branch_id,
            address,
            nrEmployees,
            nrClients,
            nrRooms
            FROM branch
            JOIN
            (
                SELECT count(*) AS nrEmployees,
                    employee_branch_id
                FROM employee
                GROUP BY employee_branch_id
                
            )
            ON employee_branch_id = branch_id
            JOIN
            (
                SELECT count(*) AS nrClients,
                    client_branch
                FROM client
                GROUP BY client_branch
                
            )
            ON client_branch = branch_id
            JOIN
            (
                SELECT count(*) AS nrRooms,
                    room_branch
                FROM room
                GROUP BY room_branch
                
            )
            ON room_branch = branch_id
            ORDER by nrRooms ASC
            LIMIT 2 offset 2*(? -1)');

            $full_criteria=$criteria." ".$criteriaASCDESC;
            //$stmt->bindParam(':s',$criteria);
            $stmt->execute(array($page));
            return $stmt->fetchAll();
            
        }

        else{

            $stmt=$db->prepare('SELECT branch_id,
            address,
            nrEmployees,
            nrClients,
            nrRooms
            FROM branch
            JOIN
            (
                SELECT count(*) AS nrEmployees,
                    employee_branch_id
                FROM employee
                GROUP BY employee_branch_id
                
            )
            ON employee_branch_id = branch_id
            JOIN
            (
                SELECT count(*) AS nrClients,
                    client_branch
                FROM client
                GROUP BY client_branch
                
            )
            ON client_branch = branch_id
            JOIN
            (
                SELECT count(*) AS nrRooms,
                    room_branch
                FROM room
                GROUP BY room_branch
                
            )
            ON room_branch = branch_id
            LIMIT 2 offset 2*(? -1)');

            $stmt->execute(array($page));
            return $stmt->fetchAll();
        }
    }
    //get a list of rooms available in a branch or null if there isn't
    function getRoomsAvailable($branch_id){

        global $db;

        $stmt= $db->prepare('SELECT room_id
            FROM (
                SELECT room_id,
                    room_branch AS branch
                FROM room
                WHERE NOT EXISTS (
                            SELECT employee_room_id
                                FROM employee
                                WHERE employee_room_id = room_id
                        )
            )
            WHERE branch = ?');

        $stmt->execute(array($branch_id));
        return $stmt->fetchAll();
                
    }


    function getNumberOfBranchs(){

        global $db; 

        $stmt= $db->prepare('SELECT count(*) as nrOfBranchs from branch');
        $stmt->execute();

        return $stmt->fetchColumn();
    }
?>