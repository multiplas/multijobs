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
    //echo "numero de usuarios" . numerousuarios();
    function registraAnuncio($titulo,$horario,$horas_mensuales,$cuerpo,$localidad,$provincia,$salario,$tipo_contrato,$sector,$ciclo,$fp)
    {
        $consulta="INSERT INTO `anuncios`(`titulo`, `cuerpo`, `salario`, `n_horas`, `horario`, `tipo_contrato`, `fecha`, `id_empresa`, `localidad`, `provincia`, `sector`, `ciclo`, `fp`) VALUES ('$titulo','$cuerpo','$salario','$horas_mensuales','$horario','$tipo_contrato',NOW(),".$_SESSION['id_empresa'].",'$localidad','$provincia','".$sector[0]."','".$ciclo[0]."','".$fp[0]."')";
        $inserta=mysqli_query(conectar(),$consulta);
        mysqli_close(conectar());      
        //Si devuelve resultados, es usuario
        if($inserta){
            $_SESSION['anuncio_insertado']=1;
            header("Location: insertar_anuncio.php");
            exit;
        }
        //Si no los devuelve, no es usuario
        else{

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
    $titulo = $_POST['titulo'];
    $horario = $_POST['horario'];
    $horas_mensuales = $_POST['horas_mensuales'];
    $cuerpo = $_POST['cuerpo'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $salario = $_POST['salario'];
    $tipo_contrato = $_POST['tipo_contrato'];
    $sector = $_POST['sector'];
    $ciclo = $_POST['ciclo'];
    $fp = $_POST['fp'];
       
    registraAnuncio($titulo,$horario,$horas_mensuales,$cuerpo,$localidad,$provincia,$salario,$tipo_contrato,$sector,$ciclo,$fp);
    ?>
    </section>
</body>
</html>