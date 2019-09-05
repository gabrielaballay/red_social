<?php
class MainModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}


	function leerComentario(){
		$cone=$this->db->conect();
		$sql="SELECT * FROM comentario;";
		$resultado=$cone->prepare($sql);
		$resultado->execute();
		while ($registro=$resultado->fetch(PDO::FETCH_OBJ)){
			$arrayComen[]=$registro;
		}
		$resultado->closeCursor();
		$resultado=null;
		$cone=null;
		return $arrayComen;
	}

	function cargarComentario($texto,$id_post,$id){
		try{
			$fecha=date('Y/m/d');
			$estado=true;
			$cone=$this->db->conect();
			$sql="INSERT INTO comentario (texto_comentario,fecha,estado,id_post,id_usuario) VALUES (?,?,?,?,?);";
			$resultado=$cone->prepare($sql);
			$resultado->bindParam(1, $texto);
			$resultado->bindParam(2, $fecha);
			$resultado->bindParam(3, $estado);
			$resultado->bindParam(4, $id_post);
			$resultado->bindParam(5, $id);
			$resultado->execute();
			$resultado->closeCursor();
			$resultado=null;
			$cone=null;
			return true;
		}catch(PDOException $e){
			return false;
		}
	}

	function quitarComentario($id_comen){
		try{
			$cone=$this->db->conect();
			$sql="UPDATE comentario SET estado=false WHERE id_comentario=?";
			$resultado=$cone->prepare($sql);
			$resultado->execute(array($id_comen));
			return true;
		}catch(PDOException $e){
			return false;
		}
	}
}
?>