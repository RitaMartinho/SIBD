<?php 
    include_once('../templates/tpl_common.php');
    include_once('../includes/sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/HeaderLayout.css" rel="stylesheet">
    <link href="../css/HeaderStyle.css" rel="stylesheet">
    <link href="../css/SendMoneyLayout.css" rel="stylesheet">
    <link href="../css/SendMoneyStyle.css" rel="stylesheet"> 
    <title>Bank System</title>
</head>
<body>
    <?php draw_header();?>
    <section id="content">
        <img src="img/send_money.png" alt="accountlogo"> 
        <section id="SendInfo"> 
            <h2>Send Money</h2>
            <form id="form1" action="../actions/action_sendMoney.php" method="post">
                <label> 
                        To: <input type="text" name="destiny" required>
                </label>
                <label >
                        How much?<input type="text" name="quantity" required>  
                </label>   
            </form>   
            <section id="button">
                <button type="submit" form="form1" >Send</button>
            </section>             
        </section>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
</body>
</html>