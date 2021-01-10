<?php
  session_start();
  include("./config/path.php");
  if(isset($_SESSION["login"])) {
    header("location:".constant("URL")."/server/dashboard.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="../public/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="./styles/login.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5 jumbotron">
            <div class="card-body">
              <h5 class="card-title text-center">Login</h5>
              <div style="display:none" class="alert alert-danger"></div>
              <form class="form-signin" action="" method="POST" enctype="multipart/form-data">
                <div class="form-label-group">
                  <label for="inputEmail">Email</label>
                  <input type="email" spellcheck="false" id="inputEmail" class="email form-control" name="email" placeholder="Email address" required autofocus>
                </div>
                <div class="form-label-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" id="inputPassword" class="password form-control" name="password" placeholder="Password" required>
                </div>
                <p class="mt-2 mb-0"><a href="<?php echo constant("URL")."/server/password_reset.php"?>">Forgot password?</a></p>
                <button class="btn btn-primary btn-block text-uppercase mt-3" type="button" onclick="login()">Login</button>
                <hr class="my-4">
              </form>
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