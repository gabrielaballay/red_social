<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if($_SESSION['usuario_registrado']==null)
{
    header("Location:".constant('URL')."login");
}
class Usuario extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->user=array();
		$this->view->mensaje="";
		$this->view->id_p=0;
	}
	
	function render(){
		$this->view->render('viewusuario');
	}

	function buscarUser($param=null){
		$id=$param[0];
		$_SESSION['user_1']=$this->model->devuelveUser($id);
		$this->render();
	}
}
?>