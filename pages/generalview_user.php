<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../database/branch.php');
    include_once('../includes/sessions.php');

    $Chief=getChiefBranch("nata");//argument is the user's username
    $Address=getBranchAddress("nata");//argument is the user's username
    $NrEmployees=getNrEmployeesBranch("nata");//argument is the user's username
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
                <p>A very very sad story because we have to this fucking sibd project without fucking knowlegde or guidance :D</p>
            </article>
        </section>
        <section id="aboutBranch">
            <h2>About your branch</h2>
            <article id="aboutBranchList">
                <ul>
                    <li>Chief:<?= " ".$Chief['first_name'] ." " .$Chief['last_name']?></li>
                    <li>Address:<?=" ".$Address['address']?></li>
                    <li>Number of employees:<?=" ".$NrEmployees['nrEmployees'] ?></li>
                </ul>
            </article>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.3063677535565!2d-74.18650588516556!3d40.777278341557405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c254e4eabb71ef%3A0x66c27b361ac14028!2s74%20Belmont%20Ave%2C%20Belleville%2C%20NJ%2007109%2C%20EUA!5e0!3m2!1spt-PT!2spt!4v1575393777215!5m2!1spt-PT!2spt" ></iframe>
        </section>
        <section id="offers">
            <h2>Your bank gives you amazing offers</h2>
            <section id="accountChecker">
                <h2>Check if your account meets the condition</h2>
                <form>   
                    <label>
                        Account Id: <input type="text" name="account_id">
                    </label>
                    <input type="submit" value="Check">
                </form>
            </section>
            <img src="img/offer.png" alt="offer">
        </section>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>

</body>
</html>