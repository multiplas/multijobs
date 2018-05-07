<!DOCTYPE html>
<head>
<title>Inicio sesión - Alumno</title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/multijobs.css"/>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<link rel="shortcut icon" href="imagenes/icono.png" />
<?php include 'conexion.php';
session_start();
?>
</head>
<body>
  	<section class="main container contenedor">
    <?php
    //////////////COMPROBAR SI ES UN USUARIO//////////////////////
    function esUsuario($email,$password)
    {
    $consulta='SELECT * FROM empresa WHERE email ="'.$email.'" AND clave="'.$password.'"';
    $resultado = mysqli_query(conectar(),$consulta);
    while ($fila=mysqli_fetch_assoc($resultado)) {
        $_SESSION['id_empresa']=$fila['idempresa'];
    }
    echo $consulta;
    if(mysqli_num_rows($resultado)>0)
        return TRUE;
    //Si no los devuelve, no es usuario
    else
        return FALSE;
    }
    
    ///////////////SI ES USUARIO/////////////////////
    $salt = '$jdr$/';
    $s_salt = md5($salt . $_POST['contra']);  
    if(esUsuario($_POST['email'],$s_salt))
    {
        $_SESSION['valida']='true';
        $_SESSION['usuario']=$_POST['email'];
        $_SESSION['sw'] = 1;
        $_SESSION['inicio-correcto']=true;
        header("Location: ultimasofertas.php");
        exit;
    }
 
    else
    { 
        $_SESSION['sw'] = 1;
        echo "Nombre o contraseña de usuario incorrecto." . "<br/><a href='formulario.php'>Volver al formulario</a>" . 
        "<br/><a href='registro2.php'>Registrarse</a>";
        $_SESSION['inicio-correcto']=false;
        header("Location: empresas-page");
        exit;
        echo $_POST['contra'];
        echo $s_salt;
    }
   
    
    ?>

    </section>
</body>
</html>