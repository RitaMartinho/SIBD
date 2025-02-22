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
    <link href="../css/ResponsiveUserHeader.css" rel="stylesheet">
    <link href="../css/ResponsiveAccount.css" rel="stylesheet">

    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_header();?>
    <div id="content">
        <img src="img/send_money.png" alt="accountlogo"> 
        <section id="SendInfo"> 
            <h2>Send Money</h2>
            <form id="form1" action="../actions/action_sendMoney.php" method="post">
                <label> 
                        To: <input type="text" placeholder="Destiny account ID" name="destiny" required>
                </label>
                <label >
                        How much?<input type="text" name="quantity" required>  
                </label>   
            </form>
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="message">
                    <?=$_SESSION['message']?>
                </div>
            <?php unset($_SESSION['message']); } ?>   
            <div id="button">
                <button type="submit" form="form1" >Send</button>
            </div>             
        </section>
    </div>
    <?php draw_footer() ?>
</body>
</html>