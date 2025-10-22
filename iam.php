<?php
echo "This script was triggered by direct URL access.";

$name = urlencode($_POST['name'] ?? '');
$email = urlencode($_POST['email'] ?? '');
header("Location: /welcome?name=$name&email=$email");
?>