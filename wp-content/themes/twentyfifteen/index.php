<!DOCTYPE html>
<html lang="es">
<head>
<title>MULTIJOBS</title>
<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/css/bootstrap.min.css"/>
<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/bootstrap.min.js"/>
<script type="text/javascript" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/ajax.js"></script>
<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/css/index.css"/>
<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/css/multijobs.css"/>
<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/css/bootstrap2.css"/>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/iconoalternativo.png" />
<script>
  function redimensiona(){
      elementos = document.getElementById("sidebar");
      resultado = window.innerHeight;
      elementos.style.height = resultado +"px";
    }

    window.onload = redimensiona;

  var totaltiempo = 3;


  function ocultar(){
    totaltiempo--;

    if (totaltiempo==0){
      document.getElementById("inicio").style.display = "none";
    }
    setTimeout("ocultar()",1000);
  }


</script>
<?php 
session_start();
?>
</head>
<body>
<div class="cover hidden-xs hidden-sm">
  <div class="background-image-fixed cover-image"></div>
  <div id="sidebar" class="sidebar hidden-xs hidden-sm col-md-4">
    <div class="col-xs-2"></div>
    <img class="col-xs-8" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/logodef-xs.png" alt="multijobs-logo">
    <div class="col-xs-12 titulo">
      <h4>Cuando termines de estudiar</h4>
      <h4>¡Encuentra trabajo!</h4>
    </div>
      <div class="col-xs-12 texto">
        Página dedicada a estudiantes recién licenciados y a empresas que busquen gente con ganas de trabajar.
      </div>
      <div class="col-xs-12 botones">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><a class="btn btn-primary" href="alumnos-page">Alumnos</a></div>
        <div class="hidden-xs hidden-sm col-lg-1"></div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><a class="btn btn-default" href="empresas-page">Empresas</a></div>
      </div>
    </div>
  </div>

  <div class="cover hidden-md hidden-lg">
  <div class="background-image-fixed cover-image" style="background-image : url('//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/businessr.jpg')"></div>
  <div class="main container">
  <div class="row">
    <div class="cover">
      <div class="row">
      <img class="col-xs-12" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/logodef-sm.png" alt="multijobs-logotitulo">
      <div class="col-xs-12 titulo">
        <h4>La mejor página para encontrar trabajo.</h4>
        <br>
      </div>
        <div class="col-xs-12 col-sm-12">
          <div class="hidden-xs hidden-sm hidden-md col-lg-1"></div>
          <!-- <div class="col-xs-3"></div> -->
          <div class="col-xs-12 col-sm-12"><a class="btn btn-primary" href="alumnos-page">Alumnos</a></div>
        </div>
        <div class="col-xs-12 col-sm-12">
          <!-- <div class="col-xs-3 col-sm-3"></div> -->
           <div class="hidden-xs hidden-sm hidden-md col-lg-1"></div>
          <div class="col-xs-12 col-sm-12"><a class="btn btn-default" href="empresas-page">Empresas</a></div>
      </div>
      </div>
      <div class="background-image-fixed cover-image" style="background-image : url('//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/business.jpg')"></div>
      </div>
    </div>
  </div>
</div>

  <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen///localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/jquery.js"></script>
	<script src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/bootstrap.min.js"></script>
</body>
</html>

