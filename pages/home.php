<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <form action="/iam" method="POST">
        Name: <input type="text" name="name"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit" name="action" value="Login">
        <input type="submit" name="action" value="Register">
    </form>

<?php if ($_GET['loginState'] === 'registered'): ?>
    User is already registered in the system.
<?php elseif ($_GET['loginState'] === 'invalidCredentials'): ?>
    Invalid username or password.
<?php elseif ($_GET['loginState'] === 'registerSuccess'): ?>
    User registered.
<?php endif; ?>
</body>
</html>