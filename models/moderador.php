<?php
require_once("usuario.php");

class Moderador extends Usuario{

	private $admin_alta;
		
	public function __construct(){
		parent::__construct();
	}		
	
	public function getAdmin_alta(){
		return $this->admin_alta;
	}
	public function setAdmin_alta($admin_alta){
		$this->admin_alta=$admin_alta;
	}

}

?>