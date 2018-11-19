<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/EvaluacionDao.php");
$dominio = $_SERVER['HTTP_HOST']; 

	$objetivo="";
	if(isset($_POST['objetivo'])){
		$objetivo=$_POST['objetivo'];
    }
    $place="";
	if(isset($_POST['place'])){
		$place=$_POST['place'];
	}
	$zona="";
	if(isset($_POST['zona'])){
		$zona=$_POST['zona'];
	}
	$tipo="";
	if(isset($_POST['tipo'])){
		$tipo=$_POST['tipo'];
	}
	$causa="";
	if(isset($_POST['causa'])){
		$causa=$_POST['causa'];
	}
	$atr="";
	if(isset($_POST['atr'])){
		$atr=$_POST['atr'];
	}
	$exp="";
	if(isset($_POST['exp'])){
		$exp=$_POST['exp'];
    }
    $deb="";
	if(isset($_POST['deb'])){
		$deb=$_POST['deb'];
	}
	$result="";
	if(isset($_POST['result'])){
		$result=$_POST['result'];
    }
	$estado=1;
	$id = EvaluacionDao::sqladdId();
	try{
		if(EvaluacionDao::sqlExiste($id) > 0){
			?>
				<script>
					alert('Ocurrió un error al registrar los datos: Conflicto con identificador, intente nuevamente.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
		}else{
				$eva = new Evaluacion($id, $objetivo,$zona,$tipo,$causa,$atr,
                $exp,$deb,$result,$place,$estado);
				EvaluacionDao::sqlInsert($eva);
				?>
					<script>
						alert('Evaluación registrada exitosamente.');
						window.location.href='usuarios';
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
}

?>