<?php
session_start();
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
		$this->view->user=$this->model->devuelveUser($id);
		$this->render();
	}

}
?>