<?php function draw_header(){ ?>
    <header>
        <section id="logo">
            <h1><a href="generalview_user.html"> Moneiys Bank</a></h1>
            <img src="bank_logo.png" alt="bank_logo">
        </section>
        <section id="username">
            Username
            <a href="login.html">Logout</a>
        </section>
        <nav id="operations">
                <a href="account.php" id="SeeAccount">See account</a>
                <a href="sendMoney.php" id="SendMoney">Send Money</a>
                <a href="scheduleAppointment.php" id="Schedule">Schedule appointment</a>
                <a href="payment.php" id="Payment">Make a payment</a>
        </nav>
    </header>
<?php } ?>