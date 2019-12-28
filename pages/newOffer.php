<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/offers.php');
    include_once('../database/user.php');

    if(!isset($_SESSION['username']) || !verifyAdmin($_SESSION['username']) ) {
        header('Location: login.php');
    }

    $AllOffers=getAllOffers();
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
    <?php draw_AdminHeader();?>
    <section id="content">
        <section id="Client">
            <img src="img/offer.png" alt="welcome_admin"> 
            <section id="ClientsInfo">
                <h2>Offers Available:</h2>
                <table>
                    <tr>
                        <th scope="col">Insurer</th>
                        <th>Insurance</th>
                        <th>Card Type</th>
                    </tr>                    
                        <?php foreach($AllOffers as $offer){?> 
                            <tr>
                                <td><?= $offer['insurer_name']?></td>
                                <td><?= $offer['insurance_name']?></td>
                                <td><?= $offer['card_type']?></td>
                            </tr>
                        <?php } ?>
                </table>
            </section>
            <section id="SearchResults">
                <form id="form1" action="../actions/action_addOffer.php">
                    <label>
                        <input type="text" name="Insurer" placeholder="Insurer">
                    </label>
                    <label>
                        <input type="text" name="Insurance" placeholder="Insurance">
                    </label>
                    <label>
                        <input type="text" name="CardType" placeholder="Type of Card">
                    </label>
                </form>
                <section id="Clientbutton">
                    <button type="submit" form="form1">Add Offer</button>  
                </section>
            </section>
        </section>
    </section>
    <?php draw_footer() ?>
</body>
</html>