<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Pet Network</title>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/miStylo.css">
        
</head>

<body>
	<div id="titulo" class="container">
    	<h1 style="text-align:center">Pet Network</h1>
    </div>

	<div id="prueba" class="container">
        <div id="error" style="text-align: center; color: #F41111;"><?php 
        //session_start();
        if(isset($_SESSION['errores'])){
            echo $_SESSION['errores'];
        }
        ?>
        </div>
    	<div class="row justify-content-center">
    		<form action="<?php echo constant('URL')?>login/verificarUsuario" method="post">
    			<div class="form-group">
                    <label for="usuario">Email</label>
                    <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Ingrese email"
                     required>
                    
                    <small id="emailHelp" class="form-text text-muted">Correo electronico y password son obligatorios</small>
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                    <br>
                    <a href="registro">Registrarse...</a>
			     </div>
      			<button type="submit" class="btn btn-primary btn-block" name="enviar">Iniciar Sesión</button>
    		</form>
    	</div>
    </div>
    <script src="<?php echo constant('URL')?>public/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo constant('URL')?>public/js/bootstrap.js"></script>
</body>
</html>
