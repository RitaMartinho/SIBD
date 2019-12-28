<?php
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/client.php');
    include_once('../database/user.php');

    if(!isset($_SESSION['username']) || !verifyAdmin($_SESSION['username']) ) {
        header('Location: login.php');
    }

    $age=array();
    $info=getClientInfo($_GET['firstName'],$_GET['lastName']);
   
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
    <link href="../css/ResponsiveAdmin.css" rel="stylesheet">
    <link href="../css/ResponsiveAdminHeader.css" rel="stylesheet">
    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_AdminHeader();?>
    <div id="content">
        <div id="Client">
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
                <div id="button">
                    <button type="submit" form="form1">GO</button>
                </div>
            </section>
            <div id="SearchResults">
                    <?php if(empty($info)) {
                        ?>  <h2> No client with that name</h2> <?php
                    } else foreach ( $info as $infoClient) {?>
                        <ul>
                            <li><b>First Name:</b> <?=$infoClient['first_name']?></li>
                            <li><b>Last Name:</b> <?=$infoClient['last_name']?></li>
                            <li><b>Age:</b> <?=getClientAge($infoClient['birthdate'])?></li>
                            <li><b>Address:</b> <?=$infoClient['address']?></li>
                            <li><b>Branch:</b> <?=$infoClient['branch']?></li>
                            <li><b>Account ID:</b> <?=$infoClient['account_id']?></li>   
                        </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php draw_footer() ?>
    
</html>