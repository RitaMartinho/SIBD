<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');

    // TODO: CHECK IF USER IS ADMIN 
    if(!isset($_SESSION['username']) ) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/HeaderLayoutAdmin.css" rel="stylesheet">
    <link href="../css/HeaderStyleAdmin.css" rel="stylesheet">
    <link href="../css/AdminViewLayout.css" rel="stylesheet"> 
    <link href="../css/AdminViewStyle.css" rel="stylesheet">
    <title>Bank System</title>
</head>
<body>
    <?php draw_AdminHeader();?>
    <section id="content">
        <section id="welcome">
            <h2>Welcome admin</h2>
            <img src="img/admin.png" alt="welcome_admin"> 
            <ul>
                <li>Manage your bank</li>
                <li>Keep track of your bank's quality</li>
            </ul>
        </section>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>

</body>
</html>