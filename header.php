
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Red Social</title>
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/fontello.css">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estilos.css">
</head>
<body>
<header>
	<?php $usuario=$_SESSION['usuario_registrado']; ?>
	<div class="container">
		<div class="row justify-content-start">
			<div class="col-2 col-sm-1 col-md-auto order-last order-sm-0 logo">
				<a href="<?php echo constant('URL')?>main"><img src="<?php echo constant('URL')?>public/imagenes/logo2.png" title="Inicio"></a>
			</div>
			<div class="col-10 col-sm-8 col-lg-6 order-last order-sm-0 buscar">
				<form action="">
					<div class="row no-gutters align-items-center">
						<div class="columna col-10">
							<input type="text" name="" id="" placeholder="Amigos, lugares y cosas que te gustan">
						</div>
						<div class="columna col-2">
							<button><i class="icon-search"></i></button>
						</div>
					</div>
				</form>
			</div>
			<nav class="col-12 col-sm-3 col-lg-2 menu d-flex justify-content-between ml-auto">
				<a href="<?php echo constant('URL')?>amigos"><i class="icon-users"></i></a>
				<a href=""><i class="icon-bell-alt"></i></a>
				<a href=""><i class="icon-chat"></i></a>
				<a href="<?php echo constant('URL').'usuario/buscarUser/'.$usuario->id_usuario;?>" class="imagen"><img src="<?php echo constant('URL').'public/imageusuarios/'.$usuario->imagen_perfil;?>" width="30" height="30" title="Mi Perfil"></a>
			</nav>
		</div>
	</div>
</header>
