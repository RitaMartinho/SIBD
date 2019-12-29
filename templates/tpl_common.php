<?php function draw_header(){ ?>
    <header>
        <section id="logo">
            <h1><a href="generalview_user.php"> Moneiys Bank</a></h1>
            <img src="img/bank_logo.png" alt="bank_logo">
        </section>
        <div id="username">
            <p><?= $_SESSION['username'] ?></p>
            <a href="../actions/action_logout.php">Logout</a>
        </div>
        <nav id="operations">
                <a href="account.php" id="SeeAccount">See account</a>
                <a href="sendMoney.php" id="SendMoney">Send Money</a>
                <a href="scheduleAppointment.php" id="Schedule">Schedule appointment</a>
                <a href="payment.php" id="Payment">Make a payment</a>
        </nav>
        <?php if (isset($_MESSAGE)) { ?>
        <div class="message">
          <?=$_MESSAGE?>
        </div>
      <?php } ?>
    </header>
<?php } 

function draw_footer(){ ?>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
<?php } ?>


<?php function draw_AdminHeader(){ ?>
    <header>
        <section id="logo">
            <h1><a href="generalview_admin.php"> Moneiys Bank</a></h1>
            <img src="img/bank_logo.png" alt="bank_logo">
        </section>
        <div id="logout">
            <p><?= $_SESSION['username'] ?></p>
            <a href="../actions/action_logout.php">Logout</a>
        </div>
        <nav id="operations">
                <a href="branchs.php" id="Branchs">Branchs</a>
                <a href="clients.php" id="Clients">Clients</a>
                <a href="employees.php" id="Employees">Employees</a>
                <a href="offers.php" id="Offers">Offers</a>
                <a href="ratings.php" id="Ratings">Ratings</a>
        </nav>
    </header>
<?php } ?>