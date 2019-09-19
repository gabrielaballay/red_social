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

	public function cargarPost(Post $post){
		$con=$this->db->conect();
		try{
			$titulo=$post->getTitulo();
			$text=$post->getTexto_post();
			$fecha=date("Y/m/d");
			$estado=true;
			$p1=$post->getPalabra1();
			$p2=$post->getPalabra2();
			$p3=$post->getPalabra3();
			$img1=$post->getImagen1();
			$img2=$post->getImagen2();
			$img3=$post->getImagen3();
			$adj=$post->getAdjunto();
			$user=$post->getId_usuario();
			$sql="INSERT INTO post
			 (titulo,texto_post,fecha,estado,palabra1,palabra2,palabra3,imagen1,imagen2,imagen3,adjunto,id_usuario) 
			 VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
			$resultado=$con->prepare($sql);
			$resultado->bindParam(1, $titulo);
			$resultado->bindParam(2, $text);
			$resultado->bindParam(3, $fecha);
			$resultado->bindParam(4, $estado);
			$resultado->bindParam(5, $p1);
			$resultado->bindParam(6, $p2);
			$resultado->bindParam(7, $p3);
			$resultado->bindParam(8, $img1);
			$resultado->bindParam(9, $img2);
			$resultado->bindParam(10, $img3);
			$resultado->bindParam(11, $adj);
			$resultado->bindParam(12, $user);
			$resultado->execute();
			$resultado->closeCursor();
			$resultado=null;
			$con=null;
			return true;

		}catch(PDOException $e){
			return false;

		}
		
	}

}
?>