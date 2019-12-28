<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../database/account.php');
    include_once('../includes/sessions.php');

    $cardInfo = getInfoCards($_SESSION['username']);
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/HeaderLayout.css" rel="stylesheet">
    <link href="../css/HeaderStyle.css" rel="stylesheet">
    <link href="../css/CardsLayout.css" rel="stylesheet">
    <link href="../css/CardsStyle.css" rel="stylesheet"> 
    <link href="../css/ResponsiveUserHeader.css" rel="stylesheet">
    <link href="../css/ResponsiveAccount.css" rel="stylesheet">

    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_header();?>
    <div id="content">
        <img src="img/cards.png" alt="accountlogo"> 
        <?php $i=1; 
        foreach($cardInfo as $cardInfo) {?>
            <section id="cardInfo1"> 
                <h2>Card <?= $i ?>:</h2>
                <ul>
                    <li> CVV: <?= $cardInfo['cvv']?></li>
                    <li>Expiry Date: <?= $cardInfo['expiry_date']?></li>    
                </ul>
            </section>
        <?php $i++; }?>
        </div>
    <?php draw_footer() ?>
    
</body>
</html>
