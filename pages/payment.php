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
    <link href="../css/PaymentLayout.css" rel="stylesheet">
    <link href="../css/PaymentStyle.css" rel="stylesheet"> 
    <title>Bank System</title>
</head>
<body>
    <?php draw_header(); ?>
    <section id="content">
        <img src="img/pay.png" alt="accountlogo"> 
        <section id="PaymentInfo"> 
            <ul><h1>Your Payment:</h1>
                <form id="form1" action="">
                    <li>To: <input type="text" name="destiny"></li> 
                    <li>How much:<input type="text" name="quantity"></li>
                </form>                
                <button type="submit" form="form1">Pay</button>
            </ul>
        </section>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
</body>
</html>