<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if($_SESSION['usuario_registrado']==null)
{
    header("Location:".constant('URL')."login");
}

class Main extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->mensaje="";
		$this->view->id_p=0;
	}
	function render(){
		$this->view->render('index');
	}
	
	function denuncia($param){
		if($param[0]==1){
			echo "Vista index";
		}
		if ($param[0]=="2") {
			echo "Vista Usurio";
		}
		
		echo "<p>Denuncia</p>".$_SESSION['usuario_registrado']->id_usuario;
		echo "<br>";
		echo $_POST['invisible'];
		echo "<br>";
		echo $_POST['denunciar'];
	}

	function comentar($num){
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
		if($num[0]=="1"){
			$this->render();
		}
		if($num[0]=="2"){
			$this->view->render('viewusuario');
		}	
	}

	function eliminarComentario($num){
		if($this->model->quitarComentario($_GET['id_comen'])){
			$this->view->mensaje="";
		}else{
			$this->view->mensaje="Error al eliminar comentario";
			$this->view->id_p=$_GET['id_comen'];
		}
		if($num[0]=="1"){
			$this->render();
		}
		if($num[0]=="2"){
			$this->view->render('viewusuario');
		}
	}
}
?>