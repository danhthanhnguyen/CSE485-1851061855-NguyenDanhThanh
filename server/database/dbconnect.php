<?php
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "mycv";
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if($conn->connect_error) {
    die("Connection fail $conn->connect_error");
  }
?>