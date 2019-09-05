<?php
session_start();
class Galeria extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function render(){
		$this->view->render('viewgaleria');
	}

}
?>