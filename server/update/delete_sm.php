<?php
  require("../database/dbfunction.php");
  if(isset($_POST["deleteMedia"])) {
    $getId = $_REQUEST["id"];
    queryManipulation("DELETE FROM social_media WHERE id_sm=?", "set", [$getId]);
    echo "Done!";
  }
?>