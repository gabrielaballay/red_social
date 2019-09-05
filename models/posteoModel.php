<?php
class PosteoModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}

	function leerPost(){
		$cone=$this->db->conect();
		$sql="SELECT * FROM post;";
		$resultado=$cone->prepare($sql);
		$resultado->execute();
		while ($registro=$resultado->fetch(PDO::FETCH_OBJ)){
			$arrayPost[]=$registro;
		}
		$resultado->closeCursor();
		$resultado=null;
		$cone=null;
		return $arrayPost;
	}

	function leerUser($id){
		$cone=$this->db->conect();
		$sql="SELECT * FROM usuario where id_usuario=?;";
		$resultado=$cone->prepare($sql);
		$resultado->execute(array($id));
		while ($registro=$resultado->fetch(PDO::FETCH_OBJ)){
			$arrayUser[]=$registro;
		}
		$resultado->closeCursor();
		$resultado=null;
		$cone=null;
		return $arrayUser;	
	}

}
?>