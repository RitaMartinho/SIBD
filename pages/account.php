<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/account.php');

    $accountInfo = getAccountIdBalanceType($_SESSION['username']);    
    $nCards = getNumberOfCards($_SESSION['username']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/HeaderLayout.css" rel="stylesheet">
    <link href="../css/HeaderStyle.css" rel="stylesheet">
    <link href="../css/AccountLayout.css" rel="stylesheet">
    <link href="../css/AccountStyle.css" rel="stylesheet"> 
    <link href="../css/ResponsiveUserHeader.css" rel="stylesheet">
    <link href="../css/ResponsiveAccount.css" rel="stylesheet">

    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_header();?>
    <div id="content">
        <img src="img/bank-account.png" alt="accountlogo"> 
        <section id="accountInfo"> 
            <h2><?=$_SESSION['username']?> account:</h2>
            <ul>
                <li> ID: <?=$accountInfo['account_id']?> </li>
                <li>Balance: <?=$accountInfo['balance']?></li>
                <li>Type: <?= $accountInfo['type']?></li>
                <li># Cards: <?=intval($nCards)?></li>
            </ul>
        </section>   
        <nav id="cardInfo">
            <a href="cards.php">See info about my cards</a>
        </nav>
    </div>
    <?php draw_footer() ?>
    
</body>
</html>