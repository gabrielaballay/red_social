<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/bootstrap.css">
<style>
		.marco{
			border:1px solid #0033FF;
			width:50%;
			background-color:#CCC;
			margin:auto;
			padding:10px;
			border-radius:15px;
			box-shadow:10px 10px 10px #333333;
		}
		input{
			width:80%;
		}
		td{
			padding:10px;
			position:relative;
		}
		#derecha{
			text-align:right;
			padding:5px;
		}
		#center{
			text-align:center;
		}
</style>
    
</head>
<body>
<section>
    <div class="container">
    <h3 style="text-align:center; color:#6C0;">Formulario de Registro</h3>
        <form action="<?php echo constant('URL'); ?>registro/registrarUsuario" method="post" autocomplete="off" class="marco" id="center" enctype="multipart/form-data">
        <?php
            if($this->mensaje!=""){
                $errores=$this->mensaje;
                //$er=$this->err;
        		//$len=count($errores);
                if($len>0){
                    echo "<div style='font-size:10px; color:red'>";
                    for($i=0;$i<$len;$i++){
                        echo $errores[$i]."<br>";
                    }
                        echo "</div>";
                }
            }
		?>
        	<table>
            <tr>
            <td id="derecha"><label for="nombre">Nombre</label></td>
            <td id="center">
            <input type="text" name="nombre" id="nombre" style="border:1px solid <?php echo $er[0];?>" value="<?php if(isset($_POST['registrar'])){echo $_POST['nombre'];} ?>"></td>
            </tr>
            <tr>
            <td id="derecha"><label for="apellido">Apellido</label></td>
            <td id="center"><input type="text" name="apellido" id="apellido" style="border:1px solid <?php echo $er[1];?>" value="<?php if(isset($_POST['registrar'])){echo $_POST['apellido'];}?>" >
            </tr>
            <tr>
            <td id="derecha"><label for="sexo">Sexo</label></td>
            <td style="text-align:start; left:35px;"><select name="sexo">
            	<option value="masculino" style="size:200px">Masculino</option>
                <option value="femenino">Femenino</option>
            </select></td>
            </tr>
            <tr>
            <td id="derecha"><label for="mail">Mail</label></td>
            <td id="center"><input type="email" name="mail" id="mail" style="border:1px solid <?php echo $er[2];?>" value="<?php if(isset($_POST['registrar'])){echo $_POST['mail'];}?>"></td>
            </tr>
            <tr>
            <td id="derecha"><label for="telefono">Telefono</label></td>
            <td id="center"><input type="tel" name="telefono" id="telefono" style="border:1px solid <?php echo $er[3];?>" value="<?php if(isset($_POST['registrar'])){echo $_POST['telefono'];}?>"></td>
            </tr>
            <tr>
            <td id="derecha"><label for="usuario">Nombre Usuario</label></td>
            <td id="center"><input type="text" name="usuario" id="usuario" style="border:1px solid <?php echo $er[4];?>" value="<?php if(isset($_POST['registrar'])){echo $_POST['usuario'];}?>"></td>
            </tr>
            <tr>
            <td id="derecha"><label for="pass">Contraseña</label></td>
            <td id="center"><input type="password" name="pass" id="pass" style="border:1px solid <?php echo $er[5];?>" value="<?php if(isset($_POST['registrar'])){echo $_POST['pass'];}?>"></td>
            </tr>
            <tr>            
            <td id="derecha">
            <label for="foto">Foto de Perfil</label></td>
            <td id="center"><input type="file" name="foto" id="foto" accept="image/*"></td>
            </tr>
            </table>
            <button type="submit" name="registrar" class="btn-outline-primary">Registrar</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo constant('URL'); ?>login"><button type="button" name="cancelar" class="btn-outline-secondary" style="margin-left:30px;">Cancelar</button></a>
        </form>
    </div>
</section>
<script src="../JS/jquery-3.4.1.min.js"></script>
<script src="../JS/bootstrap.js"></script>
</body>
</html>
