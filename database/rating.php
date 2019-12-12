<?php

    function getRatingsAdmin($min_rating){

        global $db;

        $stmt= $db->prepare('SELECT rating.appointment,
        start_time,
        rating_score,
        rating_score_2,
        first_name as employee_first_name,
        last_name as employee_last_name
        FROM rating
        JOIN
        appointment
        ON appointment_id = appointment
        JOIN
        (
            SELECT *
              FROM employee
                   JOIN
                   person ON employee_id = person_id
        )
        ON room = employee_room_id
        group by rating.appointment having (rating_score >= ?)');

        $stmt->execute(array($min_rating));
        return $stmt->fetchAll();

    }


    function getAVGRatings(){

        global $db;
        $total=0;

        //this wouldn't work with only sql because of the null values of rating_score_2
        $stmt=$db->prepare('SELECT rating_score , rating_score_2
                FROM rating');
        $stmt->execute();
        $row= $stmt->fetchAll();

       foreach($row as $rating){

            if($rating['rating_score_2']==null){

                $total=$total+$rating['rating_score'];
            }

            else{

                $total=$total+($rating['rating_score']+$rating['rating_score_2'])/2;
            }
       }
       
       $stmt=$db->prepare('SELECT count(*) as all_ratings FROM rating');
       $stmt->execute();
       $total_ratings=$stmt->fetchColumn();

       return $total/$total_ratings;
    }

?>