<?php
session_start();
require_once 'models/mainModel.php';

class Posteo extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->mensaje="";
		$this->view->id_p=0;
	}
	
	function render(){
		$this->view->render('viewposteo');
	}

	function comentarMio(){
		if($_POST['textoComen']!=""){
			$main=new MainModel();
			$texto=$_POST['textoComen'];
			$id_post=$_POST['id_p'];
			$id=$_SESSION['usuario_registrado']->id_usuario;
			if($main->cargarComentario($texto,$id_post,$id)){
				$this->render();
			}else{
				$this->view->mensaje="Error al cargar comentario";
				$this->view->id_p=$id_post;
				$this->render();
			}
		}else{
			$this->view->mensaje="Error al cargar comentario";
			$this->view->id_p=$_POST['id_p'];
			$this->render();
		}
	}

	function eliminarComentario(){
		$main=new MainModel();
		if($main->quitarComentario($_GET['id_comen'])){
			$this->render();	
		}else{
			$this->view->mensaje="Error al eliminar comentario";
			$this->view->id_p=$_GET['id_comen'];
			$this->render();	
		}
	}

	function postear(){
		echo "<h1>Seguro de Postear esto</h1>";
		echo $_POST['titulo'];
		echo $_POST['mensaje'];
		echo $_POST['palabra1'];
		echo $_POST['palabra2'];
		echo $_POST['palabra3'];
		
	}
}
?>