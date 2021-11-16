<?php
$username="root";
$password="hiso";
$database="crisis";
$hostname = "localhost";

$connection=mysql_connect ($hostname, $username, $password);

mysql_query("SET NAMES UTF8",$connection); 
if (!$connection) {

  die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {

  die ('Can\'t use db : ' . mysql_error());

}

?>