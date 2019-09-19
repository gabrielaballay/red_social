<?php 
include_once 'models/posteoModel.php';
include_once 'header.php';
$usuario=$_SESSION['usuario_registrado'];
$user=$usuario->id_usuario;
?>

<main class="container">
	<div class="row">
		<?php include_once 'nav.php'; ?>
		<div class="col">
		
		<!---- SECCION PORTAFOLIO ---->

		<div class="row galeria-imagen">
			<div class="col">
				<h2 class="titulo">Galeria</h2>
				<div class="row galeria justify-content-center">
				<?php
					$permitidos = array("jpg", "jpeg", "gif", "png");//extensiones permitidas
					$dir='public/imageusuarios/'.$usuario->id_usuario.'-'.$usuario->nombre.'/';//obtengo la ruta
					if(file_exists($dir)){
						$directorio = opendir($dir);//abrimos el directorio para obtener los archivos
					
						while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
						{
						    if (!is_dir($archivo))//verificamos que no sea un directorio
						    {
						    	$partes_ruta = pathinfo($archivo);//obtenemos la informacion del archivo
						    	if (in_array($partes_ruta['extension'], $permitidos)){//verificamos las extensiones ?>
						    		<div class="contenedor-imagen col-6 col-lg-4">
										<a href="#" data-toggle="modal" data-target="#modal">
											<img src="<?php echo $dir.$archivo;?>" alt="" class="modal-content imagen">
										</a>
									</div>
						        <?php	echo "<br />";
						    	}
						    }
						}
					}else{ ?>
						<div class="contenedor-imagen col-8 col-lg-6">
							<p style="color: #3524DC;font-size: 16px;">No tienes fotos para mostrar</p>
						</div> 
				<?php
					}
				?>
				
					
					<div class="modal fade" id="modal">
						<div class="modal-dialog d-flex align-items-center">
							<div class="">
								<img src="" id="imagen-modal" alt="" class="imagen">
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		</div>
		<?php include_once ('nav-publicidad.php');?>
	</div>
</main>

<script src="<?php echo constant('URL')?>public/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo constant('URL')?>public/js/bootstrap.min.js"></script>

<script>
	$(function(){
		$('.galeria .contenedor-imagen').on('click',function(){
			$('#modal').modal;
			var ruta_imagen=($(this).find('img').attr('src'));
			$('#imagen-modal').attr('src',ruta_imagen);
		});
		$('#modal').on('click',function(){
			$('#modal').modal('hide');
		})
	})
</script>