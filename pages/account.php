<?php 
    include_once('../templates/tpl_common.php');
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
    <title>Bank System</title>
</head>
<body>
    <?php draw_header();?>
    <section id="content">
        <img src="img/bank-account.png" alt="accountlogo"> 
        <section id="accountInfo"> 
            <ul><h1>Client_name account:</h1>
                <li> ID:_______</li>
                <li>Balance:_______</li>
                <li>Type:_______</li>
                <li># Cards:_______</li>
            </ul>
        </section>   
        <nav id="cardInfo">
            <a href="cards.php">See info about my cards</a>
        </nav>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
</body>
</html>