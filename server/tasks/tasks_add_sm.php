<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addSocialMedia"])) {
    $name = $_REQUEST["name"];
    $link = $_REQUEST["link"];
    $icon = $_REQUEST["icon"];
    //check record conflict
    $checkSm = queryManipulation("SELECT name FROM social_media WHERE name=?", "get", [$name]);
    if(count($checkSm) > 0) {
      echo "This social media already exists";
      return;
    } else {
      queryManipulation("INSERT INTO social_media(name, link, icon) VALUES(?, ?, ?)", "set", [$name, $link, $icon]);
      echo "Done!";
    }
  }
?>