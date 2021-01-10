<?php
  function login($email, $role) {
    $_SESSION["login"] = true;
    $_SESSION["email"] = $email;
    $_SESSION["role"] = $role;
  }
?>