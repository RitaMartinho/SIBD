<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/offers.php');

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
            <img src="img/offer.png" alt="offers_logo"> 
            <section id="ClientsInfo">
                <h2>Offers Available:</h2>
                <table>
                    <tr>
                        <th scope="col">Insurer</th>
                        <th>Insurance</th>
                        <th>Card type</th>
                    </tr>                    
                        <?php foreach($AllOffers as $offer){?> 
                            <tr>
                                <td><?= $offer['insurer_name']?></td>
                                <td><?= $offer['insurance_name']?></td>
                                <td><?= $offer['card_type']?></td>
                            </tr>
                        <?php } ?>
                </table>
                <section id="Clientbutton">
                    <form>
                        <button type="submit" formaction="newOffer.php">Add Offer</button>
                        <button type="submit" formaction="deleteOffer.php">Delete Offer</button>
                    </form>
                </section>
            </section>
        </section>
    </section>
    <?php draw_footer() ?>
</body>
</html>