<?php 
include_once 'header.php';
include_once 'models/amigosModel.php';
include_once 'models/posteoModel.php';
include_once 'models/mainModel.php';
$usuario=$_SESSION['usuario_registrado'];
$user=$usuario->id_usuario;
?>

<main class="container">
	<div class="row">
	
		<?php include_once 'nav.php'; ?>
		
		<div class="col contenido-principal">

			<div class="publicar">
				<div class="row boton_menu"><!---- Fila del boton menu ---->
					<div class="col">
						<a href="#" class="btn-menu d-none d-md-none d-flex justify-content-between" id="btn-menu">
							<span>Menu</span>
							<i class="icon-menu"></i>
						</a>
					</div>
				</div>
		
		<?php
		$verUser=$_SESSION['user_1'];
		
		if($user==$verUser->id_usuario){ ?>
		
			<div class="row justify-content-center">
				<div class="foto col-12 col-sm-auto d-flex justify-content-center">
					<a href="">
						<img src="<?php echo constant('URL').'public/imageusuarios/'.$usuario->imagen_perfil;?>" alt="Imagen usuario">
					</a>
				</div>
				<!-- Publicar Post -->
					<div class="col">
						<form action="<?php echo constant('URL') ?>/posteo/postear" method="post" enctype="multipart/form-data">
							<input type="text" name="titulo" placeholder="Titulo" class="titulo">
							<textarea name="mensaje" id="" placeholder="Publicar Mensaje"></textarea>
							<input type="text" name="palabra1" class="input" placeholder="Palabra clave 1">
							<input type="text" name="palabra2" class="input" placeholder="Palabra clave 2">
							<input type="text" name="palabra3" class="input" placeholder="Palabra clave 3">
							<div class="contenedor-botones d-flex justify-content-between">
								<div class="media">
									<div class="btn-imagen">
										<i class="icon-picture"></i>
										<input type="file" name="imagenes" id="imagen" accept="image/*" multiple onchange="controla()">
									</div>
									<div class="btn-arc">
										<i class="icon-upload"></i>
										<input type="file" name="arc" id="arc" onchange="con()">
									</div>
									<span id="info"></span>
									<span id="info2"></span>
								</div>
								<div>
									<button type="submit" class="btn btn-success btn-lg">Publicar</button>
								</div>
							</div>
						</form>
					</div>
			</div>
	<?php } ?>
		</div>
		
		<!-- Post Publicados -->
		<?php
				
			$postData=new PosteoModel();
			$comm=new MainModel();
			$comm=$comm->leerComentario();
			$posts=$postData->leerPost();

			//----------- CARGAR LOS POST-------------------
			foreach($posts as $post){
				if($verUser->id_usuario==$post->id_usuario){//controla que los post solo sean del usuario
			?>
			
			<div class="publicacion_amigos media row">
				<div class="foto col-12 col-sm-auto d-flex justify-content-center">
					<a href="">
						<img src="<?php echo constant('URL').'public/imageusuarios/'.$verUser->imagen_perfil;?>" class="d-flex align-self-start mr-3">
					</a>
				</div>
				
				<div class="post media-body col-12 col-sm-auto">
					<a href="" class="nombre"><p><?php echo $verUser->nombre." ".$verUser->apellido;?></p></a>
					<p class="d-flex justify-content-between">
					<span class="mt-0">Titulo: <?php echo " ".$post->titulo;?></span>
					<span class='fechapost'><?php echo $post->fecha;?></span>
					<p>
					<p><?php echo $post->texto_post;?></p>
					<div class="imagenes-usuarios">
					<?php if($post->imagen1!=null){ ?>
						<div class="imagen1">
						<a href="" data-toggle="modal" data-target="#modal">
							<img src="<?php echo constant('URL').'public/imageusuarios/'.$post->imagen1;?>"  class="img-fluid imagen">
						</a>
						</div>
					<?php } if ($post->imagen2!=null){ ?>
						<div class="imagen2">
						<a href="" data-toggle="modal" data-target="#modal">
							<img src="<?php echo constant('URL').'public/imageusuarios/'.$post->imagen2;?>" class="img-fluid imagen">
						</a>
						</div>
					<?php } if($post->imagen3!=null){ ?>
						<div class="imagen3">
						<a href="" data-toggle="modal" data-target="#modal">
							<img src="<?php echo constant('URL').'public/imageusuarios/'.$post->imagen3;?>"  class="img-fluid imagen">
						</a>
						</div>
					<?php }?>
					</div>
					<hr>
					<div class="col">
						<div class="contenedor-botones d-flex justify-content-between">
							<div class="ico-post media">
								<a onclick="mostrarVentana2(<?php echo $post->id_post?>)" title="Comentar"><i class="icon-comment"></i></a>
								<?php
								if($verUser->id_usuario!=$user){ ?>
								<a onclick="mostrar2(<?php echo $post->id_post?>)" title="Denunciar"><i class="icon-attention-circled"></i></a>
							<?php } ?>
							</div>
						</div>
					</div>
					<hr>
					<!-- Comentarios de los post -->
					<?php
					foreach ($comm as $coRegis){
										
						if($coRegis->id_post==$post->id_post && $coRegis->estado){
					?>
					<small class="d-flex justify-content-center" style="color:#40B72C">Comentrio</small>
						<div class="comentario media">
							<?php
							//NO OLVIDAR
							if($this->id_p==$coRegis->id_post && $this->mensaje!=""){
								echo "<p>".$this->mensaje."</p>";
							}
							$cp=$postData->leerUser($coRegis->id_usuario);
							
							?>
							<img src="<?php echo constant('URL').'public/imageusuarios/'.$cp[0]->imagen_perfil;?>" alt="" width="64" height="64" class="foto d-flex align-self-start mr-3">
						
							<div class="media-body">
								<a href="<?php echo constant('URL').'usuario/buscarUser/'.$cp[0]->id_usuario;?>" class="nombre"><p><?php echo $cp[0]->nombre." ".$cp[0]->apellido;?></p></a>
								<p class='fechapost'><?php echo $coRegis->fecha;?></p>
								<p><?php echo $coRegis->texto_comentario?></p>
								<hr>
								<?php
								if($user==$coRegis->id_usuario){
									echo "<a href='".constant('URL')."main/eliminarComentario/2?id_comen=".$coRegis->id_comentario."'><i class='icon-trash' style='color:red' title='Eliminar Comentario'></i></a><hr>";
								}	?>
							</div>
						</div>
				<?php 	} 
					} ?>

				</div>
			</div>
			<?php	}
				}
		?>
		</div><!--FIN DIV CONTENIDO PRINCIPAL-->
		
		<div class="datos-usuario col-3 d-none d-lg-block">
			<h3>Tados Personales</h3>
			<div class="ads">
				<img src="<?php echo constant('URL').'public/imageusuarios/'.$verUser->imagen_perfil;?>">
				<p>Nombre y Apellido: <?php echo $verUser->nombre." ".$verUser->apellido; ?></p>
				<p>Nick: <?php echo $verUser->nick_name; ?></p>
				<p>Sexo: <?php echo $verUser->sexo; ?></p>
				<p>Mail: <?php echo $verUser->mail; ?>
			</div>
			<footer>
				<a href="#">Privacidad</a>
				<a href="#">Condiciones</a>
				<a href="#">Publicidad</a>
				<p class="copyrigth">Red Social</p>
			</footer>
		</div>
	</div>
