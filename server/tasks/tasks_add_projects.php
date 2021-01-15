<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addProjects"])) {
    $name = $_REQUEST["name"];
    $thumbnail = $_REQUEST["thumbnail"];
    $description = $_REQUEST["description"];
    $link = $_REQUEST["link"];
    $platform = $_REQUEST["platform"];
    $createAt = $_REQUEST["create"];
    //check record confict
    $checkProject = queryManipulation("SELECT name FROM projects WHERE name=?", "get", [$name]);
    if(count($checkProject) > 0) {
      echo "This project already exists";
      return;
    } else {
      queryManipulation("INSERT INTO projects(name, thumbnail, platform, link, description, create_at) VALUES(?, ?, ?, ?, ?, ?)", "set", [$name, $thumbnail, $platform, $link, $description, $createAt]);
      echo "Done!";
    }
  }
?>