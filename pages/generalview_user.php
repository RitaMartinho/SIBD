<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../database/branch.php');
    include_once('../includes/sessions.php');

    if(!isset($_SESSION['username']) ) {
        header('Location: login.php');
    }

    $Chief=getChiefBranch($_SESSION['username']);   
    $Address=getBranchAddress($_SESSION['username']);   
    $NrEmployees=getNrEmployeesBranch($_SESSION['username']);   

    // $Chief=getChiefBranch("nata");//argument is the user's username
    // $Address=getBranchAddress("nata");//argument is the user's username
    // $NrEmployees=getNrEmployeesBranch("nata");//argument is the user's username
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/HeaderLayout.css" rel="stylesheet">
    <link href="../css/HeaderStyle.css" rel="stylesheet">
    <link href="../css/UserViewStyle.css" rel="stylesheet"> 
    <link href="../css/UserViewLayout.css" rel="stylesheet">
    <title>Bank System</title>
</head>
<body>
   <?php draw_header();?>
    <section id="content">
        <section id="welcome">
            <h1>Welcome to your personal client page!</h1>
            <img src="img/welcome.png" alt="welcome"> 
            <ul>
                <li>You can:</li>
                <li> Manage your account</li>
                <li>Send money to another client</li>
                <li>Schedule an appointment</li>
                <li>Make a payment</li>
            </ul>
        </section>
        <section id="about">
            <h2>About Moneiys Bank</h2>
            <article id="aboutBank">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
            </article>
        </section>
        <section id="aboutBranch">
            <h2>About your branch</h2>
            <article id="aboutBranchList">
                <ul>
                    <li>Chief:<?= " ".$Chief['first_name'] ." " .$Chief['last_name']?></li>
                    <li>Address:<?=" ".$Address?></li>
                    <li>Number of employees:<?=" ".$NrEmployees['nrEmployees'] ?></li>
                </ul>
            </article>
            <?php
            drawIFrame($Address);
            ?>
        </section>
        <section id="offers">
            <h2>Your bank gives you amazing offers</h2>
            <section id="accountChecker">
                <h2>Check if your account meets the condition</h2>
                <button onclick="location.href='../pages/generalview_user_offers.php#listOffers'" type="button">check</button>
            </section>
            <img src="img/offer.png" alt="offer">
        </section>
    </section>
    <?php draw_footer() ?>
</body>
</html>