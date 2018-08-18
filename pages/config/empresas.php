<?php
/* Variables de uso general                            */
$bg_sp=buildPath();
$separator = "/";
$navBar = "..".$separator."components".$separator."navbar.php";
$sideBar = "..".$separator."components".$separator."sidebar.php";
$footer = "..".$separator."components".$separator."footer.php";
$title = "..".$separator."components".$separator."title.php";
/***************************************************** */
if (!isset($rootDir)){
  $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
    require_once($rootDir."/private/dao/CompanyDao.php");
    require_once($rootDir."/private/dao/UsuarioDao.php");
    $datos1=CompanyDao::sqlTodo();
} 
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
                  <h4 class="card-title">Empresas</h4>
                  
                  <p class="card-description">
                  <div class="form-group">
                    Crear nueva empresa
                      <form action="nueva-empresa"
                            name="form1"
                            id="form1"
                            method="post"> 
                            <input type="button" 
                            class="btn btn-success btn-rounded btn-fw"
                            value="Crear empresa" 
                            id="nuevo"
                            name="nuevo" 
                            onclick= "document.form1.action = 'nueva-empresa'; 
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
                            Codigo
                          </th>
                          <th>
                            Nombre
                          </th>
                          <th>
                            Cliente
                          </th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="buscar">
                      <?php
                        foreach($datos1 as $fila) 
                        {
                      ?>
                        <tr>
                          <td>
                          <?php echo $fila['cm_cod'];?>
                          </td>
                          <td>
                          <?php echo $fila['cm_name'];?>
                          </td>
                          <td>
                          <?php $loadUser = UsuarioDao::sqlCargar($fila['user_us_cod']);
                                echo $loadUser->getName();
                          ?>
                          </td>
                          <td>
                            <?php
                            if($fila['cm_status']==1){
                              ?>
                            <div class="btn-group dropdown">
                              <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrar
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="modificar-empresa?cod=<?php echo $fila['cm_cod'];?>">
                                  <i class="fa fa-reply fa-fw"></i>Modificar</a>
                                <a class="dropdown-item" href="lugares">
                                  <i class="fa fa-reply fa-fw"></i>Ver lugares</a>
                                <a class="dropdown-item" href="eliminar-empresa?cod=<?php echo $fila['cm_cod'];?>">
                                  <i class="fa fa-history fa-fw"></i>Eliminar</a>
                              </div>
                            </div>
                              <?php
                            }else{
                              ?>
                            <div class="btn-group dropdown">
                              <button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Eliminada
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="eliminar-empresa?cod=<?php echo $fila['cm_cod'];?>&st=1">
                                  <i class="fa fa-history fa-fw"></i>Restaurar</a>
                              </div>
                            </div>
                              <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
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