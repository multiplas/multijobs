<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>Registro</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="shortcut icon" href="imagenes/icono.jpg" />
    <link rel="stylesheet" href="css/multijobs.css"/>
<?php include 'conexion.php';?>
</head>
<body>
    <section class="main container contenedor">
    <?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    $urlcurr = "";
    $destino = "";
    //echo "numero de usuarios" . numerousuarios();
    // bloque para insertar la imagen

function limpia_espacios($cadena){
  $cadena = str_replace(' ', '', $cadena);
  return $cadena;
}

    if ( is_uploaded_file($_FILES['archivo']['tmp_name']) )
    {
       echo 'El archivo se ha subido con éxito';

       if( $_FILES['archivo']['size']<(512*1024) )
       {
           echo 'El archivo no sobrepasa el tamaño máximo: 512KB';

            if(( $_FILES['archivo']['type']=='image/jpeg')||($_FILES['archivo']['type']=='image/png'))
            {
                 echo 'La extensión JPEG está permitida';
                 $rand = rand(1000,999999);
                 $origen = $_FILES['archivo']['tmp_name'];
                 $mezclado = $rand.$_FILES['archivo']['name'];
                 $destino = 'uploads/'.$mezclado;
                 $destino = limpia_espacios($destino);
                 move_uploaded_file($origen, $destino);
            }
            else{
            $_SESSION['registro']=0;
            header("Location: registro_alumno");
            exit;
            }
       }
       else{
            $_SESSION['registro']=0;
            header("Location: registro_alumno");
            exit;
       }
    }

    function existeAlumno($mail){
      $alumno = "SELECT email from alumno";
      $existe_email = mysqli_query(conectar(),$alumno);
      while($consultados=mysqli_fetch_assoc($existe_email)){
        if($consultados['email']==$mail){
          $_SESSION['correcto']=0;
            header("Location: registro_empresa.php");
            exit;
        }
      }
    }



    function obtenerid(){
        $consultar_id = "SELECT idempresa FROM `empresa` WHERE email = '".$_SESSION['usuario']."'";
        $result2 = mysqli_query(conectar(),$consultar_id);
        while($fila1=mysqli_fetch_assoc($result2)){
            $encontrado = $fila1['idempresa'];  
        }
        return $encontrado;
    }

    function registraUsuario($nombre,$sector,$localidad,$provincia,$mail,$clave,$telefono,$destino,$descripcion,$breve_descripcion)
    {
        $existe=false;
        $buscado="SELECT email FROM `empresa`";
        if(isset($destino)) $consulta="INSERT INTO `empresa`(`nombre`, `sector`, `localidad`,`provincia`, `email`, `clave`, `n_telefono`, `logo`,`descripcion`,`breve_descripcion`) VALUES  ('".$nombre."','".$sector."','".$localidad."','".$provincia."','".$mail."','".$clave."','".$telefono."','".$destino."','".$descripcion."','".$breve_descripcion."')";
        else $consulta="INSERT INTO `empresa`(`nombre`, `sector`, `localidad`,`provincia`, `email`, `clave`, `n_telefono`, `logo`,`descripcion`,`breve_descripcion`) VALUES  ('".$nombre."','".$sector."','".$localidad."','".$provincia."','".$mail."','".$clave."','".$telefono."', 'uploads/defaultempresa.jpg' '".$descripcion."','".$breve_descripcion."')"; 
        $result = mysqli_query(conectar(),$buscado);
        echo $consulta;
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
        if(isset($inserta)){
            $_SESSION['valida']='true';
            $_SESSION['usuario']=$mail;
            $_SESSION['id_empresa']=obtenerid();
            $_SESSION['sw'] = 1;
            $_SESSION['inicio-correcto']=true;
            header("Location: ultimasofertas.php");
            exit;

        }
        //Si no los devuelve, no es usuario
        else
            {
                $_SESSION['correcto'] = 0;
                header("Location: registro_empresa.php");
                exit;
            }
        
         
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
    $sector = $_POST['sector'];
    $descripcion = $_POST['descripcion'];
    $breve_descripcion = $_POST['breve_descripcion'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $mail = $_POST['mail'];
    $clave = $_POST['pass'];
    $telefono = $_POST['telefono'];
    existeAlumno($mail);
    $salt = '$jdr$/';
    $s_salt = md5($salt . $clave);      
    registraUsuario($nombre,$sector,$localidad,$provincia,$mail,$s_salt,$telefono,$destino,$descripcion,$breve_descripcion);
    ?>
    </section>
</body>
</html>

