<?php

$action = urlencode($_POST['action'] ?? '');
$name = urlencode($_POST['name'] ?? '');
$password = urlencode($_POST['password'] ?? '');

# Open database
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


# Check login credentials
if ($action === 'Login') {
    header("Location: /welcome?name=$name&password=$password");

# Check if user already exists
} elseif ($action === 'Register') {
    $stmt = $db->prepare('SELECT NAME FROM USERS WHERE NAME = :name');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $ret = $stmt->execute();
    $userExists = false;
    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        if ($row['NAME'] === $name) {
            $userExists = true;
            break;
        }
    }

    # Inform that user already exists
    if ($userExists) {
        echo "user already exists\n";

        # TO DO
        # Redirect to home.php
        # Add box for return result

    # Create new user
    } else {
        # Get unique id
        $stmt = $db->prepare('SELECT COUNT(*) as count FROM USERS');
        $ret = $stmt->execute();
        $row = $ret->fetchArray();
        $id = $row['count'] + 1;

        # Add new user to table
        $stmt = $db->prepare('INSERT INTO USERS (ID,NAME,PASSWORD) VALUES (:id, :name, :password)');
        $stmt->bindValue(':id', $id, SQLITE3_TEXT);
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':password', $password, SQLITE3_TEXT);
        $ret = $stmt->execute();
        if(!$ret) {
            echo $db->lastErrorMsg();
        } else {
            echo "user created\n";
        }
        $db->close();
    }

} else {
    http_response_code(404);
    echo "404 Not Found";
}
?>