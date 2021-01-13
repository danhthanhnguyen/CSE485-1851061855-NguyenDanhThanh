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
    $partners = queryManipulation("SELECT * FROM partners WHERE id_partners=?", "get", [$getId]);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit Partners-<?php echo ucwords($partners[0]["company"]); ?></title>
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
                    <img class="logo-partners" src="<?php echo $partners[0]["logo"]; ?>" alt="">
                    <label for="upload-logo">
                      <i class="change-logo fas fa-camera"></i>
                      <input class="field-logo" name="change-logo" type="file" id="upload-logo" style="display:none">
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 box box-primary">
                  <div class="box-body">
                    <h2><?php echo ucwords($partners[0]["company"]); ?></h2>
                    <div class="partners-information">
                      <dl class="form-group">
                        <dt>
                          <label for="partners-id">Id</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="partners-id" type="text" spellcheck="false" name="partners-id" value="<?php echo $partners[0]["id_partners"]; ?>" readonly>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="partners-company">Company</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="partners-company" type="text" spellcheck="false" name="partners-company" value="<?php echo $partners[0]["company"]; ?>" required/>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="partners-email">Email</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="partners-email" type="text" spellcheck="false" name="partners-email" value="<?php echo $partners[0]["email"]; ?>">
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="partners-link">Link</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="partners-link" type="text" spellcheck="false" name="partners-link" value="<?php echo $partners[0]["link"]; ?>">
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="partners-description">Description</label>
                        </dt>
                        <dd>
                          <textarea class="field-data form-control" name="partners-description" spellcheck="false" id="partners-description" cols="30" rows="8"><?php echo $partners[0]["description"]; ?></textarea>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="partners-headquarter">Headquarter</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="partners-headquarter" type="text" spellcheck="false" name="partners-headquarter" value="<?php echo $partners[0]["headquarter"]; ?>">
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="partners-field">Field</label>
                        </dt>
                        <dd>
                          <select class="field-data form-control" name="partners-field" id="admin-job">
                            <?php
                              $field = array("Technology", "Service", "E-Learning", "Food & Beverage", "Retail", "Energy");
                              foreach($field as $f) {
                                if($f == $partners[0]["field"]) {
                                  continue;
                                }
                                echo '<option value="'.$f.'">'.$f.'</option>';
                              }
                              echo '<option selected="selected" value="'.$partners[0]["field"].'">'.$partners[0]["field"].'</option>';
                            ?>
                          </select>
                        </dd>
                      </dl>
                      <dl class="form-group">
                        <dt>
                          <label for="partners-create">Create at</label>
                        </dt>
                        <dd>
                          <input class="field-data form-control" id="partners-create" type="date" spellcheck="false" name="partners-create" value="<?php echo $partners[0]["create_at"]; ?>">
                        </dd>
                      </dl>
                    </div>
                    <button name="change-partners-info" class="btn btn-success mt-3 mb-2" type="button" onclick="editPartners()">Save</button>
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
    <script src="../js/edit_partners.js"></script>
  </body>
</html>