<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/EvaluacionDao.php");
$dominio = $_SERVER['HTTP_HOST']; 
    $id="";
    if(isset($_POST['idEval'])){
      $id=$_POST['idEval'];
    }else{
        ?>
			<script>
				alert('Ocurrió un error al cargar el sitio, faltan parámetros.');
				window.location.href='javascript:history.go(-1);';
			</script>
		<?php
    }
    $load=EvaluacionDao::sqlCargar($id);
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
	}

    $historyPath = "rut=".$codEmpresa."&cod=".$idLugar;
    
    $cambios = false;

	$objetivo="";
	if(isset($_POST['objetivo'])){
        $objetivo=$_POST['objetivo'];
        if($objetivo != $load->getObject()){
            $load->setObject($objetivo);
            $cambios = true;
        }
    }

	if(!validaLetras($objetivo)){
		return;
	}
	$zona="";
	if(isset($_POST['zona'])){
        $zona=$_POST['zona'];
        if($zona != $load->getZone()){
            $load->setZone($zona);
            $cambios = true;
        }
	}
	if(!validaLetras($zona)){
		return;
	}
	$tipo="";
	if(isset($_POST['tipo'])){
        $tipo=$_POST['tipo'];
        if($tipo != $load->getIdTipoRiesgo()){
            $load->setIdTipoRiesgo($tipo);
            $cambios = true;
        }
	}
	$causa="";
	if(isset($_POST['causa'])){
        $causa=$_POST['causa'];
        if($causa != $load->getIdCausa()){
            $load->setIdCausa($causa);
            $cambios = true;
        }
	}
	$atr="";
	if(isset($_POST['atr'])){
        $atr=$_POST['atr'];
        if($atr != $load->getAtract()){
            $load->setAtract($atr);
            $cambios = true;
        }
	}
	$exp="";
	if(isset($_POST['exp'])){
        $exp=$_POST['exp'];
        if($exp != $load->getExp()){
            $load->setExp($exp);
            $cambios = true;
        }
    }
    $deb="";
	if(isset($_POST['deb'])){
        $deb=$_POST['deb'];
        if($deb != $load->getDeb()){
            $load->setDeb($deb);
            $cambios = true;
        }
	}
	$result="";
	if(isset($_POST['result'])){
        $result=$_POST['result'];
        if($result != $load->getIdResult()){
            $load->setIdResult($result);
            $cambios = true;
        }
    }

	try{
        if($cambios){
            if(EvaluacionDao::sqlExiste($id) != 0){
                EvaluacionDao::sqlUpdate($load);
				?>
					<script>
						alert('Registro modificado exitosamente.');
						window.location.href='evaluaciones?<?php echo $historyPath?>';
					</script>
				<?php
            }else{
                ?>
				<script>
					alert('Ocurrió un error al registrar los datos: No existe un registro con los parámetros enviados.');
					window.location.href='javascript:history.go(-1);';
				</script>
			    <?php
            }
        }else{
            ?>
			<script>
				alert('Sin modificaciones: No se han enviado nuevos parámetros para modificar.');
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