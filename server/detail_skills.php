<?php
  require("./database/dbfunction.php");
  include("./config/path.php");
  session_start();
  if(!isset($_SESSION["login"])) {
    header("location: ".constant("URL")."/server/");
  }
  $admin = queryManipulation("SELECT * FROM admin LIMIT 1", "get");
  if(isset($_GET["id"])) {
    $getId = $_REQUEST["id"];
    $skills = queryManipulation("SELECT * FROM skills WHERE id_skills=?", "get", [$getId]);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Skills-<?php echo ucwords($skills[0]["name"]); ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="../public/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/dashboard.css" />
    <link rel="stylesheet" href="./styles/detail.css">
  </head>
  <body>
    <div class="wrapper">
      <?php
        include("./components/sidebar.php");
      ?>
      <div id="body" class="active">
        <?php
          include("./components/navbar.php");
        ?>
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="jumbotron text-left">
                  <p><strong>ID:</strong> <?php echo $skills[0]["id_skills"]; ?></p>
                  <p><strong>Name:</strong> <?php echo $skills[0]["name"]; ?></p>
                  <p><strong>Icon:</strong> <i class="<?php echo $skills[0]["icon"]; ?>"></i></p>
                  <p><strong>Type:</strong> <?php echo ucwords($skills[0]["type"]); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <script src="./js/dashboard.js"></script>
  </body>
</html>