<?php
/* Variables de uso general                            */
$bg_sp=buildPath();
$separator = "/";
$navBar = "..".$separator."components".$separator."navbar.php";
$sideBar = "..".$separator."components".$separator."sidebar.php";
$footer = "..".$separator."components".$separator."footer.php";
$title = "..".$separator."components".$separator."title.php";
/***************************************************** */

function buildPath(){
  $domain =  'http://'.$_SERVER['HTTP_HOST'];
  $subdomain = $_SERVER['PHP_SELF'];
  $url = $domain.$subdomain;
  $path = str_replace($domain.'/horizon', "", $url);
  $slash = substr_count($path, '/')-1;
  $buildPath = '';
  $i = 0;
  while ($i < $slash) {
    $i++;
    $buildPath = $buildPath."../";
  }
  return $buildPath;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include($title);?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $bg_sp;?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $bg_sp;?>vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo $bg_sp;?>vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
      </script>

  <!-- End plugin js for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $bg_sp;?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $bg_sp;?>images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include($navBar); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include($sideBar);?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Empresa Softdirex</h4>
                  
                  <p class="card-description">
                  <div class="form-group">
                    Crear nueva sede
                      <form action="nueva-sede"
                            name="form1"
                            id="form1"
                            method="post"> 
                            <input type="button" 
                            class="btn btn-success btn-rounded btn-fw"
                            value="Crear sede" 
                            id="nuevo"
                            name="nuevo" 
                            onclick= "document.form1.action = 'nueva-sede'; 
                            document.form1.submit()" />
                      </form>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Buscar</span>
                          </div>
                          <input id="filtrar" type="text" class="form-control" placeholder=""  aria-describedby="basic-addon1">
                        </div>
                    </div>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nombre
                          </th>
                          <th>
                            Direccion
                          </th>
                          <th>
                            Cuidad
                          </th>
                          <th>
                            Cliente
                          </th>
                          <th>
                            Auditor
                          </th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="buscar">
                        <tr>
                          <td>
                            Bodega
                          </td>
                          <td>
                            Uno norte 130
                          </td>
                          <td>
                            Paine
                          </td>
                          <td>
                            Jorge Leiva
                          </td>
                          <td>
                            Pedro Fuentes
                          </td>
                          <td>
                            <div class="btn-group dropdown">
                              <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrar
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-reply fa-fw"></i>Modificar</a>
                                <a class="dropdown-item" href="evaluaciones">
                                  <i class="fa fa-reply fa-fw"></i>Evaluaciones</a>
                                  <a class="dropdown-item" href="#">
                                  <i class="fa fa-reply fa-fw"></i>Crear auditoria</a>
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-history fa-fw"></i>Eliminar</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                        <td>
                            Oficina
                          </td>
                          <td>
                            Teatinos 333
                          </td>
                          <td>
                            Santiago
                          </td>
                          <td>
                            Jorge Leiva
                          </td>
                          <td>
                            Pedro Fuentes
                          </td>
                          <td>
                            <div class="btn-group dropdown">
                              <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrar
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-reply fa-fw"></i>Modificar</a>
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-reply fa-fw"></i>Evaluaciones</a>
                                  <a class="dropdown-item" href="#">
                                  <i class="fa fa-reply fa-fw"></i>Crear auditoria</a>
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-history fa-fw"></i>Eliminar</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Sede La Serena
                          </td>
                          <td>
                            Las Bugambilias 3232
                          </td>
                          <td>
                            La Serena
                          </td>
                          <td>
                            Luis Perez
                          </td>
                          <td>
                            Hugo Ramirez
                          </td>
                          <td>
                            <div class="btn-group dropdown">
                              <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrar
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-reply fa-fw"></i>Modificar</a>
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-reply fa-fw"></i>Evaluaciones</a>
                                  <a class="dropdown-item" href="#">
                                  <i class="fa fa-reply fa-fw"></i>Crear auditoria</a>
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-history fa-fw"></i>Eliminar</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include($footer);?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo $bg_sp;?>vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo $bg_sp;?>vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo $bg_sp;?>js/off-canvas.js"></script>
  <script src="<?php echo $bg_sp;?>js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo $bg_sp;?>js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>