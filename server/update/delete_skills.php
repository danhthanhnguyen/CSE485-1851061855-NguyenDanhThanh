<?php
  require("../database/dbfunction.php");
  if(isset($_POST["deleteSkills"])) {
    $getId = $_REQUEST["id"];
    queryManipulation("DELETE FROM skills WHERE id_skills=?", "set", [$getId]);
    echo "Done!";
  }
?>