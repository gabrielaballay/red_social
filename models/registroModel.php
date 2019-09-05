<?php
class RegistroModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registrarUsuario($user){
		try{
			$cone=$this->db->conect();
			$pas_cif=password_hash($user->getPassword(),PASSWORD_DEFAULT);
			$usua=$user->getNick_name();
			$fecha=$user->getFecha_alta();
			$est=$user->getEstado();
			$nom=$user->getNombre();
			$ape=$user->getApellido();
			$sex=$user->getSexo();
			$correo=$user->getCorreo();
			$tel=$user->getTelefono();
			$imga=$user->getImagen_perfil();
			$sql="INSERT INTO usuario (nick_name,password,fecha_alta,estado,nombre,apellido,sexo,mail,telefono,imagen_perfil)
			 VALUES (?,?,?,?,?,?,?,?,?,?)";	
			$resultado=$cone->prepare($sql);
			$resultado->bindParam(1, $usua);
			$resultado->bindParam(2, $pas_cif);
			$resultado->bindParam(3, $fecha);
			$resultado->bindParam(4, $est);
			$resultado->bindParam(5, $nom);
			$resultado->bindParam(6, $ape);
			$resultado->bindParam(7, $sex);
			$resultado->bindParam(8, $correo);
			$resultado->bindParam(9, $tel);
			$resultado->bindParam(10, $imga);
			$resultado->execute();
			$resultado->closeCursor();
			$resultado=null;
			$cone=null;
			return true;
		}catch(PDOException $e){
			return false;
		}
	}

	public function validarUsuario($user){
		$cone=$this->db->conect();
		$sql="SELECT verifiUsuario('$user') as nick_name";
		$resultado=$cone->prepare($sql);
		$resultado->execute(array());
		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
		$con=$registro['nick_name'];
		$resultado->closeCursor();
		$resultado=null;
		$cone=null;
		return $con;
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