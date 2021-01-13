<?php
  session_start();
  include("../config/path.php");
  if(isset($_SESSION["login"])) {
    header("location:".constant("URL")."/server/dashboard.php");
  } else {
    header("location: ".constant("URL")."/server/");
  }
  require("../database/dbfunction.php");
  if(isset($_POST["changeProfile"])) {
    if($_REQUEST["avatar"] != "") {
      $avatar = $_REQUEST["avatar"];
      queryManipulation("UPDATE admin SET avatar=?", "set", [$avatar]);
    }
    if($_REQUEST["background"] != "") {
      $background = $_REQUEST["background"];
      queryManipulation("UPDATE admin SET background=?", "set", [$background]);
    }
    $getName = $_REQUEST["name"];
    $getAddress = $_REQUEST["address"];
    $getAbout = $_REQUEST["about"];
    $getIntro = $_REQUEST["intro"];
    $getPhone = $_REQUEST["phone"];
    $getJob = $_REQUEST["job"];
    if($getName == "" || $getAddress == "" || $getAbout == "" || $getIntro == "" || $getPhone == "" || $getJob == "") {
      $_SESSION["update-profile-error"] = "Please fill out the fields!";
      return;
    } else {
      queryManipulation("UPDATE admin SET name=?, address=?, about=?, introduce=?, phone=?, job=?", "set", [$getName, $getAddress, $getAbout, $getIntro, $getPhone, $getJob]);
    }
  }
  // if(isset($_POST["change-admin-profile"])) {
    // if(isset($_FILES["change-avatar"]) && $_FILES["change-avatar"]["name"] != "") {
    //   $getAvatar = $_FILES["change-avatar"];
    //   if($getAvatar["size"] > 2000000) {
    //     $_SESSION["upload-file-error"] = "Sorry, your file is too large!";
    //   }
    //   $extentionAvatar = strtolower(pathinfo($getAvatar["name"], PATHINFO_EXTENSION));//get file extension
    //   if($extentionAvatar != "jpg" && $extentionAvatar != "jpeg" && $extentionAvatar != "png") {
    //     $_SESSION["upload-file-error"] = "Sorry, only JPG, JPEG & PNG files are allowed!";
    //   }
    //   $avatar = $conn->real_escape_string(file_get_contents($getAvatar["tmp_name"]));
    //   echo base64_encode($avatar);
    //   queryManipulation("UPDATE admin SET avatar=?", "set", [$avatar]);
    // }
    // if(isset($_FILES["change-background"]) && $_FILES["change-background"]["name"] != "") {
    //   $getBackground = $_FILES["change-background"];
    //   if($getBackground["size"] > 2000000) {
    //     $_SESSION["upload-file-error"] = "Sorry, your file is too large!";
    //   }
    //   $extentionBackground = strtolower(pathinfo($getBackground["name"], PATHINFO_EXTENSION));
    //   if($extentionBackground != "jpg" && $extentionBackground != "jpeg" && $extentionBackground != "png") {
    //     $_SESSION["upload-file-error"] = "Sorry, only JPG, JPEG & PNG files are allowed!";
    //   }
    //   $background = $conn->real_escape_string(file_get_contents($getBackground["tmp_name"]));
    //   queryManipulation("UPDATE admin SET background=?", "set", [$background]);
    // }
    // header("location: ".constant("URL")."/server/profile.php");
  // }
?>