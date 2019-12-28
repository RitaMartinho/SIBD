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
    <link href="../css/EmployeesStyle.css" rel="stylesheet">
    <link href="../css/ClientsLayout.css" rel="stylesheet">
    <link href="../css/ResponsiveAdmin.css" rel="stylesheet">
    <link href="../css/ResponsiveAdminHeader.css" rel="stylesheet">
    
    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_AdminHeader(); ?>
    <div id="content">
        <div id="Client">
            <img src="img/employee.png" alt="welcome_admin"> 
            <section id="ClientsInfo">
                <h2>Search:</h2>
                <form id="form1" action="../pages/employeesSearch.php" method='get'>
                    <label>
                        <input type="text" name="firstName" placeholder="First Name">
                    </label>
                    <label>
                        <input type="text" name="lastName" placeholder="Last Name">
                    </label>
                </form>
                <div id="Clientbutton">
                    <button type="submit" form="form1">GO</button>
                </div>
                <section id="Employeebutton">
                    <h2>Or:</h2>
                    <form>
                        <button type="submit" formaction="newEmployee.php">Add new</button>
                    </form>
                </section>
            </section>
        </div>
    </div>
    <?php draw_footer() ?>
    
</body>
</html>