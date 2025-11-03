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
   }

# Check login credentials
if ($action === 'Login') {
    $stmt = $db->prepare('SELECT * FROM USERS WHERE NAME = :name');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $ret = $stmt->execute();
    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        if ($row['NAME'] === $name && $row['PASSWORD'] === $password) {
            $db->close();
            header("Location: /welcome?name=$name");
        }
    }
    $loginState = 'invalidCredentials';
    $db->close();
    header("Location: /home?loginState=$loginState");

# Check if user already exists for registration
} elseif ($action === 'Register') {
    $stmt = $db->prepare('SELECT NAME FROM USERS WHERE NAME = :name');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $ret = $stmt->execute();
    $userExists = false;
    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        if ($row['NAME'] === $name) {
            $userExists = true;
            $db->close();
            break;
        }
    }
    # If user already exists, inform operator
    if ($userExists) {
        $loginState = 'registered';
        header("Location: /home?loginState=$loginState");

    # Else create new user
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
            $loginState = 'registerSuccess';
            header("Location: /home?loginState=$loginState");
        }
        $db->close();
    }

} else {
    http_response_code(404);
    echo "404 Not Found";
}
?>