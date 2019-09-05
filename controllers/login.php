<?php
          
session_start();     

class Login extends Controller{
  
  function __construct(){
    parent::__construct();
    $this->view->mensaje="Hubo un error en la solicitud o no existe la pàgina";
  }
  
  function render(){
    $this->view->render('viewlogin');
  }

  function verificarUsuario(){
    if(isset($_POST['enviar'])){
  
      if($_POST['pass']!="" && $_POST['usuario']!=""){
        $login=$_POST['usuario'];
        $pas=$_POST['pass'];
       
        $log=$this->model->buscarUser($login);
        
        if(password_verify($pas,$log->password)){
          $_SESSION['usuario_registrado']=$log;
          header('location:../main');
          
        }else{
          $_SESSION['errores']="Ingrese usuario y contraseña";
          $this->view->mensaje="Usuario o Contraseña incorrectos";
          $this->render();
        }
      }
    }
  }

  function salir(){
    session_destroy();
    $this->render();
  }
}
?>