
<?php include 'conexion.php';?>
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

    if ( is_uploaded_file($_FILES['archivo2']['tmp_name']) )
    {
       echo 'El archivo se ha subido con éxito';

       if( $_FILES['archivo2']['size']<(512*1024) )
       {
           echo 'El archivo no sobrepasa el tamaño máximo: 512KB';
            if(($_FILES['archivo2']['type']=='application/pdf')||($_FILES['archivo2']['type']=='application/msword')||($_FILES['archivo2']['type']=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'))
            {
                 echo 'La extensión está permitida';
                 $rand2 = rand(1000,999999);
                 $origen2 = $_FILES['archivo2']['tmp_name'];
                 $mezclado2 = $rand2.$_FILES['archivo2']['name'];
                 $urlcurr = 'curriculum/'.$mezclado2;
                 $urlcurr = limpia_espacios($urlcurr);
                 move_uploaded_file($origen2, $urlcurr);
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

    function obtenerId($mail){
        $obtenerid = "SELECT `idalumno` FROM `alumno` WHERE `email` = '$mail'";
        $resultado_id =  mysqli_query(conectar(),$obtenerid);
        while($filaid=mysqli_fetch_assoc($resultado_id)){
            $id =$filaid['idalumno'];
        }
        return $id;
    }

    function existeEmpresa($mail){
      $empresa = "SELECT email from empresa";
      $existe_email = mysqli_query(conectar(),$empresa);
      while($consultados=mysqli_fetch_assoc($existe_email)){
        if($consultados['email']==$mail){
          $_SESSION['registro']=0;
            header("Location: registro_alumno");
            exit;
        }
      }
    }


    function registraUsuario($nombre,$apellidos,$dni,$mail,$nota,$localidad,$provincia,$s_salt,$ingles,$familia,$ciclo,$fp,$destino,$urlcurr,$fin,$edad)
    {

        $existe=false;
        $buscado="SELECT email FROM `alumno`";
        if(!empty($destino))
            if(!empty($urlcurr))$consulta="INSERT INTO `alumno`(`nombre`, `apellidos`, `notamedia`, `nivelingles`, `email`, `clave`, `localidad`, `provincia`, `DNI`, `edad`, `mostrar`,`imagen_perfil`,`curriculum`) VALUES ('".$nombre."','".$apellidos."','".$nota."','".$ingles."','".$mail."','".$s_salt."','".$localidad."','".$provincia."','".$dni."','".$edad."',0,'".$destino."','".$urlcurr."')";
            else $consulta="INSERT INTO `alumno`(`nombre`, `apellidos`, `notamedia`, `nivelingles`, `email`, `clave`, `localidad`, `provincia`, `DNI`, `edad`, `mostrar`,`imagen_perfil`,`curriculum`) VALUES ('".$nombre."','".$apellidos."','".$nota."','".$ingles."','".$mail."','".$s_salt."','".$localidad."','".$provincia."','".$dni."','".$edad."',0,'".$destino."',null)";
        else
            if(!empty($urlcurr))$consulta="INSERT INTO `alumno`(`nombre`, `apellidos`, `notamedia`, `nivelingles`, `email`, `clave`, `localidad`, `provincia`, `DNI`, `edad`, `mostrar`,`imagen_perfil`,`curriculum`) VALUES ('".$nombre."','".$apellidos."','".$nota."','".$ingles."','".$mail."','".$s_salt."','".$localidad."','".$provincia."','".$dni."','".$edad."',0,'uploads/default.jpg','".$urlcurr."')";
            else$consulta="INSERT INTO `alumno`(`nombre`, `apellidos`, `notamedia`, `nivelingles`, `email`, `clave`, `localidad`, `provincia`, `DNI`, `edad`, `mostrar`,`imagen_perfil`,`curriculum`) VALUES ('".$nombre."','".$apellidos."','".$nota."','".$ingles."','".$mail."','".$s_salt."','".$localidad."','".$provincia."','".$dni."','".$edad."',0,'uploads/default.jpg',null)";
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
        if($inserta){
            $id = obtenerId($mail);
            registraCiclo($id,$familia,$ciclo,$fp,$fin);
            $_SESSION['registro']=1;
            $_SESSION['alumno']=true;
            $_SESSION['valida']='true';
            $_SESSION['usuario']=$mail;
            $_SESSION['administrador']=false;
            $_SESSION['sw'] = 1;
            $_SESSION['inicio-correcto']=true;
            header("Location: ultimasofertas.php");
            exit;
        }

        //Si no los devuelve, no es usuario
        else{
            $_SESSION['registro']=0;
            header("Location: registro_alumno");
            exit;
        }
         
    }

    function registraciclo($id,$familia,$ciclo,$fp,$fin){
        for($i=0;$i<count($familia);$i++){
        $registrarciclo = "INSERT INTO `alumno_ciclo`(`idalumno`, `familia`, `ciclo`, `fp`,`fin_ciclo`) VALUES ($id,".$familia[$i].",".$ciclo[$i].",".$fp[$i].",".$fin[$i].")";
        mysqli_query(conectar(),$registrarciclo);
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
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $mail = $_POST['mail'];
    $nota = $_POST['nota'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $clave = $_POST['pass'];
    $ingles = $_POST['ingles'];
    $familia = $_POST['sector'];
    $ciclo = $_POST['ciclo'];
    $fp = $_POST['fp'];
    $fin = $_POST['fin'];
    $edad = $_POST['edad'];
    existeEmpresa($mail);
    $salt = '$jdr$/';
    $s_salt = md5($salt . $clave);         
    registraUsuario($nombre,$apellidos,$dni,$mail,$nota,$localidad,$provincia,$s_salt,$ingles,$familia,$ciclo,$fp,$destino,$urlcurr,$fin,$edad);

    ?>

