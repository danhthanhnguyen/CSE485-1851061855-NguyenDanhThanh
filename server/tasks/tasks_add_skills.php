<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addSkills"])) {
    $name = $_REQUEST["name"];
    $type = $_REQUEST["type"];
    $icon = $_REQUEST["icon"];
    queryManipulation("INSERT INTO skills(name, type, icon) VALUES(?, ?, ?)", "set", [$name, $type, $icon]);
    echo "Done!";
  }
?>