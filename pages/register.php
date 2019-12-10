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
            Address: <input type="text" name="address">
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