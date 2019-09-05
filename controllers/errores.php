<?php
class Errores extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->mensaje="Hubo un error en la solicitud o no existe la pàgina";
		$this->view->render('viewerror');
			
	}
	
}

?>