<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/LoginStyle.css" rel="stylesheet">
    <link href="../css/LoginLayout.css" rel="stylesheet">
    <title>Moneiys Bank</title>
</head>
<body>
    <header>
        <h1>Welcome to Moneiys Bank</h1>
        <img src="img/bank_logo.png" alt="logo">
    </header>
    <form action="../actions/action_login.php" method="post">
        <h3>Log in</h3>
        <label>
            User Name: <input type="text" name="username">
        </label>
        <label>
            Password: <input type="password" name="password">
        </label>
        <input type="submit" value="LOG IN">
    </form>
    <div id="newUser">
        New User?
        <form action="register.php">
            <input type="submit" value="SIGN UP">
        </form>
    </div>
</body>
</html>