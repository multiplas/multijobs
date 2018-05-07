<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <title>Registro</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
  <link rel="shortcut icon" href="imagenes/icono.jpg" />
    <link rel="stylesheet" href="css/estilos.css"/>
    <?php include 'conexion.php';?>
</head>
<body>
<header>
		<!-- Barra de navegacion -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand">VersusLoL</a>
				</div>
		<!-- Inicia Menu de navegacion -->
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Portada</a></li>
						<?php
                        session_start();
                        if (isset($_SESSION['usuario']))
                        {
                            echo "<li><a href='cerrarsesion.php'>Cerrar Sesión</a></li>";
                            echo "<li class='active'><a href='mains.php'>Introducir Mains</a></li>";
                        } 
                        else echo "<li><a href='formulario.php'>Iniciar Sesion/Registrarse</a></li>";
                        ?>
						<li><a href="contacta.php">Contacta</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

   <section class="main container contenedor">
    <?php
    header('Content-Type: text/html; charset=UTF-8');  
    //echo "numero de usuarios" . numerousuarios();
    function registraUsuario($nombre,$apellidos,$dni,$mail,$nota,$localidad,$provincia,$clave)
    {

        $existe=false;
        $buscado="SELECT email FROM `alumno`";
        $consulta="INSERT INTO `alumno`(`nombre`, `apellidos`, `notamedia`, `email`, `clave`, `localidad`, `provincia`, `DNI`,`mostrar`) VALUES ('".$nombre."','".$apellidos."','".$nota."','".$mail."','".$clave."','".$localidad."','".$provincia."','".$dni."',0)";
        $result = mysqli_query(conectar(),$buscado);
        while($fila=mysqli_fetch_assoc($result)){
            if(($fila['email']==$mail))
            {
                $existe=true;
            }
        }
        if($existe==false){  
            $inserta=mysqli_query(conectar(),$consulta);
        }
        
        mysqli_close(conectar());
       
        //Si devuelve resultados, es usuario
        if(isset($inserta))
            echo "Usuario registrado. ". "<br/><a href='index.php'>Por favor, inicia sesión.</a>";
        //Si no los devuelve, no es usuario
        else
            echo "Usuario no registrado. ". "Puede deberse a que el nombre de usuario ya exista. <br/><a href='registro_alumno'>Volver al formulario</a>";
        
         
    }
    //Creo la funcion numerousuarios para poder insertar nuevos usuarios automaticamente
    function numerousuarios()
    {
        $consulta2 = "SELECT count(id_usuario) FROM usuarios";
        $consultasalario = mysqli_query(conectar(),$consulta2);
        while($fila=mysqli_fetch_array($consultasalario))
        {
            $total = $fila[0]+1;
            
        }
        return $total;
    }
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $mail = $_POST['mail'];
    $nota = $_POST['nota'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $clave = $_POST['pass'];
    // $salt = '$jdr$/';
    // $s_salt = md5($salt . $contraseña);         
    echo $nombre,$apellidos,$dni,$mail,$nota,$localidad,$provincia,$clave;
    registraUsuario($nombre,$apellidos,$dni,$mail,$nota,$localidad,$provincia,$clave);
    ?>
    </section>

</body>
</html>