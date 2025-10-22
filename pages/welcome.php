<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
    Welcome <?php echo htmlspecialchars($_GET["name"] ?? 'Guest'); ?><br>
    Your email address is: <?php echo htmlspecialchars($_GET["password"] ?? 'N/A'); ?>
<?php else: ?>
    <p>No data submitted.</p>
<?php endif; ?>
</body>
</html>