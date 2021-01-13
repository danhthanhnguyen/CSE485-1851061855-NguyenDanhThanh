<?php
  require("../database/dbfunction.php");
  if(isset($_POST["deletePartners"])) {
    $getId = $_REQUEST["id"];
    queryManipulation("DELETE FROM partners WHERE id_partners=?", "set", [$getId]);
    echo "Done!";
  }
?>