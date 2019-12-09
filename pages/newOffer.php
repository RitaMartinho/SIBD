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
            <img src="img/offer.png" alt="welcome_admin"> 
            <section id="ClientsInfo">
                <h2>Offers Available:</h2>
                GIANT TABLE
            </section>
            <section id="SearchResults">
                <form id="form1" action="../actions/action_addOffer.php">
                    <label>
                        <input type="text" name="Insurer" placeholder="Insurer">
                    </label>
                    <label>
                        <input type="text" name="Insurance" placeholder="Insurance">
                    </label>
                </form>
                <section id="Clientbutton">
                    <button type="submit" form="form1">Add Offer</button>  
                </section>
            </section>
        </section>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
</body>
</html>