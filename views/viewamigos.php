<?php require_once 'header.php';?>
<main class="container">
	
	<div class="row">
		<?php include_once 'nav.php'; ?>
		<div class="col">
			<div class="row boton_menu"><!---- Fila del boton menu ---->
					<div class="col">
						<a href="#" class="btn-menu d-none d-md-none d-flex justify-content-between" id="btn-menu">
							<span>Menu</span>
							<i class="icon-menu"></i>
						</a>
					</div>
			</div>
			<div class="row text-center">
				<div class="col">
					<p>Amigos</p>
				</div>	
			</div>
		<?php 
			$amigos=$this->amigos;
			foreach ($amigos as $ami ) {
				if($ami->id_usuario!=$_SESSION['usuario_registrado']->id_usuario){
		?>
					<div class="publicacion_amigos row">
						<div class="foto col-auto">
							<a href="<?php echo constant('URL').'usuario/buscarUser/'.$ami->id_usuario;?>">
								<img src="<?php echo constant('URL').'public/imageusuarios/'.$ami->imagen_perfil;?>">
							</a>
						</div>
						<div class="col">
							<div class="post">
								<a href="<?php echo constant('URL').'usuario/buscarUser/'.$ami->id_usuario;?>" class="nombre">
								<?php echo $ami->nombre.' '.$ami->apellido;?></a>	
							</div>
						</div>
						<div class="col">
							<button class="btn btn-danger btn-sm ">Eliminar</button>
						</div>
					</div>
				
		<?php 	} 
			} 
		?>
			
		</div>
		<!--PUBLICIDAD-->
		<?php include_once ('nav-publicidad.php');?>
	</div>					
</main>
	
<script src="<?php echo constant('URL')?>public/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo constant('URL')?>public/js/menu.js"></script>
<script src="<?php echo constant('URL')?>public/js/bootstrap.min.js"></script>
