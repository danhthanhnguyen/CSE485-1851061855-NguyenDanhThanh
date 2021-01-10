<?php
  require("../database/dbfunction.php");
  include("../config/path.php");
  session_start();
  if(isset($_POST["changePassword"])) {
    $getNewPass = $_REQUEST["newPass"];
    $getConfirmPass = $_REQUEST["confirmPass"];
    $admin = queryManipulation("SELECT email FROM admin LIMIT 1", "get");
    if(password_verify($admin[0]["email"], $_SESSION["hashEmail"])) {
      $hashNewPass = password_hash($getNewPass, PASSWORD_DEFAULT);
      if(queryManipulation("UPDATE admin SET password=? WHERE email=?", "set", [$hashNewPass, $admin[0]["email"]])) {
        unset($_SESSION["hashEmail"]);
        unset($_SESSION["send"]);
      } else {
        echo "Error!";
      }
    }
  }
?>