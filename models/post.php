<?php

class Post{
	private $id_post;
	private $titulo;
	private $texto_post;
	private $fecha;
	private $estado;
	private $palabra1;
	private $palabra2;
	private $palabra3;
	private $imagen1;
	private $imagen2;
	private $imagen3;
	private $adjunto;
	private $id_usuario;

	public function __construct(){
	}
	
	public function __destruct(){
	}

	public function getId_post(){
		return $this->id_post;
	}
	public function setId_post($id_post){
		$this->id_post=$id_post;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function setTitulo($titulo){
		$this->titulo=$titulo;
	}
	public function getTexto_post(){
		return $this->texto_post;
	}
	public function setTexto_post($texto_post){
		$this->texto_post=$texto_post;
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
	public function getPalabra1(){
		return $this->palabra1;
	}
	public function setPalabra1($palabra1){
		$this->palabra1=$palabra1;
	}
	public function getPalabra2(){
		return $this->palabra2;
	}
	public function setPalabra2($palabra2){
		$this->palabra2=$palabra2;
	}
	public function getPalabra3(){
		return $this->palabra3;
	}
	public function setPalabra3($palabra3){
		$this->palabra3=$palabra3;
	}
	public function getImagen1(){
		return $this->imagen1;
	}
	public function setImagen1($imagen1){
		$this->imagen1=$imagen1;
	}
	public function getImagen2(){
		return $this->imagen2;
	}
	public function setImagen2($imagen2){
		$this->imagen2=$imagen2;
	}
	public function getImagen3(){
		return $this->imagen3;
	}
	public function setImagen3($imagen3){
		$this->imagen3=$imagen3;
	}
	public function getAdjunto(){
		return $this->adjunto;
	}
	public function setAdjunto($adjunto){
		$this->adjunto=$adjunto;
	}
	public function getId_usuario(){
		return $this->id_usuario;
	}
	public function setId_usuario($id_usuario){
		$this->id_usuario=$id_usuario;
	}
}

?>