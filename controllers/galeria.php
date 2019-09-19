<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if($_SESSION['usuario_registrado']==null)
{
    header("Location:".constant('URL')."login");
}
class Galeria extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function render(){
		$this->view->render('viewgaleria');
	}

}
?>