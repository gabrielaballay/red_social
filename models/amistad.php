<?php 
class Amistad{
	private $id_usuario_en;
	private $id_usuario_re;
	private $estado;
	private $fecha;
		
	public function __construct(){
	}
		
	public function __destruct(){
	}
		
	public function getId_usuario_en(){
		return $this->id_usuario_en;
	}
	public function setId_usuario_en($id_usuario_en){
		$this->id_usuario_en=$id_usuario_en;
	}
	public function getId_usuario_re(){
		return $this->id_usuario_re;
	}
	public function setId_usuario_re($id_usuario_re){
		$this->id_usuario_re=$id_usuario_re;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function setEstado($estado){
		$this->estado=$estado;
	}
	public function getFecha(){
		return $this->fecha;
	}
	public function setFecha($fecha){
		$this->fecha=$fecha;
	}
} 
?>