</main>

<!-- Ventana para la denuncia-->
<div class="contenedor">
    <div class="denuncia">
    	<span style="color:#363FF3;">Denuncia</span>
    	<form name="f4" action="<?php echo constant('URL')?>main/denuncia/2" method="post">
    	<label>Palabras Ofensivas
		<input type='radio' name='denunciar' value='Palabras Ofensivas' checked="true"></label><br>
		<label>Imagenes Obsenas
		<input type='radio' name='denunciar' value='Imagenes Obsenas'></label><br>
		<label>Publicidad
		<input type='radio' name='denunciar' value='Publicidad'></label><br>
		<input type="hidden" id="invisible" name="invisible">	
		<input type='submit' name='aceptar' value="Aceptar" class='btn btn-danger'>
		&nbsp;&nbsp;
		<input type='button' name='cancelar' value='Cancelar' class='btn btn-warning' id='cancelDenun'>
		</form>
	</div>
</div>

<!-- Ventana de Comentario-->
<div class="contenedor_comentario">
    <div class="ventana_comentario">
    	<form name="f3" action="<?php echo constant('URL')?>main/comentar/2" method="post">
	    	<textarea name="comen_post" placeholder="Comentario"></textarea><br>	
	    	<input type="hidden" name="idpost">
			<input type='submit' name='comentar' value='Comentar' class='btn btn-sm btn-success'>
			<input type='hidden' name='id_p'>
			&nbsp;&nbsp;
			<input type='button' name='cancel' value='Cancel' class='btn btn-sm btn-warning' id='cancelcom'>
		</form>
	</div>
</div>
<!-- Visor de Imagenes -->
<div class="modal fade" id="modal">
	<div class="modal-dialog d-flex justify-content-center align-items-center">
		<div class="modal-content">
			<img src="" id="imagen-modal" alt="">
		</div>
	</div>
</div>

<script src="<?php echo constant('URL')?>public/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo constant('URL')?>public/js/menu.js"></script>
<script src="<?php echo constant('URL')?>public/js/bootstrap.min.js"></script>
<script src="<?php echo constant('URL')?>public/js/controlaimagen.js"></script>
<script>

var post;
var html=document.getElementsByTagName("html")[0];
var body=document.getElementsByTagName("body")[0];

//muestra la denuncias ademas recuperar el id de post denunciado
function mostrar2(id_post){
	document.f4.invisible.value=id_post;
	body.style.overflow="hidden";//deshabilita la barra scroll
	$(".contenedor").css("visibility","visible");
	$(".denuncia").css("visibility","visible");
	
}
	
//esconde la denuncia	
$("#cancelDenun").click(function(){
	body.style.overflow="visible";//hace visible la sacrollbar
	$(".contenedor").css("visibility","hidden");
	$(".denuncia").css("visibility","hidden");
})


//muestra la ventana de comentario
function mostrarVentana2(id){
	document.f3.id_p.value=id;
	body.style.overflow="hidden";//deshabilita la barra scroll
	$(".contenedor_comentario").css("visibility","visible");
	$(".ventana_comentario").css("visibility","visible");
	
}
	
//esconde la ventana de comentario	
$("#cancelcom").click(function(){
	body.style.overflow="visible";//hace visible la sacrollbar
	$(".contenedor_comentario").css("visibility","hidden");
	$(".ventana_comentario").css("visibility","hidden");
})

</script>
</body>
</html>