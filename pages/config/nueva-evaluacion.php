<?php
$bg_sp=buildPath();

/* Variables de uso general                            */
$separator = "/";
$navBar = "..".$separator."components".$separator."navbar.php";
$sideBar = "..".$separator."components".$separator."sidebar.php";
$footer = "..".$separator."components".$separator."footer.php";
$title = "..".$separator."components".$separator."title.php";
/***************************************************** */

if (!isset($rootDir)){
    $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
      require_once($rootDir."/private/dao/CausaDao.php");
      $causas=CausaDao::sqlListar();
      require_once($rootDir."/private/dao/ConsecuenciaDao.php");
      $consecuencias=ConsecuenciaDao::sqlListar();
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
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
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
          <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Generar nueva evalucación</h4>
                  <p class="card-description">
                    Complete el formulario para generar una nueva evaluación
                  </p>
                  <form  action="addEvaluacion.php"  method="post">
                    <div class="form-group">
                      <label for="cod">Blanco u objetivo</label>
                      <input type="text" class="form-control" name="objetivo" id="objetivo" placeholder="Blanco u objetivo" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Zona</label>
                      <input type="text" class="form-control" name="zona" id="zona" placeholder="Zona" required>
                    </div>
                    <div class="form-group">
                    <label for="type">Causa o vector</label>
                    <select class="form-control form-control-lg" name="causa" id="causa">
                    <?php
                        foreach($causas as $fila) 
                        {
                    ?>
                      <option value="<?php echo $fila['ca_id']; ?>"><?php echo $fila['ca_name']; ?></option>
                    <?php
                        }
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Atracción</label>
                    <select class="form-control form-control-lg" name="atr" id="atr">
                      <option value="1">Muy baja</option>
                      <option value="2">Baja</option>
                      <option value="3">Media</option>
                      <option value="4">Alta</option>
                      <option value="5">Muy alta</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Exposición</label>
                    <select class="form-control form-control-lg" name="exp" id="exp">
                      <option value="1">Muy baja</option>
                      <option value="2">Baja</option>
                      <option value="3">Media</option>
                      <option value="4">Alta</option>
                      <option value="5">Muy alta</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Debilidad</label>
                    <select class="form-control form-control-lg" name="deb" id="deb">
                      <option value="1">Muy baja</option>
                      <option value="2">Baja</option>
                      <option value="3">Media</option>
                      <option value="4">Alta</option>
                      <option value="5">Muy alta</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Consecuencias</label>
                    <select class="form-control form-control-lg" name="causa" id="causa">
                    <?php
                        foreach($consecuencias as $fila) 
                        {
                    ?>
                      <option value="<?php echo $fila['re_id']; ?>"><?php echo $fila['re_name']; ?></option>
                    <?php
                        }
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <input type="submit" value="Crear" class="btn btn-success mr-2">
                    </div>
                  </form>
                  <div class="form-group">
                  <form action="evaluaciones"
                            name="form1"
                            id="form1"
                            method="post"> 
                            <input type="button" 
                            class="btn btn-warning"
                            value="Cancelar" 
                            id="nuevo"
                            name="nuevo" 
                            onclick= "document.form1.action = 'evaluaciones'; 
                            document.form1.submit()" />
                  </form>
                  </div>
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