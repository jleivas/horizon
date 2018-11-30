<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/CondicionDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


    $id="";
    if(isset($_GET['id'])){
      $id=$_GET['id'];
    }
    $load = CondicionDao::sqlCargar($id);
    $st="0";
	if(isset($_GET['st'])){
        $st=$_GET['st'];
	}
    $load->setStatus($st);
	//inicio encriptad

	//fin encriptado

	try{
		if(CondicionDao::sqlExiste($load->getName()) > 0){
            CondicionDao::sqlUpdate($load);
            if($st == 0){
                ?>
					<script>
						window.location.href='condiciones';
                        alert('Registro:  \"<?php echo $load->getName()?>\" anulado.');
					</script>
				<?php
            }else{
                ?>
					<script>
						window.location.href='condiciones';
                        alert('Registro:  \"<?php echo $load->getName()?>\" restaurado.');
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