<?php
class DataBase{
	private $host;
	private $db;
	private $user;
	private $password;
	private $charset;
	
	public function __construct(){
		$this->host=constant('HOST');
		$this->db=constant('DB');
		$this->user=constant('USER');
		$this->password=constant('PASS');
		$this->charset="utf8";
	}
	
	function conect(){
		try{
			$pdo=new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->user,$this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$pdo->exec('SET CHARACTER SET '.$this->charset);
			return $pdo;
		}catch(PDOExecption $e){
			print_r("Error de conexion".$e->getMessage());	
		}
	}
}
?>