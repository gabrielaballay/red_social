var post;
var html=document.getElementsByTagName("html")[0];
var body=document.getElementsByTagName("body")[0];


$(function () {
	var boton=$('#btn-menu');
	var fondo_enlace=$('#fondo_enlace');

	boton.on('click',function(e){
		fondo_enlace.toggleClass('active');
		$('#barra-lateral-izquierda').toggleClass('active');
		$('#barra-lateral-izquierda').css("z-index","1200")
		e.preventDefault();
	})

	fondo_enlace.on('click',function(e){
		fondo_enlace.toggleClass('active');
		$('#barra-lateral-izquierda').toggleClass('active');
		$('#barra-lateral-izquierda').css("z-index","200")
		e.preventDefault();
	})
}())


//muestra la denuncias ademas recuperar el id de post denunciado
function mostrar(id_post){
	document.f1.invisible.value=id_post;
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
function mostrarVentana(id){
	document.f2.id_p.value=id;
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

$(function(){
	$('.imagenes-usuarios .imagen1').on('click',function(){
		$('#modal').modal;
		var ruta_imagen=($(this).find('img').attr('src'));
		$('#imagen-modal').attr('src',ruta_imagen);
	});
	$('#modal').on('click',function(){
		$('#modal').modal('hide');
	})
})

$(function(){
	$('.imagenes-usuarios .imagen2').on('click',function(){
		$('#modal').modal;
		var ruta_imagen=($(this).find('img').attr('src'));
		$('#imagen-modal').attr('src',ruta_imagen);
	});
	$('#modal').on('click',function(){
		$('#modal').modal('hide');
	})
})

$(function(){
	$('.imagenes-usuarios .imagen3').on('click',function(){
		$('#modal').modal;
		var ruta_imagen=($(this).find('img').attr('src'));
		$('#imagen-modal').attr('src',ruta_imagen);
	});
	$('#modal').on('click',function(){
		$('#modal').modal('hide');
	})
})

