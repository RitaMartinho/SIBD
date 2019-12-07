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
    <link href="../css/CardsLayout.css" rel="stylesheet">
    <link href="../css/CardsStyle.css" rel="stylesheet"> 
    <title>Bank System</title>
</head>
<body>
    <?php draw_header();?>
    <section id="content">
        <img src="img/cards.png" alt="accountlogo"> 
        <section id="cardInfo"> 
            <ul><h1>Card 1:</h1>
                <li> CW:_______</li>
                <li>Expiry Date:_______</li>    
            </ul>
        </section>
        <section id="cardInfo"> 
            <ul><h1>Card 2:</h1>
                <li> CW:_______</li>
                <li>Expiry Date:_______</li>    
            </ul>
        </section>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
</body>
</html>