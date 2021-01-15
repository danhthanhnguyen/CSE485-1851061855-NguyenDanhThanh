<?php
  require("../database/dbfunction.php");
  if(isset($_POST["editProjects"])) {
    $getIdProjects = $_REQUEST["id"];
    if($_REQUEST["thumbnail"] != "") {
      $thumbnail = $_REQUEST["thumbnail"];
      queryManipulation("UPDATE projects SET thumbnail=? WHERE id_projects=?", "set", [$thumbnail, $getIdProjects]);
    }
    //update
    $name = $_REQUEST["name"];
    $platform = $_REQUEST["platform"];
    $link = $_REQUEST["link"];
    $description = $_REQUEST["description"];
    $createAt = $_REQUEST["create"];
    queryManipulation("UPDATE projects SET name=?, platform=?, link=?, description=?, create_at=? WHERE id_projects=?", "set", [$name, $platform, $link, $description, $createAt, $getIdProjects]);
  }
?>
