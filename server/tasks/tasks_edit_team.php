<?php
  require("../database/dbfunction.php");
  if(isset($_POST["editTeam"])) {
    $getIdTeam = $_REQUEST["id"];
    if($_REQUEST["avatar"] != "") {
      $avatar = $_REQUEST["avatar"];
      queryManipulation("UPDATE team SET avatar=? WHERE id_team=?", "set", [$avatar, $getIdTeam]);
    }
    $name = $_REQUEST["name"];
    $job = $_REQUEST["job"];
    $slogan = $_REQUEST["slogan"];
    queryManipulation("UPDATE team SET name=?, job=?, slogan=? WHERE id_team=?", "set", [$name, $job, $slogan, $getIdTeam]);
  }
?>