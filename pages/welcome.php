<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>

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

        .welcome {
            display: block;
            margin: 30px auto 0 auto;
            background-color: #bfbfbf;
            color: #8B0000;
            border: 2px solid black;
            padding: 10px 20px;
            width: fit-content;
        }

        input[type="submit"] {
            margin-top: 10px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <h1>Maths Challenge</h1>
    <div class="welcome">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
            Welcome <?php echo htmlspecialchars($_GET["name"] ?? 'Guest'); ?><br>
        <?php else: ?>
            <p>No data submitted.</p>
        <?php endif; ?>

        <form action="/home" method="POST">
            <input type="submit" name="action" value="Logout">
        </form>
    </div>
</body>
</html>