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
      require_once($rootDir."/private/dao/EvaluacionDao.php");
      require_once($rootDir."/private/dao/TipoRiesgoDao.php");
      require_once($rootDir."/private/dao/CausaDao.php");
      require_once($rootDir."/private/dao/ConsecuenciaDao.php");
      require_once($rootDir."/private/dao/LugarDao.php");
      $tipos=TipoRiesgoDao::sqlListar();
      $causas=CausaDao::sqlListar();
      $consecuencias=ConsecuenciaDao::sqlListar();
} 

$idLugar=0;
$codEmpresa="000";
$idEval=0;
if(isset($_GET['idPlace'])){
    $idLugar=$_GET['idPlace'];
}
if(isset($_GET['rut'])){
  $codEmpresa=$_GET['rut'];
}
if(isset($_GET['idEval'])){
    $idEval=$_GET['idEval'];
}else{
    ?>
		<script>
			alert('Ocurrió un error al cargar el sitio, faltan parámetros.');
			window.location.href='javascript:history.go(-1);';
		</script>
	<?php
}

if($idLugar === 0 || $codEmpresa === "000"){
    ?>
		<script>
			alert('Ocurrió un error al cargar el sitio, faltan parámetros.');
			window.location.href='javascript:history.go(-1);';
		</script>
	<?php
}

$historyPath = "rut=".$codEmpresa."&cod=".$idLugar;

$loadPlace = LugarDao::sqlCargar($idLugar);
$eval = EvaluacionDao::sqlCargar($idEval);

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

function getHtmlSelect($num,$value){
    $sel = "";
    if($num == $value){
        $sel = "value='".$num."' selected";
    }else{
        $sel = "value='".$num."'";
    }
    return $sel;
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
                  <h4 class="card-title">Modificar evaluación</h4>
                  <p class="card-description">
                    Actualize los datos del formulario para guardar la información correcta
                  </p>
                  <form  action="updateEvaluacion"  method="post">
                    <div class="form-group">
                      <label for="cod">Blanco u objetivo</label>
                      <input type="text" class="form-control" name="objetivo" id="objetivo" value="<?= $eval->getObject()?>" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Zona</label>
                      <input type="text" class="form-control" name="zona" id="zona" value="<?= $eval->getZone()?>" required>
                    </div>
                    <div class="form-group">
                      <label for="type">Tipo de riesgo</label>
                      <select class="form-control form-control-lg" name="tipo" id="tipo">
                        <?php
                            foreach($tipos as $fila) 
                            {
                                if($fila['tp_id']==$eval->getIdTipoRiesgo()){
                                    ?>
                                    <option value="<?php echo $fila['tp_id']; ?>" selected><?php echo $fila['tp_name']; ?></option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="<?php echo $fila['tp_id']; ?>"><?php echo $fila['tp_name']; ?></option>
                                    <?php
                                }
                            }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="type">Causa o vector</label>
                      <select class="form-control form-control-lg" name="causa" id="causa">
                        <?php
                            foreach($causas as $fila) 
                            {
                                if($fila['ca_id'] == $eval->getIdCausa()){
                                    ?>
                                    <option value="<?php echo $fila['ca_id']; ?>" selected><?php echo $fila['ca_name']; ?></option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="<?php echo $fila['ca_id']; ?>"><?php echo $fila['ca_name']; ?></option>
                                    <?php
                                }
                            }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Atracción</label>
                    <select class="form-control form-control-lg" name="atr" id="atr">
                      <option <?php echo getHtmlSelect(1,$eval->getAtract()) ?>>Muy baja</option>
                      <option <?php echo getHtmlSelect(2,$eval->getAtract()) ?>>Baja</option>
                      <option <?php echo getHtmlSelect(3,$eval->getAtract()) ?>>Media</option>
                      <option <?php echo getHtmlSelect(4,$eval->getAtract()) ?>>Alta</option>
                      <option <?php echo getHtmlSelect(5,$eval->getAtract()) ?>>Muy alta</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Exposición</label>
                    <select class="form-control form-control-lg" name="exp" id="exp">
                      <option <?php echo getHtmlSelect(1,$eval->getExp()) ?>>Muy baja</option>
                      <option <?php echo getHtmlSelect(2,$eval->getExp()) ?>>Baja</option>
                      <option <?php echo getHtmlSelect(3,$eval->getExp()) ?>>Media</option>
                      <option <?php echo getHtmlSelect(4,$eval->getExp()) ?>>Alta</option>
                      <option <?php echo getHtmlSelect(5,$eval->getExp()) ?>>Muy alta</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Debilidad</label>
                    <select class="form-control form-control-lg" name="deb" id="deb">
                      <option <?php echo getHtmlSelect(1,$eval->getDeb()) ?>>Muy baja</option>
                      <option <?php echo getHtmlSelect(2,$eval->getDeb()) ?>>Baja</option>
                      <option <?php echo getHtmlSelect(3,$eval->getDeb()) ?>>Media</option>
                      <option <?php echo getHtmlSelect(4,$eval->getDeb()) ?>>Alta</option>
                      <option <?php echo getHtmlSelect(5,$eval->getDeb()) ?>>Muy alta</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="type">Consecuencias</label>
                    <select class="form-control form-control-lg" name="result" id="result">
                    <?php
                        foreach($consecuencias as $fila) 
                        {
                            if($fila['re_id'] == $eval->getIdResult()){
                                ?>
                                <option value="<?php echo $fila['re_id']; ?>" selected><?php echo $fila['re_name']; ?></option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo $fila['re_id']; ?>"><?php echo $fila['re_name']; ?></option>
                                <?php
                            }
                        }
                    ?>
                    </select>
                    </div>
                    <input type="hidden" class="form-control" name="place" id="place" value="<?php echo $loadPlace->getId();?>">
                    <input type="hidden" class="form-control" name="rut" id="rut" value="<?php echo $codEmpresa;?>">
                    <input type="hidden" class="form-control" name="idPlace" id="idPlace" value="<?php echo $idLugar;?>">
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
                            onclick= "document.form1.action = 'evaluaciones?<?php echo $historyPath;?>'; 
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