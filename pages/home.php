<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #d3d3d3;
            color: #8B0000;
            font-size: 1.5em;
        }

        h1 {
            color: #B22222; 
            background-color: grey;
            padding: 10px;
            text-align: center;
            border: 2px solid black;
            display: inline-block;
            font-size: 1.5em;
        }

        form {
            display: inline-block;
            background-color: #bfbfbf;
            color: #8B0000;
            border: 2px solid black;
            padding: 20px;
            margin-top: 20px;
            text-align: left;
        }

        .response {
            display: block;
            margin: 30px auto 0 auto;
            background-color: #bfbfbf;
            color: #8B0000;
            border: 2px solid black;
            padding: 10px 20px;
            width: fit-content;
        }

        input[type="text"],
        input[type="password"] {
            margin: 5px 0;
            display: block;
            font-size: 1em;
        }

        input[type="submit"] {
            margin-top: 10px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <h1>Maths Challenge</h1>
    <br>

    <form action="/iam" method="POST">
        Name: <input type="text" name="name"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="action" value="Login">
        <input type="submit" name="action" value="Register">
    </form>

    <?php if (isset($_GET['loginState'])): ?>
        <div class="response">
            <?php if ($_GET['loginState'] === 'registered'): ?>
                User is already registered in the system.
            <?php elseif ($_GET['loginState'] === 'invalidCredentials'): ?>
                Invalid username or password.
            <?php elseif ($_GET['loginState'] === 'registerSuccess'): ?>
                User registered.
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>
</html>
