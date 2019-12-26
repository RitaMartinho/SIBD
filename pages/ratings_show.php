<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/rating.php');

    $average=getAVGRatings();
    $average=sprintf('%0.2f', $average);

    $ratingInfo=getRatingsAdmin($_GET['chooseMin']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/HeaderLayoutAdmin.css" rel="stylesheet">
    <link href="../css/HeaderStyleAdmin.css" rel="stylesheet">
    <link href="../css/EmployeesStyle.css" rel="stylesheet">
    <link href="../css/RatingsLayout.css" rel="stylesheet">
    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_AdminHeader();?>
    <section id="content">
        <section id="Rating">
            <img src="img/rating.png" alt="logo_rating"> 
            <section id="orderby">
                <h2>Order appointments by minimum rating:</h2>
                <button onclick="location.href='../pages/ratings.php'" type="button">Go back</button>
                <?php foreach ($ratingInfo as $info) {?>
                    <ul>
                        <li><b>Appointment ID:</b> <?= $info['rating.appointment']?></li>
                        <li><b>Appointment Date:</b> <?= $info['start_time']?></li>
                        <li><b>Employee:</b> <?= $info['employee_first_name']." ".$info['employee_last_name']?></li>
                        <li><b>Client 1 rating:</b> <?= $info['rating_score']?></li>
                        <li><b>Client 2 rating:</b> <?= $info['rating_score_2']?></li>
                    </ul>
                <?php } ?> 
            </section>
            <section id="average">
                <h2>Average rating of all appointments</h2>
                <p> <?= $average?></p>
            </section>
        </section>
    </section>
    <?php draw_footer() ?>
</body>
</html>