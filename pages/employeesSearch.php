<?php
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/employee.php');
    include_once('../database/user.php');

    if(!isset($_SESSION['username']) || !verifyAdmin($_SESSION['username']) ) {
        header('Location: login.php');
    }

    $info=getInfoEmployee($_GET['firstName'], $_GET['lastName']);
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
            <div id="SearchResults">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="message">
                        <?=$_SESSION['message']?>
                    </div>
                <?php unset($_SESSION['message']); } 
                else if (empty($info)) {
                    ?>  <h2> No employee with that name</h2> <?php
                } else foreach ($info as $infoEmployee){?>
                    <ul>
                        <li><b>First Name:</b> <?=$infoEmployee['first_name']?></li>
                        <li><b>Last Name:</b> <?=$infoEmployee['last_name']?></li>
                        <li><b>Address:</b> <?=$infoEmployee['address']?></li>
                        <li><b>Room ID:</b> <?=$infoEmployee['room_id']?></li>
                        <li><b>Branch:</b> <?=$infoEmployee['branch']?></li>
                        <li><b>Employee ID:</b> <?=$infoEmployee['employee_id']?></li>   
                    </ul>

                    <form id="form2" action="../actions/action_removeEmployee.php" method="get">
                       <input type="hidden" name="id" value="<?=$infoEmployee['employee_id']?>">
                       <button type="submit">FIRE!</button>
                    </form>
                <?php } ?>      
            </div>
        </div>
    </div>
    
    <?php draw_footer() ?>

</html>