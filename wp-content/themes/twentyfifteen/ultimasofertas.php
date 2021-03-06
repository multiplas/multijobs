<?php
/*
Template Name: ultimas_ofertas
*/

get_header(); ?>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  </style>

    <?php include 'conexion.php';?>
    
<script>
// window.onscroll = function() {myFunction()};

// function myFunction() {
//     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//         document.getElementById("myP").className = "test";
//     } else {
//         document.getElementById("myP").className = "";
//     }
// }
// </script>
    <script>
        var tiempo = 30;
        var tiempo_real = 100;
        var contador = 0;
            function activaciclo(){
              document.getElementById("ciclo").disabled = false;
            }

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
                <li><a class="perfil" href="<php echo home_url(); ?>"><i class="glyphicon glyphicon-lock"></i> Bienvenido <?php echo $_SESSION['usuario']; ?></a>|</li>
                <li><a class="perfil" href="<php echo home_url(); ?>/perfil.php"><i class="glyphicon glyphicon-user"></i> Mi perfil</a>|</li>
                <li><a class="cerrarsesion" href="<php echo home_url(); ?>cerrarsesion.php"><i class="glyphicon glyphicon-off"></i> Cerrar Sesión</a></li>
            </ul>
        </div>
</nav>

<nav class="navbar navbar-default barra_segunda">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" onclick="cambiarClase();" aria-expanded="false">
        <i id="cambiar" class="icono_way glyphicon glyphicon-chevron-left"></i>
      </button> <a class="navbar-brand" href="ultimasofertas.php"> <img id="imagen_pagina" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/logodef-xs.png" alt="multijobs"></a>
    </div>
    <div class="collapse navbar-collapse espaciada" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right navegacion-derecha">
           <li class="bordeado"><a href="#">Últimas ofertas</a></li>
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

<!-- Carrousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="dimensionada" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/c1.jpg" alt="Chania">
    </div>

    <div class="item">
      <img class="dimensionada" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/c3.jpg" alt="Chania">
    </div>

    <div class="item">
      <img class="dimensionada" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/c2.jpg" alt="Flower">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- Carrousel -->
<?php 
  if(isset($_SESSION['registro'])){
    if ($_SESSION['registro']==1) {
      echo '<div id="satisfactorio" class="alert alert-success">Registro completado con éxito </div>';
      unset($_SESSION['registro']);
    }
  }
?>
  <div class="main container">
   <h1 class="page-heading3 title_font">Ofertas</h1>
    <div class="row">
      
      <div class="filtro col-md-3">
        <h4>Búsqueda por título</h4>
        <div class="input-group ">
            <span class="input-group-btn">
              <button id="boton_busqueda" class="btn btn-default" type="button">Buscar</button>
            </span>
            <input type="text" class="form-control" maxlength="15" id="bus" name="busca" onkeyup="activarBusca()" />
         </div>
        <br />
        <br />
        <h4>Búsqueda por filtro</h4>
        <form id="form_filtro" class="box4" action="<?php echo $current_url; ?>" method="post"  enctype="multipart/form-data">
        <div class="form-group col-md-12">
          <label for="provincia">Provincia</label>
          <select name="provincia" class="is_required validate account_input form-control" onchange="muestralocalidad()">
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
          <select name="localidad" class="is_required validate account_input form-control" disabled>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label for="sector">Sector</label>
          <select name="sector" class="is_required validate account_input form-control" onchange="activaciclo()">
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
        <div class="form-group col-md-12">
          <label for="ciclo">Ciclo</label>
          <select name="ciclo[]" id="ciclo" class="is_required validate account_input form-control" onchange="muestrafp()">
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
        <div class="form-group col-md-12">
          <label for="fp">fp</label>
          <select name="fp[]" class="is_required validate account_input form-control" disabled >
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
                <input class="button btn btn-primary button-medium title_font" type="button" value="Limpiar filtro" onclick="location.href = '<?php echo $current_url; ?>'">
              </div>         
          </p>
          </div>
       </form>

      </div>
      <div class="col-md-9">
        <div id="datos_ajax" class="col-md-12"></div>
        <div id="datos" class="col-md-12"> 
        <?php       
            $consulta_alumnos = "SELECT * FROM `anuncios`";
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
                else $consulta_localizacion .= " WHERE localidad = ".$_POST['localidad']."";
               } 
               if((isset($_POST['sector']))&&(!empty($_POST['sector']))){
                if(isset($consulta_localizacion)){
                  $consulta_localizacion .= " AND sector = ".$_POST['sector']."";
                }
                else $consulta_localizacion = " WHERE sector = ".$_POST['sector']."";
               }

               if((isset($_POST['ciclo']))&&(!empty($_POST['ciclo'][0]))){
                  if(isset($consulta_localizacion)) $consulta_localizacion .= " AND ciclo = ".$_POST['ciclo'][0]." ";
                  else $consulta_localizacion = " WHERE ciclo = ".$_POST['ciclo'][0]." ";
               }

               if((isset($_POST['fp']))&&(!empty($_POST['fp'][0]))){
                  if(isset($consulta_localizacion)) $consulta_localizacion .= " AND fp = ".$_POST['fp'][0]." ";
                  else $consulta_localizacion = " WHERE fp = ".$_POST['fp'][0]." ";
               }

               if(isset($consulta_localizacion)) $consulta1 = "SELECT * FROM `anuncios` $consulta_localizacion ORDER BY fecha DESC ";
              else $consulta1 = "SELECT * FROM `anuncios` ORDER BY fecha DESC LIMIT ".$inicio.",".$TAMANO_PAGINA;
               $result = mysqli_query($mysqli,$consulta1);
              $total_paginas = ceil($num_total_registros/$TAMANO_PAGINA);
           $cuenta=0;
           if(isset($consulta_localizacion)){
           if (mysqli_num_rows($result)<=0) {
          echo "Resultados de la búsqueda (0)";
            }
            else echo "Resultados de la búsqueda (".mysqli_num_rows($result).")";
          }
            while($fila=mysqli_fetch_assoc($result))
            {
              $cuenta++;
              $var1 = $fila['id_anuncio'];
              echo '<a href="destino.php?anuncio='.$var1.'"><div class="oferta col-md-12">

                <h2>'.$fila['titulo'].'</h2>
                <p>'.$fila['cuerpo'].'</p>
                <p>Salario: '.$fila['salario'].' €</p>
                <p>Fecha de publicación: '.$fila['fecha'].' </p>
                </div></a><img class="separador" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/n_separador.png" alt="separador">
                ';
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
                        echo '<li>  <a href="ultimasofertas.php?pagina='.$i.'">'.$i.'</a> </li> ';
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
<?php 
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

  <script src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>