<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/AccionDao.php");
$dominio = $_SERVER['HTTP_HOST']; 
    $id="";
    if(isset($_POST['id'])){
      $id=$_POST['id'];
    }
    $load=AccionDao::sqlCargar($id);
    $tempName = $load->getName();
    $name="";
	if(isset($_POST['name'])){
        $name=$_POST['name'];
        $load->setName($name);
	}

	$validate = $name;

	$validate = str_replace(
        array("\\", "*", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ":",
             ".", " "),
        ' ',
        $validate
	);
    
	$estado=1;

	try{
		if($name != $validate){
			?>
				<script>
					alert('Ocurrió un error al registrar los datos: El nombre ingresado contiene caracteres inválidos.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
			return;
		}
		if($tempName != $name){
            if(AccionDao::sqlExiste($name) == 0){
                AccionDao::sqlUpdate($load);
				?>
					<script>
						alert('Registro modificado exitosamente.');
						window.location.href='acciones';
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