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

    function enviarmensaje($destinatario,$remitente,$cuerpo){
      $consulta = "INSERT INTO `mensajes`(`idmensaje`, `destinatario`, `remitente`, `cuerpo`, `fecha`, `leido`) VALUES (null,'$destinatario','$remitente','$cuerpo',NOW(),1)";
      $inserta=mysqli_query(conectar(),$consulta);
        echo $consulta;
        mysqli_close(conectar());       
        //Si devuelve resultados, es usuario
        if($inserta){
            $_SESSION['mensaje_enviado']=1;
            header("Location: enviarmensaje.php");
            exit;
        }
        //Si no los devuelve, no es usuario
        else{
          $_SESSION['mensaje_enviado']=0;
            header("Location: enviarmensaje.php");
            exit;
        }
    }


    $destinatario = $_POST['destinatario'];
    $remitente = $_POST['remitente'];
    $cuerpo = $_POST['cuerpo'];

    echo $destinatario,$remitente,$cuerpo;
    enviarmensaje($destinatario,$remitente,$cuerpo);
    ?>
    </section>
</body>
</html>