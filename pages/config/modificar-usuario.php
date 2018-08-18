<?php
$bg_sp=buildPath();

/* Variables de uso general                            */
$separator = "/";
$navBar = "..".$separator."components".$separator."navbar.php";
$sideBar = "..".$separator."components".$separator."sidebar.php";
$footer = "..".$separator."components".$separator."footer.php";
$title = "..".$separator."components".$separator."title.php";
if (!isset($rootDir)){
    $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
      require_once($rootDir."/private/dao/UsuarioDao.php");
  } 
$cod="";
if(isset($_GET['cod'])){
  $cod=$_GET['cod'];
}
$loadUser = UsuarioDao::sqlCargar($cod);

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
                  <h4 class="card-title">Datos del Usuario</h4>
                  <p class="card-description">
                    Actualizar datos del usuario
                  </p>
                  <form  action="updateUser.php"  method="post">
                    <div class="form-group">
                      <label for="cod">Dni o Rut</label>
                      <input type="text" class="form-control" name="cod" id="cod" value="<?php echo $loadUser->getCod();?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $loadUser->getName();?>" required>
                    </div>
                    <div class="form-group">
                      <label for="movil">Móvil</label>
                      <input type="text" class="form-control" name="movil" id="movil" value="<?php echo $loadUser->getPhone1();?>">
                    </div>
                    <div class="form-group">
                      <label for="fijo">Fijo</label>
                      <input type="text" class="form-control" name="fijo" id="fijo" value="<?php echo $loadUser->getPhone2();?>">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo $loadUser->getMail();?>" required>
                    </div>
                    <div class="form-group">
                      <label for="web">Sitio web</label>
                      <input type="text" class="form-control" name="web" id="web" value="<?php echo $loadUser->getWeb();?>">
                    </div>
                    <div class="form-group">
                      <label for="address">Dirección</label>
                      <input type="text" class="form-control" name="address" id="address" value="<?php echo $loadUser->getAddress();?>" required>
                    </div>
                    <div class="form-group">
                      <label for="city">Ciudad</label>
                      <input type="text" class="form-control" name="city" id="city" value="<?php echo $loadUser->getCity();?>" required>
                    </div>
                    <div class="form-group">
                      <label for="province">Provincia</label>
                      <input type="text" class="form-control" name="province" id="province" value="<?php echo $loadUser->getProvince();?>" required>
                    </div>
                    <div class="form-group">
                      <label for="country">País</label>
                      <input type="text" class="form-control" name="country"  id="country" value="<?php echo $loadUser->getCountry();?>" required>
                    </div>
                    <div class="form-group">
                    <label for="type">Cateoría</label>
                    <select class="form-control form-control-lg" name="category" id="category">
                      <option value="2">Super Admin</option>
                      <option value="3">Admin</option>
                      <option value="4">Auditor</option>
                      <option value="5">Cliente</option>
                    </select>
                    <script
                        src="https://code.jquery.com/jquery-3.2.0.min.js"
                        integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
                        crossorigin="anonymous">
                    </script>
                    <script>
                        //Esta es la función que una vez se cargue el documento será gatillada.
                        $(function(){
                            $("#category").val('<?php echo $loadUser->getTipo();?>')
                        });
                    </script>
                    </div>
                    <p class="form-group">Avatar</p>
                    <div class="form-group">
                    &nbsp;&nbsp;&nbsp;&nbsp;1-<img src="<?php echo $bg_sp;?>images/faces-clipart/pic-1.png" alt="image" />&nbsp;&nbsp;
                      2-<img src="<?php echo $bg_sp;?>images/faces-clipart/pic-2.png" alt="image" />&nbsp;&nbsp;
                      3-<img src="<?php echo $bg_sp;?>images/faces-clipart/pic-3.png" alt="image" />&nbsp;&nbsp;
                      4-<img src="<?php echo $bg_sp;?>images/faces-clipart/pic-4.png" alt="image" />
                      <select class="form-control form-control-lg" name="image" id="image">
                      <option value="images/faces-clipart/pic-1.png">Imagen 1</option>
                      <option value="images/faces-clipart/pic-2.png">Imagen 2</option>
                      <option value="images/faces-clipart/pic-3.png">Imagen 3</option>
                      <option value="images/faces-clipart/pic-4.png">Imagen 4</option>
                    </select>
                    <script>
                        //getAvatar retorna la uirl de la imagen, configurar con str para mostrar sólo el número.
                        $(function(){
                            $("#image").val('<?php echo $loadUser->getAvatar();?>')
                        });
                    </script>
                    </div>
                    <div class="form-group">
                    <input type="submit" value="Modificar" class="btn btn-info mr-2">
                    </div>
                  </form>
                  <div class="form-group">
                  <form action="usuarios"
                            name="form1"
                            id="form1"
                            method="post"> 
                            <input type="button" 
                            class="btn btn-warning"
                            value="Cancelar" 
                            id="nuevo"
                            name="nuevo" 
                            onclick= "document.form1.action = 'usuarios'; 
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