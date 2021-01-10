<?php
  require("./database/dbfunction.php");
  include("./config/path.php");
  session_start();
  if(!isset($_SESSION["login"])) {
    header("location: ".constant("URL")."/server/");
  }
  $admin = queryManipulation("SELECT * FROM admin LIMIT 1", "get");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="../public/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./styles/dashboard.css" />
    <link rel="stylesheet" href="./styles/profile.css" />
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
          <form action="./update/update_profile.php" method="POST" enctype="multipart/form-data">
            <div class="container">
              <div class="row">
                <div class="col-12 page-header">
                  <div style="background-image:url(<?php echo $admin[0]["background"]; ?>)" class="col-12 background">
                    <label for="upload-background">
                      <i class="change-background fas fa-camera"></i>
                      <input class="field-background" name="change-background" type="file" id="upload-background" style="display:none">
                    </label>
                  </div>
                  <div class="avatar">
                    <img class="profile-avatar" src="<?php echo $admin[0]["avatar"]; ?>" alt="">
                    <label for="upload-avatar">
                      <i class="change-avatar fas fa-camera"></i>
                      <input class="field-avatar" name="change-avatar" type="file" id="upload-avatar" style="display:none">
                    </label>
                  </div>
                  <?php
                    if(isset($_SESSION["upload-file-error"])) {
                      echo '
                        <div class="alert alert-danger">
                          '.$_SESSION["upload-file-error"].'
                        </div>
                      ';
                      unset($_SESSION["upload-file-error"]);
                    }
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 box box-primary">
                  <div class="box-body">
                    <h2>Public Profile</h2>
                    <div class="admin-information">
                      <dl class="form-group">
                        <dt>
                          <label for="admin-name">Name</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="admin-name" type="text" spellcheck="false" name="admin-profile-name" value="<?php echo $admin[0]["name"]; ?>" required/>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="admin-address">Address</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="admin-address" type="text" spellcheck="false" name="admin-profile-address" value="<?php echo $admin[0]["address"]; ?>">
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="admin-about">Bio</label>
                        </dt>
                        <dd>
                          <textarea class="field-data form-control" name="admin-profile-about" spellcheck="false" id="admin-about" cols="30" rows="8"><?php echo $admin[0]["about"]; ?></textarea>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="admin-intro">Introduce</label>
                        </dt>
                        <dd>
                          <textarea class="field-data form-control" name="admin-profile-intro" spellcheck="false" id="admin-intro" cols="30" rows="10"><?php echo $admin[0]["introduce"]; ?></textarea>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="admin-phone">Phone</label>
                        </dt>
                        <dd>
                          <input class="field-data data-phone form-control" id="admin-phone" type="text" spellcheck="false" name="admin-profile-phone" value="<?php echo $admin[0]["phone"]; ?>">
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="admin-job">Job</label>
                        </dt>
                        <dd>
                          <select class="field-data data-job form-control" name="admin-profile-job" id="admin-job">
                            <?php
                              $job = array("Game Developer", "Web Developer", "Mobile Developer", "Artificial Intelligence", "Software Engineer", "Cyber Security");
                              foreach($job as $j) {
                                if($j == $admin[0]["job"]) {
                                  continue;
                                }
                                echo '<option value="'.$j.'">'.$j.'</option>';
                              }
                              echo '<option selected="selected" value="'.$admin[0]["job"].'">'.$admin[0]["job"].'</option>';
                            ?>
                          </select>
                        </dd>
                      </dl>
                    </div>
                    <?php
                      if(isset($_SESSION["update-profile-error"])) {
                        echo '
                          <div class="alert alert-danger">
                            '.$_SESSION["update-profile-error"].'
                          </div>
                        ';
                        unset($_SESSION["update-profile-error"]);
                      }
                    ?>
                    <button name="change-admin-profile" class="btn btn-success mt-3 mb-2" type="button" onclick="changeProfile()">Update Profile</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="./js/dashboard.js"></script>
    <script src="./js/upload.js"></script>
  </body>
</html>
