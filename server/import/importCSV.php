<?php
  require("../database/dbfunction.php");
  include("../config/path.php");
  session_start();
  if(isset($_POST["import-csv-file"])) {
    $csvExtension = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    $csv = $_FILES["csv"];
    if($csv["name"] != "" && in_array($csv["type"], $csvExtension)) {
      if(is_uploaded_file($csv["tmp_name"])) {
        $readCSV = fopen($csv["tmp_name"], 'r');
        fgetcsv($readCSV);
        while(($record = fgetcsv($readCSV)) != FALSE) {
          $company = $record[0];
          $email = $record[1];
          $field = $record[2];
          $headquarter = $record[3];
          $link = $record[4];
          $description = $record[5];
          $createAt = $record[6];
          $logo = $record[7];
          queryManipulation("INSERT INTO partners(company, email, field, headquarter, link, description, logo, create_at) VALUES(?, ?, ?, ?, ?, ?, ?, ?)", "set", [$company, $email, $field, $headquarter, $link, $description, $logo, $createAt]);
        }
        fclose($readCSV);
      } else {
        $_SESSION["err-csv"] = "Some problem occurred, please try again!";
      }
    } else {
      $_SESSION["err-csv"] = "Please upload a valid CSV file!";
    }
  }
  header("location:".constant("URL")."/server/partners.php");
?>