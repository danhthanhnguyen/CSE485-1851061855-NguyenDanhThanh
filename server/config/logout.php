<?php
  include("./path.php");
  session_start();
  unset($_SESSION["login"]);
  unset($_SESSION["email"]);
  unset($_SESSION["role"]);
  session_destroy();
  header("location: ".constant("URL")."/server/");
?>