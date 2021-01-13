<?php
  include("./config/path.php");
  require("./database/dbfunction.php");
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Forgot your password?</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="../public/favicon.ico"/> <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <style>
      @font-face {
        font-family: "sofia-pro";
        font-style: normal;
        font-weight: 400;
        font-display: auto;
        src: url("../fonts/sofiapro-light.otf");
      }
      h5 {
        font-family: "sofia-pro";
        font-size: 1.7rem;
      }
      h6 {
        font-family: "sofia-pro";
        font-size: .9rem;
        margin: 0 0 1.3rem 0;
      }
      .btn {
        font-size: 1rem;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5 jumbotron">
            <div class="card-body">
              <h5 class="card-title text-center">Reset your password</h5>
              <?php
                if(isset($_SESSION["error"])) {
                  echo '
                    <div class="alert alert-danger">'.$_SESSION["error"].'</div>
                  ';
                  unset($_SESSION["error"]);
                }
                if(isset($_REQUEST["es"])) {
                  if($_SESSION["send"]) {
                    echo '
                      <form class="form-signin" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-label-group">
                          <label for="pwd">Password</label>
                          <input type="password" id="pwd" class="pass-reset form-control" name="password" required autofocus>
                        </div>
                        <div class="form-label-group">
                          <label for="cpwd">Confirm Password</label>
                          <input type="password" id="cpwd" class="confirmPass form-control" name="confirmpassword" required>
                        </div>
                        <button class="btn btn-success btn-block mt-3" type="button" onclick="resetPassword()">Change Password</button>
                        <hr class="my-4">
                      </form>
                    ';
                    $_SESSION["hashEmail"] = $_REQUEST["es"];
                  } else {
                    header("location: ".constant("URL")."/server/password_reset.php");
                  }
                } else {
                  if(!isset($_SESSION["ok"])) {
                    echo '
                      <form class="form-signin" action="" method="POST" enctype="multipart/form-data">
                        <h6 class="reset-pass text-center">Enter your user account\'s verified email address and we will send you a password reset link.</h6>
                        <div class="form-label-group">
                          <input type="email" id="inputEmail" class="email-pass-reset form-control" name="email" placeholder="Enter your email address" required autofocus>
                        </div>
                        <button class="btn btn-success btn-block mt-3" type="button" onclick="verify()">Send password reset email</button>
                        <hr class="my-4">
                      </form>
                    ';
                  } else {
                    echo '
                      <h6 class="reset-pass text-center">'.$_SESSION["ok"].'</h6>
                      <a href="'.constant("URL")."/server/".'" class="btn btn-success btn-block mt-3"">Return the log in</a>
                      <hr class="my-4">
                    ';
                    unset($_SESSION["ok"]);
                  }
                }
              ?>
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
    <script src="./js/app.js"></script>
  </body>
</html>