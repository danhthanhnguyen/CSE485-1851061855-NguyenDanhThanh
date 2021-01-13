<?php
  require("../database/dbfunction.php");
  if(isset($_POST["deleteTeam"])) {
    $getId = $_REQUEST["id"];
    queryManipulation("DELETE FROM team WHERE id_team=?", "set", [$getId]);
    echo "Done!";
  }
?>