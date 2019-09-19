<?php
class Registro extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function render(){
		$this->view->render('viewregistro');
	}

	function registrarUsuario(){
		$nombre="";
		$apellido="";
		$sexo="";
		$mail="";
		$tel="";
		$user="";
		$pass="";
		$errores=array();
		$error="";

		if(isset($_POST['registrar'])){
			
			if(isset($_POST['nombre'])){
				$nombre=$_POST['nombre'];
				if(!(preg_match("/^[a-zA-Z]{3,20}$/", $nombre))){
					$errores[]="Debe ingresar un nombre valido";
					$er1="red";
				}
			}
			
			if(isset($_POST['apellido'])){
				$apellido=$_POST['apellido'];
				if(!(preg_match("/^[a-zA-Z]{3,20}$/", $apellido))){
					$errores[]="Debe ingresar un apellido valido";
					$er2="red";
				}
			}
			
			$mail=$_POST['mail'];
			$vMail=preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/',$mail);
			if($vMail!=1){
				$errores[]="Debe ingresar un mail valido";
				$er3="red";
			}
			
			$tel=$_POST['telefono'];
			if($tel!=""){
				$esto2=preg_match('/^[0-9]{10}$/', $tel);
				if($esto2!=1){
					$errores[]="Debe ingresar un Telefono valido";
					$er4="red";
				}
			}
			
			if(isset($_POST['pass'])){
				$pass=$_POST['pass'];
				if(!(preg_match("/^[A-z0-9]{3,20}$/", $pass))){
					$errores[]="Debe ingresar un password valido";
					$er6="red";
				}
			}
			
			if(isset($_POST['usuario'])){
				$user=$_POST['usuario'];
				if(!(preg_match("/^[a-zA-Z]{3,20}$/", $user))){
					$errores[]="Debe ingresar un nombre de usuario valido";
					$er5="red";
				}else{
					require_once "crud/usuarioData.php";
					$ud=new UsuarioData();
					$con=$ud->validarUser($user);
					if($con==1){
						$errores[]="El usuario ya existe, ingrese uno nuevo";
						$er5="red";
					}
				}
			}
				
			$cantErrores=count($errores);
			$fecha=date("Y/m/d");
			
			$nombre_imagen=$_FILES['foto']['name'];
			$tipo_imagen=$_FILES['foto']['type'];
			$tamagno_imagen=$_FILES['foto']['size'];
			// ruta de la carpeta donde se guardaran las imagenes
			$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/RED social/public/imageusuarios/';
			//Movemos la imagen de la carpeta temporal a la carpeta destino
			move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta_destino.$nombre_imagen);
			
			$foto=$nombre_imagen;
			
			if($cantErrores==0){
				require_once "crud/usuarioData.php";
				require_once "Modelo/usuario.php";
				$us=new Usuario($user,$pass,$fecha,true,$nombre,$apellido,$sexo,$mail,$tel,$foto);
				$userdata=new UsuarioData();
				$userdata->registrarUser($us);
			}
		}

	}
}
?>