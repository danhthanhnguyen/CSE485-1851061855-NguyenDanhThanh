<?php
  require("./database/dbfunction.php");
  include("./config/path.php");
  session_start();
  if(!isset($_SESSION["login"])) {
    header("location: ".constant("URL")."/server/");
  }
  $admin = queryManipulation("SELECT * FROM admin LIMIT 1", "get");
  $socialMedia = queryManipulation("SELECT id_sm, name, link FROM social_media", "get");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Social Media</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="../public/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
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
            <div class="page-title">
              <h3>
                My Social Media
                <a
                  href="<?php echo constant("URL")."/server/update/add_sm.php"; ?>"
                  class="btn btn-sm btn-outline-primary float-right"
                  ><i class="fas fa-plus-circle"></i> Add</a
                >
              </h3>
            </div>
            <div class="box box-primary">
              <div class="box-body">
                <table
                  width="100%"
                  class="table table-hover display wrap"
                  id="dataTables-example"
                >
                  <thead>
                    <tr>
                      <th></th>
                      <th>Network Media</th>
                      <th>Access</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(count($socialMedia) > 0) {
                        foreach($socialMedia as $sm) {
                          echo '
                            <tr>
                              <td></td>
                              <td>'.$sm["name"].'</td>
                              <td><a href="'.$sm["link"].'" target="_blank"><i style="color:#2185d0" class="fas fa-link"></i></a></td>
                              <td class="text-right">
                                <a href="detail_sm.php?id='.$sm["id_sm"].'" class="btn btn-outline-dark btn-rounded"
                                  ><i class="fas fa-info-circle"></i></a>
                                <a href="'.constant("URL").'/server/update/edit_sm.php?id='.$sm["id_sm"].'" class="btn btn-outline-info btn-rounded"
                                  ><i class="fas fa-pen"></i
                                ></a>
                                <button value="'.$sm["id_sm"].'" onclick="deleteMedia(this)" class="btn btn-outline-danger btn-rounded"
                                  ><i class="fas fa-trash"></i
                                ></button>
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script src="./js/dashboard.js"></script>
    <script src="./js/datatable.js"></script>
    <script src="./js/app.js"></script>
  </body>
</html>
