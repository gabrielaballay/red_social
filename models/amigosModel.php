<?php
class AmigosModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function solicitudes($id){
		$cone=$this->db->conect();
		$arrayU=array();
		$sql="call mostrarSolicitud(?);";
		$resultado=$cone->prepare($sql);
		$resultado->execute(array($id));
		while($registro=$resultado->fetch(PDO::FETCH_OBJ)){
			$arrayU[]=$registro;
		}
		$resultado->closeCursor();
		$resultado=null;
		$cone=null;
		return $arrayU;
	}
	
	public function amigosAceptados($id){
		$cone=$this->db->conect();
		$arrayU=array();
		$sql="call amigos(?);";
		$resultado=$cone->prepare($sql);
		$resultado->execute(array($id));
		while($registro=$resultado->fetch(PDO::FETCH_OBJ)){
			$arrayU[]=$registro;
		}
		$resultado->closeCursor();
		$resultado=null;
		$cone=null;
		return $arrayU;
	}

	public function aceptarSolicitud($id1,$id2){
		try{
			$cone=$this->db->conect();
			$sql="call aceptarAmistad(".$id1.",".$id2.");";
			$resultado=$cone->prepare($sql);
			$resultado->execute();
			$resultado->closeCursor();
			$resultado=null;
			$cone=null;
			return true;
		}catch(PDOException $e){
			return false;
		}
		
	}
	
	public function eliminarSolicitud($id1,$id2){
		try{
			$cone=$this->db->conect();
			$sql="call eliminarAmistad(".$id1.",".$id2.");";
			$resultado=$cone->prepare($sql);
			$resultado->execute();
			$resultado->closeCursor();
			$resultado=null;
			$cone=null;
			return true;
		}catch(PDOException $e){
			return false;
		}	
	}
}

?>