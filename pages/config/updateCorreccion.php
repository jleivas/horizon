<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/CorreccionDao.php");
$dominio = $_SERVER['HTTP_HOST']; 
    $idEval="";
    if(isset($_POST['idEval'])){
      $idEval=$_POST['idEval'];
    }else{
        ?>
			<script>
				alert('Ocurrió un error al cargar el sitio, faltan parámetrosy.');
				window.location.href='javascript:history.go(-1);';
			</script>
		<?php
        return;
    }
	$load=CorreccionDao::sqlCargarFromEvaluacion($idEval);
    $idLugar=0;
	$codEmpresa="000";
	if(isset($_POST['idPlace'])){
		$idLugar=$_POST['idPlace'];
	}
	if(isset($_POST['rut'])){
	$codEmpresa=$_POST['rut'];
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
    
    $cambios = false;

	$tratamiento="";
	if(isset($_POST['tratamiento'])){
        $tratamiento=$_POST['tratamiento'];
        if($tratamiento != $load->getTratamiento()){
            $load->setTratamiento($tratamiento);
            $cambios = true;
        }
    }

	$accion1="";
	if(isset($_POST['accion1'])){
        $accion1=$_POST['accion1'];
        if($accion1 != $load->getAccion1()){
            $load->setAccion1($accion1);
            $cambios = true;
        }
	}
	$respAccion1="";
	if(isset($_POST['resp-accion1'])){
        $respAccion1=$_POST['resp-accion1'];
        if($respAccion1 != $load->getRespAccion1()){
            $load->setRespAccion1($respAccion1);
            $cambios = true;
        }
	}
	$accion2="";
	if(isset($_POST['accion2'])){
        $accion2=$_POST['accion2'];
        if($accion2 != $load->getAccion2()){
            $load->setAccion2($accion2);
            $cambios = true;
        }
	}
	$respAccion2="";
	if(isset($_POST['resp-accion2'])){
        $respAccion2=$_POST['resp-accion2'];
        if($respAccion2 != $load->getRespAccion2()){
            $load->setRespAccion2($respAccion2);
            $cambios = true;
        }
	}
	$condicion1="";
	if(isset($_POST['condicion1'])){
        $condicion1=$_POST['condicion1'];
        if($condicion1 != $load->getCondicion1()){
            $load->setCondicion1($condicion1);
            $cambios = true;
        }
    }
    $respCondicion1="";
	if(isset($_POST['resp-condicion1'])){
        $respCondicion1=$_POST['resp-condicion1'];
        if($respCondicion1 != $load->getRespCondicion1()){
            $load->setRespCondicion1($respCondicion1);
            $cambios = true;
        }
	}
	$condicion2="";
	if(isset($_POST['condicion2'])){
        $condicion2=$_POST['condicion2'];
        if($condicion2 != $load->getCondicion2()){
            $load->setCondicion2($condicion2);
            $cambios = true;
        }
    }
    $respCondicion2="";
	if(isset($_POST['resp-condicion2'])){
        $respCondicion2=$_POST['resp-condicion2'];
        if($respCondicion2 != $load->getRespCondicion2()){
            $load->setRespCondicion2($respCondicion2);
            $cambios = true;
        }
	}
    $planAccion="";
	if(isset($_POST['plan-accion'])){
        $planAccion=$_POST['plan-accion'];
        if($planAccion != $load->getPlanAccion()){
            $load->setPlanAccion($planAccion);
            $cambios = true;
        }
    }
    $planCorreccion="";
	if(isset($_POST['plan-correccion'])){
        $planCorreccion=$_POST['plan-correccion'];
        if($planCorreccion != $load->getPlanCondicion()){
            $load->setPlanCorreccion($planCorreccion);
            $cambios = true;
        }
	}
	try{
        if($cambios){
            if(CorreccionDao::sqlExiste($load->getId()) != 0){
				CorreccionDao::sqlUpdate($load);
				?>
					<script>
						alert('Datos registrados exitosamente.');
						window.location.href='evaluaciones?<?php echo $historyPath?>';
					</script>
				<?php
            }else{
                ?>
				<script>
					alert('Ocurrió un error al intentar registrar los datos: No existe un registro con los parámetros enviados.');
					window.location.href='javascript:history.go(-1);';
				</script>
			    <?php
            }
        }else{
            ?>
			<script>
				alert('Sin modificaciones: No se han enviado nuevos parámetros para modificar.');
				window.location.href='evaluaciones?<?php echo $historyPath?>';
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
    
    function validaLetras($arg) {
		$validate = $arg;

		$validate = str_replace(
			array("\\", "*", "¨", "º", "-", "~",
				"#", "@", "|", "!", "\"",
				"·", "$", "%", "&",
				"(", ")", "?", "'", "¡",
				"¿", "[", "^", "<code>", "]",
				"+", "}", "{", "¨", "´",
				">", "< ", ";", ",", ":",
				".", " "),
			' ',
			$validate
		);
		
		if($arg != $validate){
			?>
				<script>
					alert('Ocurrió un error al registrar los datos: uno de los datos ingresados contiene caracteres inválidos.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
			return false;
		}else{
			return true;
		}
	}

?>