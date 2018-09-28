<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/TipoRiesgoDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


    $id="";
    if(isset($_GET['id'])){
      $id=$_GET['id'];
    }
    $load = TipoRiesgoDao::sqlCargar($id);
    $st="0";
	if(isset($_GET['st'])){
        $st=$_GET['st'];
	}
    $load->setStatus($st);
	//inicio encriptad

	//fin encriptado

	try{
		if(TipoRiesgoDao::sqlExiste($load->getName()) > 0){
            TipoRiesgoDao::sqlUpdate($load);
            if($st == 0){
                ?>
					<script>
						alert('Registro <?php echo $load->getName()?> anulado.');
						window.location.href='tipo-riesgo';
					</script>
				<?php
            }else{
                ?>
					<script>
						alert('Registro <?php echo $load->getName()?> restaurado.');
						window.location.href='tipo-riesgo';
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