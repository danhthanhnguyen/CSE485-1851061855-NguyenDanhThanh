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
    $projects = queryManipulation("SELECT * FROM projects WHERE id_projects=?", "get", [$getId]);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit Projects-<?php echo $projects[0]["name"]; ?></title>
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
                    <img class="thumbnail-projects" src="<?php echo $projects[0]["thumbnail"]; ?>" alt="">
                    <label for="upload-thumbnail">
                      <i class="change-logo fas fa-camera"></i>
                      <input class="field-thumbnail" name="change-thumbnail" type="file" id="upload-thumbnail" style="display:none">
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 box box-primary">
                  <div class="box-body">
                    <h2><?php echo $projects[0]["name"]; ?></h2>
                    <div class="projects-information">
                      <dl class="form-group">
                        <dt>
                          <label for="projects-id">Id</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="projects-id" type="text" spellcheck="false" name="projects-id" value="<?php echo $projects[0]["id_projects"]; ?>" readonly>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="projects-name">Name</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="projects-name" type="text" spellcheck="false" name="projects-name" value="<?php echo $projects[0]["name"]; ?>" required/>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="projects-platform">Platform</label>
                        </dt>
                        <dd>
                          <select class="field-data form-control" name="projects-platform" id="admin-job">
                            <?php
                              $platform = array("Web App", "Game App", "Mobile App", "Desktop App");
                              foreach($platform as $p) {
                                if($p == $projects[0]["platform"]) {
                                  continue;
                                }
                                echo '<option value="'.$p.'">'.$p.'</option>';
                              }
                              echo '<option selected="selected" value="'.$projects[0]["platform"].'">'.$projects[0]["platform"].'</option>';
                            ?>
                          </select>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="projects-link">Link</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="projects-link" type="text" spellcheck="false" name="projects-link" value="<?php echo $projects[0]["link"]; ?>">
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="projects-description">Description</label>
                        </dt>
                        <dd>
                          <textarea class="field-data form-control" name="projects-description" spellcheck="false" id="projects-description" cols="30" rows="8"><?php echo $projects[0]["description"]; ?></textarea>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="projects-create">Create at</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="projects-create" type="date" spellcheck="false" name="projects-create" value="<?php echo $projects[0]["create_at"]; ?>">
                        </dd>
                      </dl>
                    </div>
                    <button name="change-projects-info" class="btn btn-success mt-3 mb-2" type="button" onclick="editProjects()">Save</button>
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
    <script src="../js/edit_projects.js"></script>
  </body>
</html>