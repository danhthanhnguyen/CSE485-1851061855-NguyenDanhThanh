<?php
  require("./database/dbfunction.php");
  include("./config/path.php");
  session_start();
  if(!isset($_SESSION["login"])) {
    header("location: ".constant("URL")."/server/");
  }
  $admin = queryManipulation("SELECT * FROM admin LIMIT 1", "get");
  $partners = queryManipulation("SELECT id_partners, company, email, field, headquarter FROM partners", "get");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Partners</title>
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
                My Partners
                <a
                  href="<?php echo constant("URL")."/server/update/add_partners.php"; ?>"
                  class="btn btn-sm btn-outline-primary float-right"
                  ><i class="fas fa-plus-circle"></i> Add</a
                >
                <button onclick="showImport('#importFrame')" style="cursor:pointer" class="btn btn-sm btn-outline-primary float-right mr-1">
                  <i class="fas fa-cloud-upload-alt"></i> Load CSV
                </button>
              </h3>
            </div>
            <?php
              if(isset($_SESSION["err-csv"])) {
                echo '
                  <div class="alert alert-danger text-center">
                    '.$_SESSION["err-csv"].'
                  </div>
                ';
                unset($_SESSION["err-csv"]);
              }
            ?>
            <div style="display:none;border:2px dashed #007bff;margin:1.6rem 0;padding:2rem" id="importFrame">
              <form style="max-width:80%;margin:0 auto" action="./import/importCSV.php" method="POST" enctype="multipart/form-data">
                <input class="mt-1 mb-1" id="import-csv" type="file" name="csv">
                <button name="import-csv-file" class="btn btn-sm btn-outline-primary mt-1 mb-1" type="submit"><i class="fas fa-upload"></i> Import</button>
              </form>
            </div>
            <div class="box box-primary">
              <div class="box-body">
                <table
                  width="100%"
                  class="table table-hover display nowrap"
                  id="dataTables-example"
                >
                  <thead>
                    <tr>
                      <th></th>
                      <th>Company</th>
                      <th>Email</th>
                      <th>Field</th>
                      <th>Headquarter</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(count($partners) > 0) {
                        foreach($partners as $partner) {
                          echo '
                            <tr>
                              <td></td>
                              <td>'.ucwords($partner["company"]).'</td>
                              <td>'.$partner["email"].'</td>
                              <td>'.$partner["field"].'</td>
                              <td>'.$partner["headquarter"].'</td>
                              <td class="text-right">
                                <a href="detail_partners.php?id='.$partner["id_partners"].'" class="btn btn-outline-dark btn-rounded"
                                  ><i class="fas fa-info-circle"></i></a>
                                <a href="'.constant("URL").'/server/update/edit_partners.php?id='.$partner["id_partners"].'" class="btn btn-outline-info btn-rounded"
                                  ><i class="fas fa-pen"></i
                                ></a>
                                <button onclick="deletePartners(this)" value="'.$partner["id_partners"].'" class="btn btn-outline-danger btn-rounded"
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
    <script>
      function showImport(id) {
        const importCSV = document.querySelector(id);
        importCSV.style.display = (importCSV.style.display === "none") ? "block" : "none";
      }
    </script>
  </body>
</html>
