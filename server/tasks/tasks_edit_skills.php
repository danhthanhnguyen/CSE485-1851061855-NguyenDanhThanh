<?php
  require("../database/dbfunction.php");
  if(isset($_POST["editSkills"])) {
    $getIdSkills = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $type = $_REQUEST["type"];
    $icon = $_REQUEST["icon"];
    queryManipulation("UPDATE skills SET name=?, type=?, icon=? WHERE id_skills=?", "set", [$name, $type, $icon, $getIdSkills]);
  }
?>