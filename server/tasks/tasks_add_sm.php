<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addSocialMedia"])) {
    $name = $_REQUEST["name"];
    $link = $_REQUEST["link"];
    $icon = $_REQUEST["icon"];
    queryManipulation("INSERT INTO social_media(name, link, icon) VALUES(?, ?, ?)", "set", [$name, $link, $icon]);
    echo "Done!";
  }
?>