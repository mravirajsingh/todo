<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DBNAME = 'to_do';
$dbcon = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

if ($dbcon->connect_error) {
  die("connect error: " . $dbcon->connect_error);
}

?>