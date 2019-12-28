<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/rating.php');

    if(!isset($_SESSION['username']) || !verifyAdmin($_SESSION['username']) ) {
        header('Location: login.php');
    }

    $average=getAVGRatings();
    $average=sprintf('%0.2f', $average);

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
                <form id="form1" action="../pages/ratings_show.php" method= 'get'>
                    <select name="chooseMin">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </form>
                <button type="submit" form="form1">Show</button>
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