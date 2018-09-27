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
      require_once($rootDir."/private/dao/UsuarioDao.php");
      require_once($rootDir."/private/dao/CompanyDao.php");
      require_once($rootDir."/private/dao/LugarDao.php");
      $clients=UsuarioDao::sqlTodo();
      $audits=UsuarioDao::sqlTodo();
  } 

  $codEmpresa="";
  if(isset($_POST['cod'])){
    $codEmpresa=$_POST['cod'];
  }
  $loadCompany = CompanyDao::sqlCargar($codEmpresa);
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
                  <h4 class="card-title">Datos sede de empresa <?php echo $loadCompany->getName();?></h4>
                  <p class="card-description">
                    Formulario de registro para nuevas sedes
                  </p>
                  <form  action="addLugar"  method="post">
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                      <input style="visibility:hidden" type="text" class="form-control" name="company" id="company" value="<?php echo $loadCompany->getCod();?>">
                    </div>
                    <div class="form-group row">
                          <label class="col-sm-6 col-form-label"><strong>Descripción</strong></label>
                          <div class="col-sm-10">
                            <textarea id="desc" name="desc" rows="4" cols="40"></textarea>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="movil">Móvil</label>
                      <input type="text" class="form-control" name="movil" id="movil" placeholder="Número de teléfono">
                    </div>
                    <div class="form-group">
                      <label for="fijo">Fijo</label>
                      <input type="text" class="form-control" name="fijo" id="fijo" placeholder="Número de teléfono">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" required>
                    </div>
                    <div class="form-group">
                      <label for="web">Sitio web</label>
                      <input type="text" class="form-control" name="web" id="web" placeholder="Dirección de sitio web">
                    </div>
                    <div class="form-group">
                      <label for="address">Dirección</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Dirección de domicilio" required>
                    </div>
                    <div class="form-group">
                      <label for="city">Ciudad</label>
                      <input type="text" class="form-control" name="city" id="city" placeholder="Ciudad" required>
                    </div>
                    <div class="form-group">
                      <label for="province">Provincia</label>
                      <input type="text" class="form-control" name="province" id="province" placeholder="Provincia" required>
                    </div>
                    <div class="form-group">
                      <label for="country">País</label>
                      <input type="text" class="form-control" name="country"  id="country" placeholder="País" required>
                    </div>
                    <div class="form-group">
                    <label for="type">Responsable</label>
                    <select class="form-control form-control-lg" name="user1" id="user1">
                    <?php
                        foreach($clients as $fila) 
                        {
                    ?>
                      <option value="<?php echo $fila['us_cod'] ?>"><?php echo $fila['us_name'] ?></option>
                    <?php
                        } 
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Auditor</label>
                    <select class="form-control form-control-lg" name="user2" id="user2">
                    <?php
                        foreach($audits as $fila) 
                        {
                    ?>
                      <option value="<?php echo $fila['us_cod'] ?>"><?php echo $fila['us_name'] ?></option>
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
                  <form action="lugares"
                            name="form1"
                            id="form1"
                            method="post"> 
                            <input type="button" 
                            class="btn btn-warning"
                            value="Cancelar" 
                            id="nuevo"
                            name="nuevo" 
                            onclick= "document.form1.action = 'javascript:history.go(-1);'; 
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