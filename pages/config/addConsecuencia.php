<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/ConsecuenciaDao.php");
$dominio = $_SERVER['HTTP_HOST']; 

    $name="";
	if(isset($_POST['name'])){
		$name=$_POST['name'];
	}
	
	$estado=1;
	try{
		if(ConsecuenciaDao::sqlExiste($name) > 0){
			?>
				<script>
					alert('Ocurrió un error al registrar los datos: El registro <?php echo $name;?> ya existe.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
		}else{
                $tp = new Consecuencia(ConsecuenciaDao::sqladdId(), $name,$estado);
                echo $tp->imprimir();
				ConsecuenciaDao::sqlInsert($tp);
				?>
					<script>
						alert('Registro almacenado exitosamente.');
						window.location.href='consecuencias';
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