<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/EvaluacionDao.php");
$dominio = $_SERVER['HTTP_HOST']; 

$idLugar=0;
$codEmpresa="000";
if(isset($_GET['idPlace'])){
    $idLugar=$_GET['idPlace'];
}
if(isset($_GET['rut'])){
$codEmpresa=$_GET['rut'];
}

if($idLugar === 0 || $codEmpresa === "000"){
    ?>
        <script>
            alert('Ocurrió un error al cargar el sitio, faltan parámetros.');
            window.location.href='javascript:history.go(-1);';
        </script>
    <?php
    return;
}

$historyPath = "rut=".$codEmpresa."&cod=".$idLugar;

    $id="";
    $params = true;
    if(isset($_GET['idEval'])){
      $id=$_GET['idEval'];
    }else{
        $params = false;
    }
    $load = EvaluacionDao::sqlCargar($id);
    $st="0";
	if(isset($_GET['st'])){
        $st=$_GET['st'];
	}else{
        $params = false;
    }
    
    if($params == false){
        ?>
				<script>
					alert('Ocurrió un error al registrar los datos: No se recibieron los parámetros necesarios.');
					window.location.href='javascript:history.go(-1);';
				</script>
        <?php	
        return;
    }
    $load->setStatus($st);
	//inicio encriptad

	//fin encriptado

	try{
		if(EvaluacionDao::sqlExiste($load->getId()) > 0){
            EvaluacionDao::sqlUpdate($load);
            if($st == 0){
                ?>
					<script>
						alert('Registro anulado satisfactoriamente.');
						window.location.href='evaluaciones?<?php echo $historyPath;?>';
					</script>
				<?php
            }else{
                ?>
					<script>
						alert('Registro restaurado satisfactoriamente.');
						window.location.href='evaluaciones?<?php echo $historyPath;?>';
					</script>
				<?php
            }
		}else{
            ?>
				<script>
					alert('Ocurrió un error al registrar los datos: El registro no se encuentra almacenado.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php	
		}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al registrar los datos: <?php echo $e->getMessage(); ?>. Póngase en contacto con su proveedor de software.');
				window.location.href='javascript:history.go(-1);';
			</script>
		<?php
	}
?>