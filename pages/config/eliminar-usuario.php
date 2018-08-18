<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/UsuarioDao.php");
require_once($rootDir . "/private/dao/CorreosDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
    $cod="";
    if(isset($_GET['cod'])){
      $cod=$_GET['cod'];
    }
    $user = UsuarioDao::sqlCargar($cod);
    $st="0";
	if(isset($_GET['st'])){
        $st=$_GET['st'];
	}
    $user->setStatus($st);
	//inicio encriptad

	//fin encriptado

	try{
		if(UsuarioDao::sqlExiste($cod) > 0){
			UsuarioDao::sqlUpdate($user);
				?>
					<script>
						alert('Usuario <?php echo $user->getName()?> modificado.');
						window.location.href='usuarios';
					</script>
				<?php
		}else{
            ?>
				<script>
					alert('Ocurrió un error al registrar los datos: El usuario no se encuentra registrado.');
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