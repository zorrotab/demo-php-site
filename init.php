<?php

# Create database
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

# Create USERS table
$sql =<<<EOF
      CREATE TABLE USERS
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      PASSWORD       TEXT     NOT NULL);
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "USERS table created successfully\n";
   }

# Add default admin user
$sql =<<<EOF
      INSERT INTO USERS (ID,NAME,PASSWORD)
      VALUES (1, 'admin', 'admin');
EOF;

   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Default admin user populated successfully\n";
   }
   $db->close();
?>