<?php
  require("./database/dbfunction.php");
  include("./config/path.php");
  session_start();
  if(!isset($_SESSION["login"])) {
    header("location: ".constant("URL")."/server/");
  }
  $admin = queryManipulation("SELECT * FROM admin LIMIT 1", "get");
  $skills = queryManipulation("SELECT name, icon, type FROM skills", "get");
  $partners = queryManipulation("SELECT company, link FROM partners", "get");
  $projects = queryManipulation("SELECT name, link, platform FROM projects", "get");
  $team = queryManipulation("SELECT name, job FROM team", "get");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
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
              <div class="col-md-12 page-header">
                <div class="page-pretitle">Overview</div>
                <h2 class="page-title">Dashboard</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                  <div class="content">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="icon-big text-center">
                          <i class="violet fas fa-handshake"></i>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="detail">
                          <p class="detail-subtitle">My Partners</p>
                          <span class="number"><?php echo count($partners); ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="footer">
                      <hr />
                      <div class="stats">
                        <i class="fas fa-info-circle"></i>
                        <a href="<?php echo constant("URL")."/server/partners.php"; ?>">View Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                  <div class="content">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="icon-big text-center">
                          <i class="olive fas fa-user-friends"></i>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="detail">
                          <p class="detail-subtitle">My Team</p>
                          <span class="number"><?php echo count($team); ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="footer">
                      <hr />
                      <div class="stats">
                        <i class="fas fa-info-circle"></i>
                        <a href="<?php echo constant("URL")."/server/team.php"; ?>">View Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                  <div class="content">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="icon-big text-center">
                          <i class="blue fab fa-app-store-ios"></i>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="detail">
                          <p class="detail-subtitle">My Projects</p>
                          <span class="number"><?php echo count($projects); ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="footer">
                      <hr />
                      <div class="stats">
                        <i class="fas fa-info-circle"></i>
                        <a href="<?php echo constant("URL")."/server/projects.php"; ?>">View Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                  <div class="content">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="icon-big text-center">
                          <i class="orange fas fa-code-branch"></i>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="detail">
                          <p class="detail-subtitle">My Skills</p>
                          <span class="number"><?php echo count($skills); ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="footer">
                      <hr />
                      <div class="stats">
                        <i class="fas fa-info-circle"></i>
                        <a href="<?php echo constant("URL")."/server/skills.php"; ?>">View Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="content">
                        <div class="head">
                          <h5 class="mb-0">My team</h5>
                          <p class="text-muted">
                            This is the best team ever
                          </p>
                        </div>
                        <div class="canvas-wrapper">
                          <table class="table no-margin bg-lighter-grey">
                            <thead class="success">
                              <tr>
                                <th>Name</th>
                                <th class="text-right">Job</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                if(count($team) > 0) {
                                  foreach($team as $t) {
                                    echo '
                                      <tr>
                                        <td>
                                        '.$t["name"].'
                                        </td>
                                        <td class="text-right">'.$t["job"].'</td>
                                      </tr>
                                    ';
                                  }
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="ui hidden divider"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="content">
                        <div class="head">
                          <h5 class="mb-0">Some of my project</h5>
                          <p class="text-muted">These are my awesome projects</p>
                        </div>
                        <div class="canvas-wrapper">
                          <table class="table no-margin bg-lighter-grey">
                            <thead class="success">
                              <tr>
                                <th>Project</th>
                                <th class="text-right">Platform</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                if(count($projects) > 0) {
                                  foreach($projects as $project) {
                                    echo '
                                      <tr>
                                        <td>
                                        '.$project["name"].'
                                        <a href="'.$project["link"].'" target="_blank"><i style="color:#2185d0" class="fas fa-link"></i></a>
                                        </td>
                                        <td class="text-right">'.$project["platform"].'</td>
                                      </tr>
                                    ';
                                  }
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="ui hidden divider"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="content">
                    <div class="head">
                      <h5 class="mb-0">Top Incorporation</h5>
                      <p class="text-muted">
                        These are my great partners
                      </p>
                    </div>
                    <div class="canvas-wrapper">
                      <table class="table no-margin bg-lighter-grey">
                        <thead class="success">
                          <tr>
                            <th>Incorporation</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if(count($partners) > 0) {
                              foreach($partners as $partner) {
                                echo '
                                  <tr>
                                    <td>
                                    '.ucwords($partner["company"]).'
                                    <a href="'.$partner["link"].'" target="_blank"><i style="color:#2185d0" class="fas fa-link"></i></a>
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="content">
                    <div class="head">
                      <h5 class="mb-0">Top Technologies</h5>
                      <p class="text-muted">
                        These are the technologies that I use
                      </p>
                    </div>
                    <div class="canvas-wrapper">
                      <table class="table no-margin bg-lighter-grey">
                        <thead class="success">
                          <tr>
                            <th>Technology</th>
                            <th class="text-right">Type</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if(count($skills) > 0) {
                              foreach($skills as $skill) {
                                echo '
                                  <tr>
                                    <td>
                                      <i class="'.$skill["icon"].'"></i>
                                      '.$skill["name"].'
                                    </td>
                                    <td class="text-right">'.$skill["type"].'</td>
                                  </tr>
                                ';
                              }
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  </body>
</html>
