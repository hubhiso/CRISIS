<?php
$username="root";
$password="hiso";
$database="crisis";
$hostname = "localhost";

$mysqli = new mysqli($hostname,$username,$password,$database);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Return name of current default database
if ($result = $mysqli -> query("SELECT DATABASE()")) {
  $row = $result -> fetch_row();
  //echo "Default database is " . $row[0];
  $result -> close();
}

// Change db to "test" db
$mysqli -> select_db("test");

// Return name of current default database
if ($result = $mysqli -> query("SELECT DATABASE()")) {
  $row = $result -> fetch_row();
  //echo "Default database is " . $row[0];
  $result -> close();
}

$mysqli -> close();


?>