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

$sql =<<<EOF
      SELECT * from USERS;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "ID = ". $row['ID'] . "\n";
      echo "NAME = ". $row['NAME'] ."\n";
      echo "PASSWORD = ". $row['PASSWORD'] ."\n\n";
   }
   echo "Operation done successfully\n";
   $db->close();
?>