<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if($_SESSION['usuario_registrado']==null)
{
    header("Location:".constant('URL')."login");
}

require_once 'models/post.php';

class Posteo extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->mensaje="";
		$this->view->id_p=0;
	}
	
	function render(){
		$this->view->render('index');
	}

	function comentarMio(){
		if($_POST['textoComen']!=""){
			$main=new MainModel();
			$texto=$_POST['textoComen'];
			$id_post=$_POST['id_p'];
			$id=$_SESSION['usuario_registrado']->id_usuario;
			if($main->cargarComentario($texto,$id_post,$id)){
				$this->render();
			}else{
				$this->view->mensaje="Error al cargar comentario";
				$this->view->id_p=$id_post;
				$this->render();
			}
		}else{
			$this->view->mensaje="Error al cargar comentario";
			$this->view->id_p=$_POST['id_p'];
			$this->render();
		}
	}

	function eliminarComentario(){
		$main=new MainModel();
		if($main->quitarComentario($_GET['id_comen'])){
			$this->render();	
		}else{
			$this->view->mensaje="Error al eliminar comentario";
			$this->view->id_p=$_GET['id_comen'];
			$this->render();	
		}
	}

	function postear($num){
		$estado=true;
		$fecha=date('Y/m/d');
		$pst=new Post();
		$pst->setEstado($estado);
		$pst->setFecha($fecha);
		$pst->setId_usuario($_SESSION['usuario_registrado']->id_usuario);
		$pst->setTexto_post($_POST['mensaje']);
		$pst->setTitulo($_POST['titulo']);
		$pst->setPalabra1($_POST['palabra1']);
		$pst->setPalabra2($_POST['palabra2']);
		$pst->setPalabra3($_POST['palabra3']);
		$user=$_SESSION['usuario_registrado']->nombre;
		$iduse=$_SESSION['usuario_registrado']->id_usuario;

		if($_POST['titulo']!=""){//Control de tipo y tamaño de imagenes

			$name_array[] = $_FILES["imagenes"]["name"];//Array con nombre de las imagenes subidas
	    	$tmp_name_array[] = $_FILES['imagenes']['tmp_name'];//archivo tempral
	    	$type_array[] = $_FILES["imagenes"]["type"];//Tipos de imagenes
	    	$size_array[] = $_FILES["imagenes"]["size"];//tamaño de las imagenes

	    	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			$limite_kb = 16384;
			//Creo un array unidimensinal a partir del array bidimensional que me devuelve $_FILES
			for($i=0; $i< sizeof($type_array);$i++){
				$tipos=implode(array($type_array[0][$i]));//Array de tipos 
				$tam=implode(array($size_array[0][$i]));//array de tamaños
				if($tam[$i] <= $limite_kb * 1024){//Control de tamaño de las imagenes
					if($num=="1"){
						$this->view->mensaje="Imagenes demasiado grandes no debe exceder ".($limite_kb * 1024)." Kilobytes";
						$this->render();//Si el tamaño excede el limite lo rederizo al index
					}
				}
			}
			
		 	if (in_array($tipos, $permitidos)){
		 		$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/redmascotas/public/imageusuarios/'.$iduse."-".$user."/";
    			if(sizeof($tmp_name_array[0])>0){
					$imagen1=implode(array($name_array[0][0]));
					$ruta1=implode(array($tmp_name_array[0][0]));
					if (!file_exists($carpeta_destino)) {
				    	mkdir($carpeta_destino, 0777, true);
					}
					move_uploaded_file($ruta1,$carpeta_destino.$imagen1);
					$pst->setImagen1($imagen1);
				}
				
				if(sizeof($tmp_name_array[0])>1){
					$imagen2=implode(array($name_array[0][1]));
					$ruta2=implode(array($tmp_name_array[0][1]));
					move_uploaded_file($ruta2,$carpeta_destino.$imagen2);
					$pst->setImagen2($imagen2);
				}
				
				if(sizeof($tmp_name_array[0])>2){
					$imagen3=implode(array($name_array[0][2]));
					$ruta3=implode(array($tmp_name_array[0][2]));
					move_uploaded_file($ruta3,$carpeta_destino.$imagen3);
					$pst->setImagen3($imagen3);
				}
				
				$adjunto=$_FILES['arc']['name'];
				$rutaAdjunto=$_FILES['arc']['tmp_name'];
				move_uploaded_file($rutaAdjunto,$carpeta_destino.$adjunto);
				
				$pst->setAdjunto($adjunto);
				
				if(!$this->model->cargarPost($pst)){
					if($num=="1"){
						$this->view->mensaje="archivo no permitido, asegurese que sean jpg/jpeg/gif/png";
						$this->render();//Si el tipo es incorrecto lo re dirijo al index
					}
				}else{
					if($num=="1"){
						$this->render();
					}
			    }
		 		
		 	}else{
		 		if($num=="1"){
					$this->view->mensaje="archivo no permitido, asegurese que sean jpg/jpeg/gif/png";
					$this->render();//Si el tipo es incorrecto lo re dirijo al index
				}
		 	}
	    	
		}
	}
}
?>