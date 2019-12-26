<?php 
    include_once('../database/connection.php');
    include_once('../database/branch.php');
    include_once('../includes/sessions.php');

    $AllBranches = getAllBranches();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/LoginStyle.css" rel="stylesheet">
    <link href="../css/LoginLayout.css" rel="stylesheet">
    <title>Bank System</title>
</head>
<body>
    <header>
        <h1>Welcome to Moneiys Bank</h1>
    </header>
    <form action='../actions/action_register.php' method='post'>
    <h3>Register</h3>
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="message">
                <?=$_SESSION['message']?>
            </div>
            <?php unset($_SESSION['message']); } ?>
        <label>
            User Name: <input type="text" name="username">
        </label>
        <label>
            First Name: <input type="text" name="firstName">
        </label>
        <label>
            Last Name: <input type="text" name="lastName">
        </label>
        <label>
            Birthday: <input type="date" name="birthday" placeholder="YYYY-MM-DD">
        </label>
        <label>
            TAX ID: <input type="text" name="taxID">
        </label>
        <label>
            Address: <input type="text" name="address">
        </label>
        <label>
            Branch: <select name="branchAddress"> 
                    <?php foreach($AllBranches as $BranchAdress) {?> 
                        <option value= "<?=$BranchAdress['address']?>" ><?=$BranchAdress['address']?></option> 
                    <?php }?> 
                    </select>
        </label>
        <label>
            Password: <input type="password" name="password">
        </label>
        <label>
            Confirm Password: <input type="password" name="confirmpassword">
        </label>
        <input type="submit" value="SIGN UP">
    </form>
</body>
</html>