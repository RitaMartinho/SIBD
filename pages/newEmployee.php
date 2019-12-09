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
    <?php draw_AdminHeader();?>
    <section id="content">
        <section id="Client">
            <img src="img/employee.png" alt="welcome_admin"> 
            <section id="ClientsInfo">
                <h2>Search:</h2>
                <form id="form1" action="../actions/action_employeeSearch.php">
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
                        <button type="submit" formaction="new.html"> Add new</button>
                    </form>
                </section>
            </section>
            <section id="SearchResults">
                <form id="form2" action="../actions/action_addEmployee.php">
                    <label>
                        <input type="text" name="firstName" placeholder="First Name">
                    </label>
                    <label>
                        <input type="text" name="lastName" placeholder="Last Name">
                    </label>
                    <label>
                        <input type="text" name="birthday" placeholder="Birthday">
                    </label>
                    <label>
                        <input type="text" name="address" placeholder="Address">
                    </label>
                    <label>
                        <input type="text" name="branch" placeholder="Branch">
                    </label>
                    <label>
                        <input type="text" name="room" placeholder="Room">
                    </label>
                </form>
                <section id="Button">
                    <button type="submit" form="form2">ADD</button>
                </section>
            </section>
        </section>
    </section>
    
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
</body>
</html>