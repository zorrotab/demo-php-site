<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    Welcome <?php echo htmlspecialchars($_POST["name"] ?? 'Guest'); ?><br>
    Your email address is: <?php echo htmlspecialchars($_POST["email"] ?? 'N/A'); ?>
<?php else: ?>
    <p>No data submitted.</p>
<?php endif; ?>
</body>
</html>