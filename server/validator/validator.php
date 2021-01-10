<?php
  require("../database/dbfunction.php");
  session_start();
  require("../config/login.php");
  if(isset($_POST["admin"])) {
    $getEmail = $_REQUEST["email"];
    $getPass = $_REQUEST["password"];
    $admin = queryManipulation("SELECT email, password, role FROM admin WHERE email=?", "get", [$getEmail]);
    if(count($admin) > 0) {
      if(password_verify($getPass, $admin[0]["password"])) {
        //echo "Valid";
        login($getEmail, $admin[0]["role"]);
        echo 'Successfully';
      } else {
        echo "Incorrect email or password!";
      }
    } else {
      //echo "Invalid";
      echo "Incorrect email or password!";
    }
  }
?>