<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/CausaDao.php");
$dominio = $_SERVER['HTTP_HOST']; 
    $id="";
    if(isset($_POST['id'])){
      $id=$_POST['id'];
    }
    $load=CausaDao::sqlCargar($id);
    $tempName = $load->getName();
    $name="";
	if(isset($_POST['name'])){
        $name=$_POST['name'];
        $load->setName($name);
	}
    
	$estado=1;

	try{
		if($tempName != $name){
            if(CausaDao::sqlExiste($name) == 0){
                CausaDao::sqlUpdate($load);
				?>
					<script>
						alert('Registro modificado exitosamente.');
						window.location.href='causas';
					</script>
				<?php
            }else{
                ?>
				<script>
					alert('Ocurrió un error al registrar los datos: Ya existe un registro con el mismo nombre.');
					window.location.href='javascript:history.go(-1);';
				</script>
			    <?php
            }
		}else{
            ?>
				<script>
					alert('No se reconocen cambios: El registro no se ha modificado.');
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