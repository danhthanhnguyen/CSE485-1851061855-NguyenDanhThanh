<?php
  require("../database/dbfunction.php");
  if(isset($_POST["editSocialMedia"])) {
    $getIdSocialMedia = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $link = $_REQUEST["link"];
    $icon = $_REQUEST["icon"];
    queryManipulation("UPDATE social_media SET name=?, link=?, icon=? WHERE id_sm=?", "set", [$name, $link, $icon, $getIdSocialMedia]);
  }
?>