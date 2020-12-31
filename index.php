<?php
  include("./server/database/dbfunction.php");
  $admin = queryManipulation("SELECT * FROM admin LIMIT 1", "get");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $admin[0]["name"]; ?></title>
  <link rel="icon" href="./public/favicon.ico"/> <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./styles/app.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
</head>
<body>
  <noscript>You need to enable Xampp to run this app.</noscript>
  <div class="root">
    <div class="app">
      <?php include("./components/header.php"); ?>
      <?php include("./components/main.php"); ?>
      <?php include("./components/footer.php"); ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
  <script src="./js/app.js"></script>
</body>
</html>