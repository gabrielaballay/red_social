<?php
class Comentario{
	private $id_comentario;
	private $texto_comentario;
	private $fecha;
	private $estado;
	private $id_post;
	private $id_usuario;
	
	public function __construct(){
	}
	public function __destruct(){
	}
	
	public function getId_comentario(){
		return $this->id_comentario;
	}
	public function setId_comentario($id_comentario){
		$this->id_comentario=$id_comentario;
	}
	public function getTexto_comentario(){
		return $this->texto_comentario;
	}
	public function setTexto_comentario($texto_comentario){
		$this->texto_comentario=$texto_comentario;
	}
	public function getFecha(){
		return $this->fecha;
	}
	public function setFecha($fecha){
		$this->fecha=$fecha;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function setEstado($estado){
		$this->estado=$estado;
	}
	public function getId_post(){
		return $this->id_post;
	}
	public function setId_post($id_post){
		$this->id_post=$id_post;
	}
	public function getId_usuario(){
		return $this->id_usuario;
	}
	public function setId_usuario($id_usuario){
		$this->id_usuario=$id_usuario;
	}
}
?>