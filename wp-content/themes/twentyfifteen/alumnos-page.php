<?php
/*
Template Name: Alumnos-page
*/

get_header(); ?>

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
	</nav>
<?php 
if(isset($_SESSION['usuario'])){
	header("Location: ultimasofertas.php");
    exit;
}

?>
	<div class="main container">
		<div class="row">
		<h1 class="page-heading title_font col-md-9 col-lg-10">Autentificación Alumno</h1>
		<div class="hidden-sm col-md-3 col-lg-2">
			<a id="atras" type="button" class="boton_header button btn btn-default" href="<?php echo get_home_url(); ?>">Atras</a>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<form action="<?php echo get_home_url(); ?>/registro_alumno" method="post" id="create-account_form" class="box">
				<h3 class="page-subheading">Crear una cuenta</h3>
				<div class="form_content clearfix">
					<p>Por favor, introduzca una dirección de correo para crear su cuenta.</p>
					<!-- <div class="alert alert-danger" id="create_account_error" style="display:none"></div> -->
					<div class="form-group">
						<label for="email_create">Dirección de correo</label>
						<input type="email" class="is_required validate account_input form-control" data-validate="isEmail" id="email_create" name="email_create" value="" required>
					</div>
					<div class="submit">
						<input type="hidden" class="hidden" name="back" value="my-account"><button class="btn btn-default button button-medium exclusive title_font" type="submit" id="SubmitCreate" name="SubmitCreate">
							<span>
								<i class="glyphicon glyphicon-user"></i>
								Crear una cuenta
							</span>
						</button>
						<input type="hidden" class="hidden" name="SubmitCreate" value="Crear una cuenta">
					</div>
				</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<form action="<?php echo get_home_url(); ?>/inicia_alumno.php" method="post" id="login_form" class="box">
				<h3 class="page-subheading">¿Ya estás registrado?</h3>
				<?php if(isset($_SESSION['inicio-correcto'])){
		        if($_SESSION['inicio-correcto']==false){
		           echo '<div class="alert alert-danger" role="alert">Inicio de sesión incorrecto. Verifique que la contraseña y el email son correctos.</div>';
		        	$_SESSION['inicio-correcto']=true;
		        }
		      } ?>
				<div class="form_content clearfix">
					<div class="form-group">
						<label for="email">Dirección de correo</label>
						<input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="email" name="email" value="" style="cursor: auto;  background-attachment: scroll; background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="passwd">Contraseña</label>
						<input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="passwd" name="contra" value="" style="cursor: auto; background-attachment: scroll;background-color:white; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;" autocomplete="off">
					</div>
					<p class="lost_password form-group"><a href="http://www.emoticonate.com/recuperacion-contraseña" title="Recuperar tu contraseña olvidada" rel="nofollow">¿Olvidaste tu contraseña?</a></p>
					<p class="submit">
						<input type="hidden" class="hidden" name="back" value="my-account">						<button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium title_font">
							<span>
								<i class="glyphicon glyphicon-lock"></i>
								Iniciar sesión
							</span>
						</button>
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
	</div>


<?php get_footer(); ?>
