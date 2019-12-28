<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/user.php');

    if(!isset($_SESSION['username']) || !verifyAdmin($_SESSION['username']) ) {
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
    <link href="../css/ResponsiveAdmin.css" rel="stylesheet">
    <link href="../css/ResponsiveAdminHeader.css" rel="stylesheet">
    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_AdminHeader();?>
    <div id="content">
        <section id="welcome">
            <h2>Welcome admin</h2>
            <img src="img/admin.png" alt="welcome_admin"> 
            <ul>
                <li>Manage your bank</li>
                <li>Keep track of your bank's quality</li>
            </ul>
        </section>
    </div>
    <?php draw_footer() ?>

</body>
</html>