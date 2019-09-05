<?php
class UsuarioModel extends Model{
	
	public function __construct(){
		parent::__construct();
		$this->id_p="";
	}

	function devuelveUser($id){
		$cone=$this->db->conect();
		$sql="SELECT * FROM usuario WHERE id_usuario=?;";
		$resultado=$cone->prepare($sql);
		$resultado->execute(array($id));
		$registro=$resultado->fetch(PDO::FETCH_OBJ);
		$resultado->closeCursor();
		$resultado=null;
		$cone=null;
		return $registro;
		
	}
}
?>