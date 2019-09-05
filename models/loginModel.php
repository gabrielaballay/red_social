<?php

class LoginModel extends Model{
	
	function __construct(){
		parent::__construct();
	}

	public function buscarUser($correo){
		$cone=$this->db->conect();
		$sql="SELECT * FROM usuario WHERE mail=?;";
		$resultado=$cone->prepare($sql);
		$resultado->execute(array($correo));
		$registro=$resultado->fetch(PDO::FETCH_OBJ);
		$resultado->closeCursor();
		$resultado=null;
		$cone=null;
		return $registro;
	}

}

?>