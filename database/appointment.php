<?php
        function setAppointment($username, $day, $hour, $employee_first_name, $employee_last_name){
            global $db;
            //get client_id by username
            $stmt=$db->prepare('SELECT client_id
            FROM person
                JOIN
                client ON client_id = person_id
            WHERE username = ?');
            $stmt->execute(array($username));
            $client_id=$stmt->fetchColumn();
            //concatenate strings
            $start_time_user=strtotime($day." ".$hour);
            //get employee's room by his/her name
            $stmt=$db->prepare('SELECT employee_room_id
                FROM person
                    JOIN
                    employee ON employee_id = person_id
                WHERE first_name=? and last_name=?');
            $stmt->execute(array($employee_first_name, $employee_last_name));
            $room_desired=$stmt->fetchColumn();
            //check if that room is occupied on selected hour
            $stmt=$db->prepare('SELECT start_time from appointment where room = ?');
            $stmt->execute(array($room_desired));
            $ret=$stmt->fetchAll();
            foreach($ret as $start_date){
                $start_time_database=strtotime($start_date['start_time']);
                if($start_time_database===$start_time_user){
                    echo "Nooo";
                    return false;
                }
            }
            // get hour plus 30 minutes
            $timestamp = strtotime($hour)+ 60*30;
            $end_hour= date('H:i', $timestamp);
            
            $stmt=$db->prepare('INSERT INTO appointment VALUES(NULL,
                                ?, --start_time 
                                ?, --end_time
                                ?, --room
                                ?, --client_1
                                NULL)');
            $stmt->execute(array($day." ".$hour, $day." ".$end_hour,$room_desired,$client_id));
            return true;
        }
?>