<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addSkills"])) {
    $name = $_REQUEST["name"];
    $type = $_REQUEST["type"];
    $icon = $_REQUEST["icon"];
    //check record conflict
    $checkSkill = queryManipulation("SELECT name FROM skills WHERE name=?", "get", [$name]);
    if(count($checkSkill) > 0) {
      echo "This skill already exists";
      return;
    } else {
      queryManipulation("INSERT INTO skills(name, type, icon) VALUES(?, ?, ?)", "set", [$name, $type, $icon]);
      echo "Done!";
    }
  }
?>