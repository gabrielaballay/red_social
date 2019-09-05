<?php
session_start();
class Main extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->mensaje="";
		$this->view->id_p=0;
	}
	function render(){
		$this->view->render('index');
	}
	
	function denuncia(){
		echo "<p>Denuncia</p>".$_SESSION['usuario_registrado']->id_usuario;
		echo $_POST['invisible'];
		echo $_POST['denunciar'];
	}

	function comentar(){
		if($_POST['comen_post']!=""){
			$texto=$_POST['comen_post'];
			$id_post=$_POST['id_p'];
			$id=$_SESSION['usuario_registrado']->id_usuario;
			if($this->model->cargarComentario($texto,$id_post,$id)){
				$this->view->mensaje="";
			}else{
				$this->view->mensaje="Error al cargar comentario";
				$this->view->id_p=$id_post;
			}
		}else{
			$this->view->mensaje="Error al cargar comentario";
			$this->view->id_p=$_POST['id_p'];
		}
		$this->render();
	}

	function eliminarComentario(){
		if($this->model->quitarComentario($_GET['id_comen'])){
			$this->render();	
		}else{
			$this->view->mensaje="Error al eliminar comentario";
			$this->view->id_p=$_GET['id_comen'];
			$this->render();	
		}
	}
}
?>