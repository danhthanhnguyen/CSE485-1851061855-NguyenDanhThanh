<?php
  require("../database/dbfunction.php");
  if(isset($_POST["deleteProjects"])) {
    $getId = $_REQUEST["id"];
    queryManipulation("DELETE FROM projects WHERE id_projects=?", "set", [$getId]);
    echo "Done!";
  }
?>