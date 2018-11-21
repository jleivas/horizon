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
    require_once($rootDir."/private/dao/LugarDao.php");
    require_once($rootDir."/private/dao/EvaluacionDao.php");
    require_once($rootDir."/private/dao/TipoRiesgoDao.php");
    require_once($rootDir."/private/dao/CausaDao.php");
    require_once($rootDir."/private/dao/ConsecuenciaDao.php");
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
$idLugar="000";
$codEmpresa="000";
if(isset($_GET['cod'])){
  $idLugar=$_GET['cod'];
}
$datos1=EvaluacionDao::sqlTodoPorLugar($idLugar);
if(isset($_GET['rut'])){
  $codEmpresa=$_GET['rut'];
}
if($idLugar === "000" || $codEmpresa === "000"){
  ?>
		<script>
			alert('Ocurrió un error al cargar el sitio, faltan parámetros.');
			window.location.href='javascript:history.go(-1);';
		</script>
	<?php
}

$loadPlace = LugarDao::sqlCargar($idLugar);
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
                  <h4 class="card-title">Evaluaciones para empresa <?php echo $loadPlace->getName(); ?></h4>
                  
                  <p class="card-description">
                    <div class="form-group">
                    Crear nueva Evaluación
                    <div class="row">
                        <div class="col-md-2">
                          <form action="nueva-evaluacion"
                                name="form1"
                                id="form1"
                                method="post">
                                  <input type="button" 
                                  class="btn btn-success btn-rounded btn-fw"
                                  value="Crear evaluacion" 
                                  id="nuevo"
                                  name="nuevo" 
                                  onclick= "document.form1.action = 'nueva-evaluacion?rut=<?php echo $codEmpresa;?>&idPlace=<?php echo $loadPlace->getId();?>'; 
                                  document.form1.submit()" />
                          </form>
                        </div>

                        <div class="col-md-2"></div>
                        
                        <div class="col-md-2">
                        
                        </div>

                        <div class="col-md-2">
                          
                        </div>

                        <div class="col-md-2">
                          
                        </div>
                        
                        <div class="col-md-2">
                          <form action="lugares"
                                name="form2"
                                id="form2"
                                method="post"> 
                                <input type="button" 
                                class="btn btn-warning btn-rounded btn-fw"
                                value="Volver" 
                                onclick= "document.form2.action = 'lugares?cod=<?php echo $codEmpresa;?>'; 
                                document.form2.submit()" />
                          </form>
                        </div>
                      </div>
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
                            Item
                          </th>
                          <th>
                            Blanco/Objetivo
                          </th>
                          <th>
                            Zona
                          </th>
                          <th>
                            Tipo de riesgo
                          </th>
                          <th>
                            Causa/Vector
                          </th>
                          <th>
                            <small><strong>Atracción</strong></small>
                          </th>
                          <th>
                            <small><strong>Exposición</strong></small>
                          </th>
                          <th>
                            <small><strong>Debilidad</strong></small>
                          </th>
                          <th>
                            <small><strong>Consecuencias</strong></small>
                          </th>
                          <th>
                            Ponderación
                          </th>
                          <th>
                            Probabilidad
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
                            <?php echo $fila['ev_id'];?>
                          </td>
                          <td>
                            <?php echo $fila['ev_object'];?>
                          </td>
                          <td>
                            <?php echo $fila['ev_zone'];?>
                          </td>
                          <td>
                            <?php
                              $tipos=TipoRiesgoDao::sqlTodo();
                              foreach($tipos as $tp) 
                                {
                                  if($tp['tp_id'] == $fila['tipo_riesgo_tp_id']){
                                    echo $tp['tp_name']; 
                                  }
                                }
                            ?>
                          </td>
                          <td>
                              <?php
                                  $causas=CausaDao::sqlTodo();
                                  foreach ($causas as $ca) {
                                  if($ca['ca_id'] == $fila['causa_ca_id']){
                                    ?>
                                      <?php echo $ca['ca_name']; ?>
                                    <?php
                                      }
                                    
                                }
                              ?>
                          </td>
                          <td>
                            <?php
                              $atraccion = "";
                              if($fila['ev_atract']==1){
                                $atraccion = "Muy Baja";
                              }
                              if($fila['ev_atract']==2){
                                $atraccion = "Baja";
                              }
                              if($fila['ev_atract']==3){
                                $atraccion = "Media";
                              }
                              if($fila['ev_atract']==4){
                                $atraccion = "Alta";
                              }
                              if($fila['ev_atract']==5){
                                $atraccion = "Muy Alta";
                              }
                              echo $atraccion; 
                            ?>
                          </td>
                          <td>
                            <?php
                              $exp = "";
                              if($fila['ev_exp']==1){
                                $exp = "Muy Baja";
                              }
                              if($fila['ev_exp']==2){
                                $exp = "Baja";
                              }
                              if($fila['ev_exp']==3){
                                $exp = "Media";
                              }
                              if($fila['ev_exp']==4){
                                $exp = "Alta";
                              }
                              if($fila['ev_exp']==5){
                                $exp = "Muy Alta";
                              }
                              echo $exp; 
                            ?>
                          </td>
                          <td>
                            <?php
                              $deb = "";
                              if($fila['ev_deb']==1){
                                $deb = "Muy Baja";
                              }
                              if($fila['ev_deb']==2){
                                $deb = "Baja";
                              }
                              if($fila['ev_deb']==3){
                                $deb = "Media";
                              }
                              if($fila['ev_deb']==4){
                                $deb = "Alta";
                              }
                              if($fila['ev_deb']==5){
                                $deb = "Muy Alta";
                              }
                              echo $deb; 
                            ?>
                          </td>
                          <td>
                            <?php
                                $consecuencias=ConsecuenciaDao::sqlTodo(); 
                                foreach($consecuencias as $con) 
                                {
                                  if($con['re_id'] == $fila['result_re_id']){
                                    echo $con['re_name']; 
                                  }
                                }
                            ?>
                          </td>
                          <td>
                            <?php
                              $ponderacion = ($fila['ev_atract']*0.5) + ($fila['ev_exp']*0.25) + ($fila['ev_deb']*0.25);
                              echo number_format($ponderacion,1);
                            ?>
                          </td>
                          <td>
                            <?php
                              $prob = "";
                              $color = "btn-success";
                              if($ponderacion < 1.5){
                                $prob = "Muy Baja";
                                $color = "btn-success";
                              }
                              if($ponderacion >= 1.5 && $ponderacion < 2.5){
                                $prob = "Baja";
                                $color = "btn-success";
                              }
                              if($ponderacion >= 2.5 && $ponderacion < 3.5){
                                $prob = "Media";
                                $color = "btn-warning";
                              }
                              if($ponderacion >= 3.5 && $ponderacion < 4.5){
                                $prob = "Alta";
                                $color = "btn-warning";
                              }
                              if($ponderacion >= 4.5){
                                $prob = "Muy Alta";
                                $color = "btn-danger";
                              }
                              ?>
                              <input type="button" 
                                class="btn <?php echo $color;?> btn-fw"
                                value="<?php echo $prob;?>"/>
                          </td>
                          <td>
                              <?php
                                if($fila['ev_status'] == 1){
                                  ?>
                                    <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Administrar
                                    </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="modificar-evaluacion?idEval=<?php echo $fila['ev_id'];?>&rut=<?php echo $codEmpresa;?>&idPlace=<?php echo $loadPlace->getId();?>">
                                          <i class="fa fa-reply fa-fw"></i>Modificar</a>
                                          <a class="dropdown-item" href="correcciones">
                                          <i class="fa fa-reply fa-fw"></i>Correcciones</a>
                                        <a class="dropdown-item" href="eliminar-evaluacion?idEval=<?php echo $fila['ev_id'];?>&st=0&rut=<?php echo $codEmpresa;?>&idPlace=<?php echo $loadPlace->getId();?>">
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
                                        <a class="dropdown-item" href="eliminar-evaluacion?idEval=<?php echo $fila['ev_id'];?>&st=1&rut=<?php echo $codEmpresa;?>&idPlace=<?php echo $loadPlace->getId();?>">
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