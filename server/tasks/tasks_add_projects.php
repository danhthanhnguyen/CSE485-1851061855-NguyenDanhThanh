<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addProjects"])) {
    $name = $_REQUEST["name"];
    $thumbnail = $_REQUEST["thumbnail"];
    $description = $_REQUEST["description"];
    $link = $_REQUEST["link"];
    $platform = $_REQUEST["platform"];
    $createAt = $_REQUEST["create"];
    queryManipulation("INSERT INTO projects(name, thumbnail, platform, link, description, create_at) VALUES(?, ?, ?, ?, ?, ?)", "set", [$name, $thumbnail, $platform, $link, $description, $createAt]);
    echo "Done!";
  }
?>