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
    <link href="../css/BranchsLayout.css" rel="stylesheet">
    <link href="../css/BranchsStyle.css" rel="stylesheet">
    <link href="../css/HeaderLayoutAdmin.css" rel="stylesheet"> 
    <link href="../css/HeaderStyleAdmin.css" rel="stylesheet">
    <title>Bank System</title>
</head>
<body>
    <?php draw_AdminHeader();?>
    <section id="content">
        <img src="img/branch.png" alt="branchlogo">
        <section id="branchs">
            <form method="GET" id="form1">
                    <label>Order by:
                        <select id="criteria">
                            <option value="None" selected >None</option>
                            <option value="Number of employees">Number of employees</option>
                            <option value="Number of clients">Number of clients</option>
                            <option value="Number of rooms">Number of rooms</option>
                        </select>  
                    </label> 
                    <select id="order">
                            <option value="None" selected >None</option>
                            <option value="ASC">ASC</option>
                            <option value="DESC">DESC</option>                
                    </select>
                    <button form="form1">See branchs</button>
                </form>

                <section id="displayed">
                    <ul>
                        <li>BranchID</li>
                        <li>Address</li>
                        <li>Number of employees</li>
                        <li>Number of clients</li>
                        <li>Number of rooms</li>
                    </ul>
    
                    <div class="pagination">
                        <a href="">&lt;</a>
                        <a href="">&gt;</a>
                    </div>

                </section>
        </section>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>

</body>
</html>