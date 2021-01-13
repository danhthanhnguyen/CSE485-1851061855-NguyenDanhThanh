<?php
  require("../database/dbfunction.php");
  if(isset($_POST["addPartners"])) {
    $company = $_REQUEST["company"];
    $logo = $_REQUEST["logo"];
    $email = $_REQUEST["email"];
    $link = $_REQUEST["link"];
    $description = $_REQUEST["description"];
    $headquarter = $_REQUEST["headquarter"];
    $field = $_REQUEST["field"];
    $createAt = $_REQUEST["create"];
    queryManipulation("INSERT INTO partners(company, logo, email, link, description, headquarter, field, create_at) VALUES(?, ?, ?, ?, ?, ?, ?, ?)", "set", [$company, $logo, $email, $link, $description, $headquarter, $field, $createAt]);
    echo "Done!";
  }
?>