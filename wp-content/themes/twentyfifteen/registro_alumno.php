<?php
/*
Template Name: registro_alumno
*/

get_header(); ?>
<script type='text/javascript'  src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/register.js"></script>

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
      <h1 class="page-heading title_font col-md-9 col-lg-10 ">Registro Alumno</h1>
      <div class="hidden-sm col-md-3 col-lg-2">
      <button id="atras" type="button" class="boton_header button btn btn-default" onclick="location.href = 'alumnos-page'">
              <span>
                <i class="fa fa-arrow-left"></i>
                Atrás
              </span>
            </button>
      </div>
      <div class="form_content col-md-12">
      <form id="form1" class="box4" action="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/valida_alumno.php" method="post"  enctype="multipart/form-data" onsubmit="return enviar();">

        <?php 
            if (isset($_SESSION['registro'])){
              if ($_SESSION['registro']==0) {
                echo '<div class="alert alert-danger">Error al registrarse, es posible que la dirección de correo introducida ya esté en uso.<br/>Verifique también que la extensión del archivo sea .jpg y que no supere los 512kb </div>';
                unset($_SESSION['registro']);
              }
            }
        ?>
        <h3 class="page-subheading">Información personal</h3>
        <div class="form-group col-md-5">
            <label for="nombre">Nombre</label>
            <input class="is_required validate account_input form-control" type="text" id="nombre" maxlength="45" name="nombre" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <div class="form-group  col-md-5">
            <label for="apellidos">Apellidos</label>
            <input class="is_required validate account_input form-control" type="text" id="apellidos" maxlength="45" name="apellidos" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <div class="form-group  col-md-2">
            <label for="edad">Edad</label>
            <input class="is_required validate account_input form-control" type="number" id="edad" min="16" max="90" name="edad" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>

        <div class="form-group col-md-4">
            <label for="dni">DNI</label>
            <input class="is_required validate account_input form-control"  type="text" id="dni" maxlength="9" name="dni" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        
        <div class="form-group col-md-4">
          <label for="provincia">Provincia</label>
          <select name="provincia" class="is_required validate account_input form-control" onchange="muestralocalidad()" required>
            <option value=""> -- Elegir provincia -- </option>
          <?php    
              global $wpdb;
              $result = $wpdb->get_results('SELECT * FROM provincia');
              foreach ($result as $resultado){
                 echo "<option value=".$resultado->prov_id.">".$resultado->nombre."</option>";
              }      
            ?>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="localidad">Localidad</label>
          <select name="localidad" class="is_required validate account_input form-control" disabled required>
          </select>
        </div>
        <h3 class="page-subheading">Información Académica</h3>
        <div class="alert alert-info">Si tiene más de un ciclo, agregue el más reciente. El resto puede agregarlos desde el menú de perfil de usuario</div>
        <div class="form-group col-md-4">
          <label for="sector">Sector</label>
          <select name="sector[]" class="is_required validate account_input form-control" required>
            <option value=""> -- Seleccione un sector -- </option>
          <?php    
              global $wpdb;
              $result = $wpdb->get_results('SELECT * FROM familias ORDER BY nombre_familia');
              foreach ($result as $resultado){
                 echo "<option value=".$resultado->id_familia.">".$resultado->nombre_familia."</option>";
              }      
           
            ?>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="ciclo">Ciclo</label>
          <select name="ciclo[]" class="is_required validate account_input form-control" onchange="muestrafp()" required>
            <option value=""> -- Seleccione un ciclo -- </option>
          <?php    
              global $wpdb;
              $result = $wpdb->get_results('SELECT * FROM ciclo ORDER BY nombre_ciclo');
              foreach ($result as $resultado){
                 echo "<option value=".$resultado->idciclo.">".$resultado->nombre_ciclo."</option>";
              }    
            ?>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="fp">fp</label>
          <select name="fp[]" class="is_required validate account_input form-control" disabled required>
          </select>
        </div>
        <div class="form-group col-md-4">
            <label for="fin">Año fin de ciclo</label>
            <input class="is_required validate account_input form-control" placeholder="2016" type="number" min="1960" max="2050" id="fin" name="fin[]" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <div class="form-group col-md-4">
            <label for="nota">Nota media de últimos estudios superados con éxito</label>
            <input class="is_required validate account_input form-control" placeholder="0" type="number" step="0.1" min="0" max="10" id="nota" name="nota" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <div class="form-group col-md-4">
            <label for="ingles">Nivel de inglés</label>
            <select name="ingles" class="is_required validate account_input form-control" required>
              <option value="bajo">Bajo</option>
              <option value="medio">Medio</option>
              <option value="alto">Alto</option>
            </select>
        </div>

        <h3 class="page-subheading">Información de cuenta</h3>
        <div class="form-group col-md-6">
            <label for="archivo">Imagen de perfil</label>
           <div class="alert alert-warning"><p>Tamaño máximo: 512kb. Resolución recomendada: 250x220px <br>Formatos soportados: jpg,png. <br>No es obligatorio, puede editarlo en perfil.</p></div>
            <input class="is_required validate account_input form-control" type="file" id="archivo" name="archivo"/>
        </div>
        <div class="form-group col-md-6">
            <label for="archivo2">Curriculum Vitae</label>
            <div class="alert alert-warning"><p>Tamaño máximo: 512kb. <br>Formatos soportados: pdf,doc,docx. <br>No es obligatorio, puede editarlo en perfil.</p></div>
            <input class="is_required validate account_input form-control" type="file" id="archivo2" name="archivo2"/>
        </div>
        <div class="form-group col-md-4">
            <label for="mail">E-mail</label>
            <input class="is_required validate account_input form-control" type="email" id="mail" maxlength="30" name="mail" value="<?php if(isset($_POST['email_create']))echo $_POST['email_create']; ?>" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
        </div>
        <br>
        <div class="col-md-4">
        <div class="input-group">
            <label for="pass">Contraseña</label>
            <input class="is_required validate account_input form-control" type="password" id="pass" maxlength="15" name="pass" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
            <span class="input-group-btn">
              <button class="boton-mostrar btn" onclick="cambiar()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
            </span>
        </div>
        </div>
        <div class="col-md-4">
        <div class="input-group">
            <label for="pass">Repita la contraseña</label>
            <input class="is_required validate account_input form-control" type="password" id="pass2" maxlength="15" name="pass2" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off" required>
            <span class="input-group-btn">
              <button class="boton-mostrar btn" onclick="cambiar2()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
            </span>
        </div>
        </div>
            <br>
            <div class="col-md-12">
            <p class="submit">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium title_font">
                  <span>
                    <i class="fa fa-user-plus"></i>
                    Registrarse
                  </span>
                </button>
              </div>        
          </p>
          </div>
      </form>
      </div>
    </div>
  </div>

    <footer class="wpf-footer">
  <div class="pf-container">
    <div class="pf-row clearfix">
    <div class="wpf-footer-text col-lg-6">
      © Copyright 2016 | <a href="http://www.multijobs.es">multijobs</a> | <a href="http://www.prismaid.com">Diseño Web</a>
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
  <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>