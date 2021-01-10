<?php
  require("../database/dbfunction.php");
  session_start();
  require("../config/login.php");
  if(isset($_POST["resetpass"])) {
    $getEmail = $_REQUEST["email"];
    $admin = queryManipulation("SELECT email FROM admin WHERE email=?", "get", [$getEmail]);
    if(count($admin) == 0) {
      $_SESSION["error"] = "Incorrect email!";
    } else {
      $_SESSION["ok"] = "Check your email for a link to reset your password. If it doesn’t appear within a few minutes, check your spam folder.";
      //PHPMailer
      require("../PHPMailer/PHPMailerAutoload.php");
      include('../PHPMailer/class.smtp.php');
      include("../PHPMailer/class.phpmailer.php"); 
      $nFrom = "Nguyen Danh Thanh";//mail duoc gui tu dau, thuong de ten cong ty ban
      $mFrom = 'nguyendanhthanh980@gmail.com';//dia chi email cua ban 
      $mPass = 'Matkhaula9';//mat khau email cua ban
      $nTo = $getEmail;//Ten nguoi nhan
      $mTo = $getEmail;//dia chi nhan mail
      $mail = new PHPMailer();
      $hash = password_hash($getEmail, PASSWORD_DEFAULT);
      $body = "http://localhost/project/server/password_reset.php?es=$hash";// Noi dung email
      $title = 'Please reset your password!';//Tieu de gui mail
      $mail->IsSMTP();
      $mail->CharSet = "utf-8";
      $mail->SMTPDebug = 0;// enables SMTP debug information (for testing)
      $mail->SMTPAuth = true;// enable SMTP authentication
      $mail->SMTPSecure = "ssl";// sets the prefix to the servier
      $mail->Host = "smtp.gmail.com";// sever gui mail.
      $mail->Port = 465;// cong gui mail de nguyen
      // xong phan cau hinh bat dau phan gui mail
      $mail->Username = $mFrom;// khai bao dia chi email
      $mail->Password = $mPass;// khai bao mat khau
      $mail->SetFrom($mFrom, $nFrom);
      $mail->AddReplyTo('nguyendanhthanh980@gmail.com', 'Nguyen Danh Thanh'); //khi nguoi dung phan hoi se duoc gui den email nay
      $mail->Subject = $title;// tieu de email 
      $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
      $mail->AddAddress($mTo, $nTo);
      if($mail->Send()) {
        $_SESSION["send"] = "Send ok!";
      } else {
        echo 'Error!';
      }
    }
  }
?>