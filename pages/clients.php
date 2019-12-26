<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/HeaderLayoutAdmin.css" rel="stylesheet">
    <link href="../css/HeaderStyleAdmin.css" rel="stylesheet">
    <link href="../css/ClientsStyle.css" rel="stylesheet">
    <link href="../css/ClientsLayout.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php  draw_AdminHeader();?>
    <section id="content">
        <section id="Client">
            <img src="img/client.png" alt="welcome_admin"> 
            <section id="ClientsInfo">
                <h2>Search:</h2>
                <form id="form1" action="../pages/clientsSearch.php">
                    <label>
                        <input type="text" name="firstName" placeholder="First Name">
                    </label>
                    <label>
                        <input type="text" name="lastName" placeholder="Last Name">
                    </label>
                </form>
                <section id="button">
                    <button type="submit" form="form1">GO</button>
                </section>
            </section>
        </section>
    </section>
    <?php draw_footer() ?>
    
</body>
</html>