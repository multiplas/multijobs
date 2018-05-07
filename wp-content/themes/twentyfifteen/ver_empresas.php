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
  <script src="js/busqueda2.js"></script>
    <script src="js/localidades.js"></script>
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


        function activarBarra(){

            if (typeof myVar != 'undefined') {
            tiempo = 30;
            tiempo_real = 100;
            contador = 0;
              clear(myVar);
            }
           barra = document.getElementById("barra-progreso");
           barra.style.visibility = "visible";
           myVar = setInterval(   
           function(){
            if(contador==3){
            progeso = document.getElementById("progreso");
            progeso.style.width = tiempo_real +"%";
            progreso.innerHTML = "Tiempo restante para elegir campeón: " +tiempo +"s";
            tiempo--;
            contador = 0;
            }
            tiempo_real--;
            contador++;
            if(tiempo<=0){
                clear(myVar);
                barra.style.visibility = "hidden";
            }
           }, 300);
           
           }
    </script>
    <?php      session_start(); ?>
</head>
<?php if (isset($_SESSION['usuario'])){?>
<body>
<?php if(isset($_SESSION['usuario'])){ ?>

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
   <h1 class="page-heading3 title_font">Empresas registradas</h1>
    <div class="row">
      <div class="filtro col-md-3">
        <h4>Búsqueda por nombre</h4>
        <div class="input-group ">
            <span class="input-group-btn">
              <button id="boton_busqueda" class="btn btn-default" type="button">Buscar</button>
            </span>
            <input type="text" class="form-control" maxlength="15" id="bus" name="busca" onkeyup="activarBusca()" />
         </div>
        <br />
        <br />
        <h4>Búsqueda por filtro</h4>
        <form id="form_filtro" class="box4" action="ver_empresas-page" method="post"  enctype="multipart/form-data" onsubmit="return enviar();">
        <div class="form-group col-md-12">
          <label for="provincia">Provincia</label>
          <select name="provincia" class="is_required validate account_input form-control" onchange="muestralocalidad()" >
            <option value=""> -- Elegir provincia -- </option>
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
        <div class="form-group col-md-12">
          <label for="localidad">Localidad</label>
          <select name="localidad" class="is_required validate account_input form-control" disabled >
          </select>
        </div>
        <div class="form-group col-md-12">
          <label for="sector">Sector</label>
          <select name="sector" class="is_required validate account_input form-control" >
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
            <br>
            <div class="form-group col-md-12">
            <p class="submit">
              <div class="col-xs-12">
                <button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium title_font">
                  <span>
                    <i class="fa fa-search"></i>
                    Búsqueda
                  </span>
                </button>
              </div>  
              <div class="col-xs-12">
                <input class="button btn btn-primary button-medium title_font" type="button" value="Limpiar filtro" onclick="location.href = 'ver_empresas-page'">
              </div>       
          </p>
          </div>
       </form>

      </div>
      <div class="col-md-9">
        <div id="datos_ajax" class="col-md-12"></div>
        <div id="datos" class="col-md-12"> 
        <?php       
            $consulta_alumnos = "SELECT * FROM `empresa`";
            $resultado = mysqli_query($mysqli,$consulta_alumnos);
            $num_total_registros = mysqli_num_rows($resultado);
            $TAMANO_PAGINA = 9;
            if(isset($_GET['pagina'])){
              $pagina = $_GET['pagina'];
               $inicio = ($pagina-1) * $TAMANO_PAGINA;
            }
            
            else{
              $inicio = 0;
              $pagina = 1;
               }

               if((isset($_POST['provincia']))&&(!empty($_POST['provincia']))) $consulta_localizacion = " WHERE provincia = ".$_POST['provincia']."";
               if((isset($_POST['localidad']))&&(!empty($_POST['localidad']))){
                if(isset($consulta_localizacion)){
                  $consulta_localizacion .= " AND localidad = ".$_POST['localidad']."";
                }
                else $consulta_localizacion = " WHERE localidad = ".$_POST['localidad']."";
               } 
               if((isset($_POST['sector']))&&(!empty($_POST['sector']))){
                if(isset($consulta_localizacion)){
                  $consulta_localizacion .= " AND sector = ".$_POST['sector']."";
                }
                else $consulta_localizacion = " WHERE sector = ".$_POST['sector']."";
               } 

               if(isset($consulta_localizacion)) $consulta1 = "SELECT * FROM `empresa` $consulta_localizacion ORDER BY nombre ";
               else $consulta1 = "SELECT * FROM `empresa` ORDER BY nombre LIMIT ".$inicio.",".$TAMANO_PAGINA;
                $result = mysqli_query($mysqli,$consulta1);
                $total_paginas = ceil($num_total_registros/$TAMANO_PAGINA);
                $cuenta=0;

                if(isset($consulta_localizacion)){
           if (mysqli_num_rows($result)<=0) {
          echo "Resultados de la búsqueda (0)";
            }
            else echo "<div class='col-md-12'>Resultados de la búsqueda (".mysqli_num_rows($result).")</div>";
          }
            while($fila=mysqli_fetch_assoc($result))
            {
              $cuenta++;
              $var1 = $fila['idempresa'];
              echo '<a href="entidad.php?entidad='.$var1.'"><div class="ver_alumno col-sm-6 col-md-4">
                <img src="'.$fila["logo"].'" class="img_perfil" width="100%" height="220"/>
                <h4>'.$fila['nombre'].'</h4>
                <p>'.$fila['breve_descripcion'].'</p>
              </div></a>';
            }
            if(isset($consulta_localizacion)){}
            else{
            echo "<div class='col-xs-12'>";
            echo "<ul class='pagination'>";
            if ($total_paginas > 1) {
                  for ($i=1;$i<=$total_paginas;$i++) {
                    if($pagina == $i){
                      echo "<li class='disabled'><a href=#>".$i."</a>";
                    }
                    else
                        echo '<li>  <a href="ver_empresas-page?pagina='.$i.'">'.$i.'</a> </li> ';
                  }
            }
            echo "</ul>";
            echo "</div>";
          }
        ?>
        </div>
      </div>
    </div>
    

</div>
<?php }
else {
  header("Location: index.php");
  exit;
}
}//if isset usuario
else{
  echo "<br/>Para ver el contenido del sitio previamente debe haber iniciado sesión. Si se trata de un error, por favor, consulte con el administrador del sitio: javierdiazrego@hotmail.com<br/><a href='index.php'>Volver al índice</a><br/>";
}
?>

  <footer class="">
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