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
  <script>
  var sw = 0;
  function cambiar(){
    if(sw==0){
    document.getElementById("pass").type = "text";
    sw = 1;
    }
    else{
    document.getElementById("pass").type = "password";
    sw = 0;
    }
  }

    var sw2 = 0;
  function cambiar2(){
    if(sw2==0){
    document.getElementById("pass2").type = "text";
    sw2 = 1;
    }
    else{
    document.getElementById("pass2").type = "password";
    sw2 = 0;
    }
  }


    function enviar(){
      if(soniguales()==1){
              document.getElementById("form1").submit();
      }
      else return false;
  }
function soniguales(){
  var c1 = document.getElementById("pass").value;
  var c2 = document.getElementById("pass2").value;
  if(c1==c2){
    return 1;
  }
  else{
    alert("Las contraseñas no son iguales");
    document.getElementById("pass2").value = "";
    return 0;
  }
}

  </script>
<?php
header('Content-Type: text/html; charset=UTF-8');  
 include 'conexion.php';?>

<?php  session_start(); ?>
</head>
<body>
  <div id="container">
    <div class="header">
    <div class="pftopline wpf-transition-all">
            <div class="pf-container">
          <div class="pf-row">
            <div class="col-lg-12 col-md-12">
              <div class="wpf-toplinewrapper">
                <div class="pf-toplinks-left col-md-4">
                <ul class="navegacion-izquierda">
                  <li ><a href="https://www.facebook.com/"><i class="fa fa-3x fa-fw fa-facebook text-inverse icono"></i></a></li>
                  <li ><a href="https://twitter.com/"><i class="fa fa-3x fa-fw fa-twitter text-inverse icono"></i></a></li>
                  <li ><a href="https://plus.google.com/"><i class="fa fa-3x fa-fw fa-google text-inverse icono"></i></a></li>
                  <li ><a href="https://www.instagram.com/"><i class="fa fa-3x fa-fw fa-instagram text-inverse icono"></i></a></li>                   
                  <li class="pf-sociallinks-item pf-infolinks-item envelope  wpf-transition-all">
                    <a href="tel://+34650685146"><i class="pfadmicon-glyph-765"></i> <span class="pf-infolink-item-text">+34 650 685 146</span></a>
                  </li>
                  <li class="pf-sociallinks-item pf-infolinks-item pflast envelope  wpf-transition-all">
                    <a href="mailto:multiplas72@gmail.com"><i class="pfadmicon-glyph-823"></i><span class="pf-infolink-item-text">multiplas72@gmail.com</span></a>
                  </li>
                </ul>

                </div>
                <div class="col-md-4"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="main container">
    <div class="row">
      
      <h1 class="page-heading title_font">Registro Empresa</h1>
      <?php if(isset($_SESSION['correcto'])){
        if( $_SESSION['correcto']==0){
           echo '<div class="alert alert-danger" role="alert">Registro incorrecto. Puede deberse a que el correo ya esté registrado.</div>';
            unset($_SESSION['correcto']);
        }
      } ?>
      <div class="form_content clearfix">
      <form id="form1" class="box2" action="valida_empresa.php" method="post"  enctype="multipart/form-data" onsubmit="return enviar();">
        <div class="form-group col-md-4">
            <label for="nombre">Nombre</label>
            <input class="is_required validate account_input form-control" type="text" id="nombre" maxlength="30" name="nombre" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <div class="form-group col-md-4">
          <label for="sector">Sector</label>
          <select name="sector" class="is_required validate account_input form-control" required>
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
          <label for="provincia">Provincia</label>
          <select name="provincia" class="is_required validate account_input form-control" onchange="muestralocalidad();" required>
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
        <div class="form-group col-md-4">
          <label for="localidad">Localidad</label>
          <select name="localidad" class="is_required validate account_input form-control" disabled required>
          </select>
        </div>

        <div class="form-group col-md-4">
            <label for="mail">E-mail</label>
            <input class="is_required validate account_input form-control" type="email" id="mail" maxlength="100" name="mail" <?php if(isset($_POST['email_create']))echo "value=". $_POST['email_create']; ?> style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>

        <div class="form-group col-md-4">
            <label for="telefono">Telefono</label>
            <input class="is_required validate account_input form-control" type="number" id="telefono" maxlength="9" min="600000000" max="999999999" name="telefono" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>

        <div class="form-group col-md-4">
            <label for="descripcion">Descripción</label>
            <textarea class="is_required validate account_input form-control" type="text" id="descripcion" maxlength="1000" name="descripcion" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required></textarea>
        </div>
        <div class="form-group col-md-4">
            <label for="breve_descripcion">Breve Descripción</label>
            <textarea class="is_required validate account_input form-control" type="text" id="breve_descripcion" maxlength="50" name="breve_descripcion" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required></textarea>
        </div>

        <div class="form-group col-md-4">
            <label for="archivo">Imagen de perfil</label>
           <div class="alert alert-warning"><p>Tamaño máximo: 512kb. Resolución recomendada: 250x220px <br>Formatos soportados: jpg,png. <br>No es obligatorio, puede editarlo en perfil.</p></div>
            <input class="is_required validate account_input form-control" type="file" id="archivo" name="archivo"/>
        </div>

		<div class="input-group col-md-4">
            <label for="pass">Contraseña</label>
            <input class="is_required validate account_input form-control" type="password" id="pass" minlength="8" maxlength="20" name="pass" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
            <span class="input-group-btn">
              <button class="boton-mostrar btn" onclick="cambiar()" type="button">Mostrar</button>
            </span>
        </div>
    <div class="input-group col-md-4">
            <label for="pass2">Contraseña</label>
            <input class="is_required validate account_input form-control" type="password" id="pass2" minlength="8" maxlength="20" name="pass2" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
            <span class="input-group-btn">
              <button class="boton-mostrar btn" onclick="cambiar2()" type="button">Mostrar</button>
            </span>
        </div>            <!-- <input type='password' id="pass" name="pass" maxlength="15"  class='form-control' name='campo2' id='campo2' placeholder="Contraseña" required /> -->
            <br>
            <div class="col-md-12">
            <p class="submit">
              <div class="col-md-5">
                <button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium title_font">
                  <span>
                    <i class="fa fa-user-plus"></i>
                    Registrarse
                  </span>
                </button>
              </div>
              
              <div class="col-md-5">
                <button type="button" class="button btn btn-default button-medium title_font" onclick="location.href = 'empresas-page'">
                  <span>
                    <i class="fa fa-arrow-left"></i>
                    Volver Atrás
                  </span>
                </button>
              </div>
            </div>

          </p>
      </form>
      </div>
    </div>
  </div>

    <footer class="wpf-footer">
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