<!DOCTYPE html>
<html lang="es">
<head>
  <title>MULTIJOBS</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/multijobs.css"/>
  <link rel="shortcut icon" href="img/iconoalternativo.png" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  </style>
    <?php include 'conexion.php';?>
    <script>
        var tiempo = 30;
        var tiempo_real = 100;
        var contador = 0;
 
            function cambiarClase()
            {
              if ($('#cambiar').hasClass('glyphicon-chevron-left')){
                $('#cambiar').addClass('glyphicon-chevron-down');
                $('#cambiar').removeClass('glyphicon-chevron-left');
              }
              else {
                $('#cambiar').addClass('glyphicon-chevron-left');
                $('#cambiar').removeClass('glyphicon-chevron-down');

              }
            }

    </script>
    <?php      session_start(); ?>
</head>
<body>
<?php if(isset($_SESSION['usuario'])){ ?>
  <!-- <div class="header">
    <div class="pftopline wpf-transition-all">
            <div class="pf-container">
          <div class="pf-row">
            <div class="col-lg-12 col-md-12">
              <div class="wpf-toplinewrapper">
                <div class="pf-toplinks-left col-md-12">
                <ul class="navegacion-izquierda">
                  <li ><a href="https://www.facebook.com/"><i class="fa fa-3x fa-fw fa-facebook text-inverse icono"></i></a></li>
                  <li ><a href="https://twitter.com/"><i class="fa fa-3x fa-fw fa-twitter text-inverse icono"></i></a></li>
                  <li ><a href="https://plus.google.com/"><i class="fa fa-3x fa-fw fa-google text-inverse icono"></i></a></li>
                  <li ><a href="https://www.instagram.com/"><i class="fa fa-3x fa-fw fa-instagram text-inverse icono"></i></a></li>                   
                  <li class="pf-sociallinks-item pf-infolinks-item envelope  wpf-transition-all">
                    <a href="tel://+34650685146"><i class="pfadmicon-glyph-765"></i> <span class="pf-infolink-item-text">+34 650 685 146</span></a>
                  </li>
                  <div class="col-md-4"></div>
                  <li class="pf-sociallinks-item pf-infolinks-item pflast envelope  wpf-transition-all">
                    <a href="mailto:multiplas72@gmail.com"><i class="pfadmicon-glyph-823"></i><span class="pf-infolink-item-text">multiplas72@gmail.com</span></a>
                  </li>
                </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
  </div> -->

<nav role="navigation" class="navbar navbar-default barra_primera">
        <div class="navbar-header">
          <ul class="navegacion-izquierda">
                  <li class="facebook"><a href="https://www.facebook.com/"><i class="fa fa-3x fa-fw fa-facebook text-inverse icono"></i></a></li>
                  <li class="twitter"><a href="https://twitter.com/"><i class="fa fa-3x fa-fw fa-twitter text-inverse icono"></i></a></li>
                  <li class="google"><a href="https://plus.google.com/"><i class="fa fa-3x fa-fw fa-google text-inverse icono"></i></a></li>
                  <li class="instagram"><a href="https://www.instagram.com/"><i class="fa fa-3x fa-fw fa-instagram text-inverse icono"></i></a></li>                   
                  <li class="pf-sociallinks-item pf-infolinks-item envelope  wpf-transition-all">
                    <a href="tel://+34650685146"><i class="pfadmicon-glyph-765"></i> <span class="pf-infolink-item-text">+34 650 685 146</span></a>
                </ul>
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle personalizado1">
                <!-- <span class="sr-only">Toggle navigation</span> -->
                <i class="icono_way glyphicon glyphicon-user"></i>
            </button>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navegacion-derecha">
                <li><a class="perfil" href="#"><i class="glyphicon glyphicon-lock"></i> Bienvenido <?php echo $_SESSION['usuario']; ?></a>|</li>
                <li><a class="perfil" href="perfil.php"><i class="glyphicon glyphicon-user"></i> Mi perfil</a>|</li>
                <li><a class="cerrarsesion" href="cerrarsesion.php"><i class="glyphicon glyphicon-off"></i> Cerrar Sesión</a></li>
            </ul>
        </div>
</nav>

<nav class="navbar navbar-default barra_segunda">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" onclick="cambiarClase();" aria-expanded="false">
        <i id="cambiar" class="icono_way glyphicon glyphicon-chevron-left"></i>
      </button> <a class="navbar-brand" href="ultimasofertas.php"> <img id="imagen_pagina" src="img/logodef-xs.png" alt="multijobs"></a>
    </div>
    <div class="collapse navbar-collapse espaciada" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right navegacion-derecha">
           <li class="bordeado"><a href="ultimasofertas.php">Últimas ofertas</a></li>
          <li class="bordeado"><a href="ver-alumnos">Alumnos</a></li>
          <li class="bordeado"><a href="ver_empresas-page">Empresas</a></li>
          <li class="bordeado"><a href="contacto.php">Contacto</a></li>
          <?php if(isset($_SESSION['id_empresa'])){ ?>
          <li><a id="boton_oferta" class="btn btn-primary " href="insertar_anuncio.php">Añadir oferta de empleo</a></li>
          <?php } ?>
      </ul>
  </div><!-- /.container-fluid -->
</nav>

<!-- fin navegacion -->


  <div class="main container">
   <h1 class="page-heading3 title_font">Modificar anuncio</h1>
    <div class="row">
      <div class="col-md-12">
        <?php 

          if(isset($_POST['nuevo_cuerpo'])){
            $sql = "UPDATE anuncios SET cuerpo='".$_POST['nuevo_cuerpo']."', titulo = '".$_POST['titulo']."' WHERE id_anuncio=".$_POST['idanuncio2']." ";
            if ($mysqli->query($sql) === TRUE) {
                echo "Anuncio actualizado correctamente";
            } else {
                echo "Error actualizando el anuncio: " . $mysqli->error;
            }

            $mysqli->close();
             echo '<br><a href="destino.php?anuncio='.$_POST['idanuncio2'].'">Volver al anuncio</a>';
              }

            else{
        ?>
        
        <?php 
        $consulta = "SELECT * from anuncios WHERE id_anuncio = ".$_POST['idanuncio']." ";
        $result = mysqli_query($mysqli,$consulta);
        while($fila=mysqli_fetch_assoc($result)){
          echo ' <form action="modificaranuncio.php" method="post">
                   <input type="hidden" name="idanuncio2" value="'.$_POST['idanuncio'].'">
                   Establecer un nuevo titulo: <input class="form-control" type="text" name="titulo" id="titulo" value="'.$fila['titulo'].'"><br>
                   Establecer una nueva descripción: <textarea id="cuerpo" name="nuevo_cuerpo" class="form-control" rows="3" max-length="1000">'.$fila['cuerpo'].'</textarea>
                   <br><div class="col-md-5"><input class="btn btn-default" type="submit" value="Actualizar"></div>
                   <br><div class="col-md-5"><a class="btn btn-primary" href="destino.php?anuncio='.$_POST['idanuncio'].'">Volver al anuncio</a></div>
              </form>   
            ';
        }
          }
        ?>

      </div>
    </div>

</div>
<?php 
}//if isset usuario
else{
  echo "<br/>Para ver el contenido del sitio previamente debe haber iniciado sesión. Si se trata de un error, por favor, consulte con el administrador del sitio: javierdiazrego@hotmail.com<br/><a href='index.php'>Volver al índice</a><br/>";
}
?>

  <footer class="wpf-footer">
  <div class="pf-container">
    <div class="pf-row clearfix">
    <div class="wpf-footer-text col-lg-6">
      © Copyright 2016 | <a href="http://www.multijobs.es">multijobs</a> | <a href="http://www..com">Diseño Web</a>
    </div>
    <div class="col-lg-3"></div>
    <div class="col-lg-3">
      <ul class="pf-footer-menu  pfrightside"><li id="menu-item-753" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-753"><a href="http://www.multijobs.es/terminos-condiciones/">Términos y Condiciones</a></li>
        <li id="menu-item-605" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-605"><a href="http://www.multijobs.es/aviso-legal-y-privacidad/">Aviso Legal y Privacidad</a></li>
      </ul> 
    </div>    
    </div>
  </div>            
  </footer>
  <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>