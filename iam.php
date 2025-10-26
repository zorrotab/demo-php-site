<?php

$action = urlencode($_POST['action'] ?? '');
$name = urlencode($_POST['name'] ?? '');
$password = urlencode($_POST['password'] ?? '');

class MyDB extends SQLite3 {
      function __construct() {
         $this->open('data.db');
      }
   }   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
}


echo $action;

if ($action === 'Login') {
    header("Location: /welcome?name=$name&password=$password");
} elseif ($action === 'Register') {
        echo "Registering user";

} else {
    http_response_code(404);
    echo "404 Not Found";
}
?>