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
    $skill = queryManipulation("SELECT * FROM skills WHERE id_skills=?", "get", [$getId]);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit Skills-<?php echo $skill[0]["name"]; ?></title>
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
                <div class="col-lg-12 box box-primary">
                  <div class="box-body">
                    <h2><?php echo $skill[0]["name"]; ?></h2>
                    <div class="skills-information">
                      <dl class="form-group">
                        <dt>
                          <label for="skills-id">Id</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="skills-id" type="text" spellcheck="false" name="skills-id" value="<?php echo $skill[0]["id_skills"]; ?>" readonly>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="skills-name">Name</label>
                        </dt>
                        <dd>
                          <select onchange="setIcon()" class="field-data form-control" name="skills-name" id="skills-name">
                            <?php
                              $name = array("fab fa-js" => "Javascript", "fab fa-python" => "Python", "fab fa-java" => "Java", "fab fa-html5" => "HTML5", "fab fa-css3-alt" => "CSS3", "fab fa-github" => "Github", "fab fa-react" => "ReactJs", "fab fa-angular" => "Angular", "fab fa-bootstrap" => "Bootstrap", "fab fa-node-js" => "NodeJs", "fab fa-figma" => "Figma", "fab fa-r-project" => "R", "fab fa-vuejs" => "VueJs", "fab fa-laravel" => "Laravel");
                              foreach($name as $k => $n) {
                                if($n == $skill[0]["name"]) {
                                  echo '<option class="option-skills" selected="selected" value="'.$k.'">'.$skill[0]["name"].'</option>';
                                  continue;
                                }
                                echo '<option class="option-skills" value="'.$k.'">'.$n.'</option>';
                              }
                            ?>
                          </select>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="skills-type">Type</label>
                        </dt>
                        <dd>
                          <select class="field-data form-control" name="skills-type" id="skills-type">
                            <?php
                              $type = array("programming", "tools");
                              foreach($type as $t) {
                                if($t == $skill[0]["type"]) {
                                  continue;
                                }
                                echo '<option value="'.$t.'">'.$t.'</option>';
                              }
                              echo '<option selected="selected" value="'.$skill[0]["type"].'">'.$skill[0]["type"].'</option>';
                            ?>
                          </select>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="skills-icon">Icon</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="skills-icon" type="text" spellcheck="false" name="skills-icon" value="<?php echo $skill[0]["icon"]; ?>" required readonly/>
                        </dd>
                      </dl>
                    </div>
                    <button name="change-skills-info" class="btn btn-success mt-3 mb-2" type="button" onclick="editSkills()">Save</button>
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
    <script src="../js/edit_skills.js"></script>
  </body>
</html>