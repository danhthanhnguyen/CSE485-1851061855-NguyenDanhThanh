<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addTeam"])) {
    $name = $_REQUEST["name"];
    $avatar = $_REQUEST["avatar"];
    $job = $_REQUEST["job"];
    $slogan = $_REQUEST["slogan"];
    queryManipulation("INSERT INTO team(name, avatar, job, slogan) VALUES(?, ?, ?, ?)", "set", [$name, $avatar, $job, $slogan]);
    echo "Done!";
  }
?>