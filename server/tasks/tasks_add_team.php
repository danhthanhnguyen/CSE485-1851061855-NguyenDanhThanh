<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addTeam"])) {
    $name = $_REQUEST["name"];
    $avatar = $_REQUEST["avatar"];
    $job = $_REQUEST["job"];
    $slogan = $_REQUEST["slogan"];
    //check record conflict
    $checkTeam = queryManipulation("SELECT name FROM team WHERE name=?", "get", [$name]);
    if(count($checkTeam) > 0) {
      echo "This member already exists";
      return;
    } else {
      queryManipulation("INSERT INTO team(name, avatar, job, slogan) VALUES(?, ?, ?, ?)", "set", [$name, $avatar, $job, $slogan]);
      echo "Done!";
    }
  }
?>