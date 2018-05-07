<!DOCTYPE html>
<html lang="es">
<head>
  <title>MULTIJOBS</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
  <link rel="stylesheet" href="css/multijobs.css"/>
  <link rel="shortcut icon" href="img/iconoalternativo.png" />
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <script src="js/localidades.js"></script>

<?php
header('Content-Type: text/html; charset=UTF-8');  
 include 'conexion.php';?>
 <?php      session_start(); ?>
</head>
<body>
  <div id="container">
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
      </button>
      <a class="navbar-brand" href="#"> <img id="imagen_pagina" src="img/logodef-xs.png" alt="multijobs"></a>
    </div>
    <div class="collapse navbar-collapse espaciada" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right navegacion-derecha">
           <li class="bordeado"><a href="ultimasofertas.php">Últimas ofertas</a></li>
          <li class="bordeado"><a href="ver-alumnos">Alumnos</a></li>
          <li class="bordeado"><a href="ver_empresas-page">Empresas</a></li>
          <li class="bordeado"><a href="contacto.php">Contacto</a></li>
          <li><a id="boton_oferta" class="btn btn-primary " href="insertar_anuncio.php">Añadir oferta de empleo</a></li>
      </ul>
  </div><!-- /.container-fluid -->
</nav>

<!-- fin navegacion -->
  <div class="main container">
    <div class="row">
      <h1 class="page-heading title_font">Insertar Oferta de Empleo</h1>
      <div class="form_content clearfix">
      <form id="form1" class="box3" action="valida_anuncio.php" method="post">
        <?php 
        if(isset($_SESSION['anuncio_insertado'])){
          if($_SESSION['anuncio_insertado']==1){
            echo '<div class="alert alert-success" role="alert">Anuncio insertado</div>';
            $_SESSION['anuncio_insertado']=0;
          }
        }
        ?>
        <div class="form-group">
            <label for="titulo">Título del anuncio *</label>
            <input class="is_required validate account_input form-control" type="text" id="titulo" maxlength="100" name="titulo" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>        
        <div class="form-group">
            <label for="horario">Horario *</label>
            <input class="is_required validate account_input form-control" type="text" id="horario" maxlength="100" name="horario" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="horas_mensuales">Nº de horas mensuales</label>
            <input class="is_required validate account_input form-control" type="text" id="horas_mensuales" maxlength="100" name="horas_mensuales" value="" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="tipo_contrato">Tipo de contrato *</label>
            <input class="is_required validate account_input form-control" type="text" id="tipo_contrato"  name="tipo_contrato" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="cuerpo">Descripción *</label>
            <textarea id="cuerpo" name="cuerpo" class="form-control" rows="3" max-length="1000" required></textarea>
        </div>
        <div class="form-group col-md-4">
          <label for="sector">Sector</label>
          <select name="sector[]" class="is_required validate account_input form-control" required>
            <option value=""> -- Seleccione un sector -- </option>
          <?php    
              $consulta = "SELECT * FROM familias ORDER BY nombre_familia";
              $result = mysqli_query($mysqli,$consulta);
              $cuenta=0;
              while($fila=mysqli_fetch_assoc($result))
              {
                echo "<option value=".$fila['id_familia'].">".$fila['nombre_familia']."</option>";
              }
            ?>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="ciclo">Ciclo</label>
          <select name="ciclo[]" class="is_required validate account_input form-control" onchange="muestrafp()" required>
            <option value=""> -- Seleccione un ciclo -- </option>
          <?php    
              $consulta = "SELECT * FROM ciclo ORDER BY nombre_ciclo";
              $result = mysqli_query($mysqli,$consulta);
              $cuenta=0;
              while($fila=mysqli_fetch_assoc($result))
              {
                echo "<option value=".$fila['idciclo'].">".$fila['nombre_ciclo']."</option>";
              }
            ?>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="fp">fp</label>
          <select name="fp[]" class="is_required validate account_input form-control" disabled required>
          </select>
        </div>
        <div class="form-group">
          <label for="provincia">Provincia</label>
          <select name="provincia" class="is_required validate account_input form-control" onchange="muestralocalidad()" required>
            <option value="0"> -- Elegir provincia -- </option>
          <?php    
              $consulta = "SELECT * FROM provincia ORDER BY nombre";
              $result = mysqli_query($mysqli,$consulta);
              $cuenta=0;
              while($fila=mysqli_fetch_assoc($result))
              {
                echo "<option value=".$fila['prov_id'].">".$fila['nombre']."</option>";
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="localidad">Localidad</label>
          <select name="localidad" class="is_required validate account_input form-control" disabled required>
          </select>
        </div>
        <div class="form-group">
            <label for="salario">Salario mensual *</label>
            <input class="is_required validate account_input form-control" type="number" id="salario" maxlength="100" name="salario" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
            <br>
            <p class="submit">
              <div class="col-md-5">
                <button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium title_font">
                  <span>
                    <i class="fa fa-inbox"></i>
                    Insertar Oferta!
                  </span>
                </button>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-5">
                <button type="button" class="button btn btn-default button-medium title_font" onclick="location.href = 'ultimasofertas.php'">
                  <span>
                    <i class="fa fa-arrow-left"></i>
                    Volver Atrás
                  </span>
                </button>
              </div>
          </p>
      </form>
      </div>
    </div>
  </div>
  <footer class="">
  <div class="pf-container">
    <div class="pf-row clearfix">
    <div class="wpf-footer-text col-lg-6">
      © Copyright 2016 | <a href="http://www.multijobs.es">multijobs</a> | <a href="http://www.prismaid.com">Diseño Web Prisma ID</a>
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
  </div>
  <script src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
