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
    <link href="../css/HeaderLayout.css" rel="stylesheet">
    <link href="../css/HeaderStyle.css" rel="stylesheet">
    <link href="../css/PaymentLayout.css" rel="stylesheet">
    <link href="../css/PaymentStyle.css" rel="stylesheet"> 
    <link href="../css/ResponsiveUserHeader.css" rel="stylesheet">
    <link href="../css/ResponsiveAccount.css" rel="stylesheet">

    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_header(); ?>
    <div id="content">
        <img src="img/pay.png" alt="accountlogo"> 
        <section id="PaymentInfo"> 
            <h2>Make a payment</h2>
            <form id="form1" action="../actions/action_payment.php" method="post">
                <label>To: <input type="text" name="destiny" required></label> 
                <label>How much:<input type="text" name="quantity" required></label>
            </form>
            <div id="button">                
                <button type="submit" form="form1">Pay</button>
            </div>
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="message">
                    <?=$_SESSION['message']?>
                </div>
            <?php unset($_SESSION['message']); } ?>   
        </section>
    </div>
    <?php draw_footer() ?>
</body>
</html>