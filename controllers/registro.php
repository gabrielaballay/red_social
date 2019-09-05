<?php
class Registro extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->mensaje="Hubo un error en la solicitud o no existe la pàgina";
	}
	
	function render(){
		$this->view->render('viewregistro');
	}	
}
?>