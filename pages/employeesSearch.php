<?php
    include_once('../templates/tpl_common.php');
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
    <title>Document</title>
</head>
<body>
    <?php draw_AdminHeader(); ?>
    <section id="content">
        <section id="Client">
            <img src="img/employee.png" alt="welcome_admin"> 
            <section id="ClientsInfo">
                <h2>Search:</h2>
                <form id="form1" action="../actions/action_clientSearch">
                    <label>
                        <input type="text" name="firstName" placeholder="First Name">
                    </label>
                    <label>
                        <input type="text" name="lastName" placeholder="Last Name">
                    </label>
                </form>
                <section id="Clientbutton">
                    <button type="submit" form="form1">GO</button>
                </section>
                <section id="Employeebutton">
                    <h2>Or:</h2>
                    <form>
                        <button type="submit" formaction="newEmployee.php">Add new</button>
                    </form>
                </section>
            </section>
            <section id="SearchResults">
                    <ul>
                        <li>First Name:</li>
                        <li>Last Name:</li>
                        <li>Birthday:</li>
                        <li>Address:</li>
                        <li>Branch:</li>
                        <li>Account ID:</li>   
                    </ul>
                    <form action="FIRED.PHP">
                        <button type="submit">FIRE!</button>
                    </form>
                </section>
        </section>
    </section>
    
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
</body>
</html>