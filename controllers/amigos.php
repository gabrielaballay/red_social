<?php
session_start();
class Amigos extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->amigos=array();
	}
	
	function render(){
		$this->view->amigos=$this->model->amigosAceptados($_SESSION['usuario_registrado']->id_usuario);
		$this->view->render('viewamigos');
	}

}
?>