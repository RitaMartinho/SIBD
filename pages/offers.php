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
    <link href="../css/ResponsiveAdmin.css" rel="stylesheet">
    <link href="../css/ResponsiveAdminHeader.css" rel="stylesheet">
    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_AdminHeader();?>
    <div id="content">
        <div id="Client">
            <img src="img/offer.png" alt="offers_logo"> 
            <section id="ClientsInfo">
                <h2>Offers Available:</h2>
                <?php if (isset($_SESSION['message'])) { ?>
	                <div class="message" style="color: <?php $type=strpos($_SESSION['message'],"Error");
                            if ($type !== false){ 
                                echo 'red'; 
                            } else echo 'green'; ?>">
	                       <?=$_SESSION['message']?>
                    </div>
                <?php unset($_SESSION['message']); } ?> 
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
                <div id="Clientbutton">
                    <form>
                        <button type="submit" formaction="newOffer.php#form1">Add Offer</button>
                        <button type="submit" formaction="deleteOffer.php#form1">Delete Offer</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <?php draw_footer() ?>
</body>
</html>