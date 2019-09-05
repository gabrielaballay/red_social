<?php 
include_once 'header.php';
$usuario=$_SESSION['usuario_registrado'];
$user=$usuario->id_usuario;
?>

<main class="container">
	<div class="row">
		<?php include_once 'nav.php'; ?>
		<div class="col">
		
		<!---- SECCION PORTAFOLIO ---->

		<div class="row portafolio" id="portafolio">
			<div class="col">
				<h2 class="titulo">Gelria</h2>
				<div class="row galeria justify-content-center">
					<div class="contenedor-imagen col-6 col-lg-4">
						<a href="#" data-toggle="modal" data-target="#modal">
							<img src="<?php echo constant('URL').'public/imageusuarios/'.$usuario->imagen_perfil;?>" alt="" class="img-fluid imagen">
						</a>
					</div>
					<div class="contenedor-imagen col-6 col-lg-4">
						<a href="#" data-toggle="modal" data-target="#modal">
							<img src="<?php echo constant('URL').'public/imageusuarios/'.$usuario->imagen_perfil;?>" alt="" class="img-fluid imagen">
						</a>
					</div>
					<div class="modal fade" id="modal">
						<div class="modal-dialog d-flex justify-content-center align-items-center">
							<div class="modal-content">
								<img src="" id="imagen-modal" alt="">
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