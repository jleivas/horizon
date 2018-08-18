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
        <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Correcciones</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Código de evaluación: 1223
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Blanco u Objetivo</label>
                          <div class="col-sm-9">
                            <input type="text" id="blanco" class="form-control" value = "Caja fuerte"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tipo de riesgo</label>
                          <div class="col-sm-9">
                            <input type="text" id="tipo-riesgo" class="form-control" value ="Riesgo puro" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Causa o Vector</label>
                          <div class="col-sm-9">
                            <input type="text" id="causa" class="form-control" value = "Asalto"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Consecuencias inmediatas</label>
                          <div class="col-sm-9">
                            <input type="text" id="consecuencias" class="form-control" value ="Perdidas / Sustracción de productos" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nivel de riesgo</label>
                          <div class="col-sm-9">
                            <mark class="bg-danger text-white">Muy alto</mark>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>Tratamiento del riesgo</strong></label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>tratamiento</option>
                              <option>tratamiento</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">
                    <strong>Acciones correctivas</strong>
                    </p>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Accion 1</label>
                          <div class="col-sm-9">
                            <select id="accion1" class="form-control">
                              <option>acciones</option>
                              <option>acciones</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Responsable</label>
                          <div class="col-sm-9">
                            <select id="resp-accion1" class="form-control">
                              <option>resp1</option>
                              <option>resp2</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Accion 2</label>
                          <div class="col-sm-9">
                            <select id="accion2" class="form-control">
                              <option>acciones</option>
                              <option>acciones</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Responsable</label>
                          <div class="col-sm-9">
                            <select id="resp-accion2" class="form-control">
                              <option>resp1</option>
                              <option>resp2</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">
                    <strong>Condiciones correctivas</strong>
                    </p>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Condición 1</label>
                          <div class="col-sm-9">
                            <select id="condicion1" class="form-control">
                              <option>condiciones</option>
                              <option>condiciones</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Responsable</label>
                          <div class="col-sm-9">
                            <select id="resp-condicion1" class="form-control">
                              <option>resp1</option>
                              <option>resp2</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Condición 2</label>
                          <div class="col-sm-9">
                            <select id="condicion2" class="form-control">
                              <option>condicion</option>
                              <option>condicion</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Responsable</label>
                          <div class="col-sm-9">
                            <select id="resp-condicion2" class="form-control">
                              <option>resp1</option>
                              <option>resp2</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label"><strong>Plan de acción</strong></label>
                          <div class="col-sm-10">
                            <textarea rows="4" cols="40">
                            </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label"><strong>Plan de corrección</strong></label>
                          <div class="col-sm-10">
                            <textarea rows="4" cols="40">
                            </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-info mr-2">Guardar</button>
                    </div>
                  </form>
                  <div class="form-group">
                  <form action="evaluaciones"
                            name="form1"
                            id="form1"
                            method="post"> 
                            <input type="button" 
                            class="btn btn-warning"
                            value="Volver" 
                            id="nuevo"
                            name="nuevo" 
                            onclick= "document.form1.action = 'evaluaciones'; 
                            document.form1.submit()" />
                  </form>
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