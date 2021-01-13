<?php
  require("../database/dbfunction.php");
  include("../config/path.php");
  session_start();
  if(!isset($_SESSION["login"])) {
    header("location: ".constant("URL")."/server/");
  }
  $admin = queryManipulation("SELECT * FROM admin LIMIT 1", "get");
  if(isset($_GET["id"])) {
    $getId = $_REQUEST["id"];
    $team = queryManipulation("SELECT * FROM team WHERE id_team=?", "get", [$getId]);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit Team-<?php echo $team[0]["name"]; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="../../public/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/edit.css">
  </head>
  <body>
    <div class="wrapper">
      <?php
        include("../components/sidebar.php");
      ?>
      <div id="body" class="active">
        <?php
          include("../components/navbar.php");
        ?>
        <div class="content">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="container">
              <div class="row">
                <div class="col-12 page-header">
                  <div class="logo">
                    <img class="avatar-team" src="<?php echo $team[0]["avatar"]; ?>" alt="">
                    <label for="upload-avatar">
                      <i class="change-logo fas fa-camera"></i>
                      <input class="field-avatar" name="change-avatar" type="file" id="upload-avatar" style="display:none">
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 box box-primary">
                  <div class="box-body">
                    <h2><?php echo $team[0]["name"]; ?></h2>
                    <div class="team-information">
                      <dl class="form-group">
                        <dt>
                          <label for="team-id">Id</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="team-id" type="text" spellcheck="false" name="team-id" value="<?php echo $team[0]["id_team"]; ?>" readonly>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="team-name">Name</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="team-name" type="text" spellcheck="false" name="team-name" value="<?php echo $team[0]["name"]; ?>" required/>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="team-job">Job</label>
                        </dt>
                        <dd>
                          <select class="field-data form-control" name="team-job" id="team-job">
                            <?php
                              $jobs = array("Lead Developer", "Lead Designer", "Tech Lead", "Lead Marketer", "Software Architecture", "Project Manager");
                              foreach($jobs as $j) {
                                if($j == $team[0]["job"]) {
                                  continue;
                                }
                                echo '<option value="'.$j.'">'.$j.'</option>';
                              }
                              echo '<option selected="selected" value="'.$team[0]["job"].'">'.$team[0]["job"].'</option>';
                            ?>
                          </select>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="team-slogan">Slogan</label>
                        </dt>
                        <dd>
                          <textarea class="field-data form-control" name="team-slogan" spellcheck="false" id="team-slogan" cols="30" rows="8"><?php echo $team[0]["slogan"]; ?></textarea>
                        </dd>
                      </dl>
                    </div>
                    <button name="change-team-info" class="btn btn-success mt-3 mb-2" type="button" onclick="editTeam()">Save</button>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <script src="../js/dashboard.js"></script>
    <script src="../js/edit_team.js"></script>
  </body>
</html>