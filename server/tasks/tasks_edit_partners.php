<?php
  require("../database/dbfunction.php");
  if(isset($_POST["editPartners"])) {
    $getIdPartners = $_REQUEST["id"];
    if($_REQUEST["logo"] != "") {
      $logo = $_REQUEST["logo"];
      queryManipulation("UPDATE partners SET logo=? WHERE id_partners=?", "set", [$logo, $getIdPartners]);
    }
    //update
    $comapny = $_REQUEST["company"];
    $email = $_REQUEST["email"];
    $link = $_REQUEST["link"];
    $description = $_REQUEST["description"];
    $headquarter = $_REQUEST["headquarter"];
    $field = $_REQUEST["field"];
    $createAt = $_REQUEST["create"];
    queryManipulation("UPDATE partners SET company=?, email=?, link=?, description=?, headquarter=?, field=?, create_at=? WHERE id_partners=?", "set", [$comapny, $email, $link, $description, $headquarter, $field, $createAt, $getIdPartners]);
  }
?>
