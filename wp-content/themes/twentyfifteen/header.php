<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<?php 
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));
	?>
	<?php include '//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/conexion.php'; ?>
	<title>MULTIJOBS</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/bootstrap.min.js"/>
	<script type="text/javascript" src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/ajax.js"></script>
	<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/css/index.css"/>
	<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/css/multijobs.css"/>
	<link rel="stylesheet" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/css/bootstrap2.css"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/img/iconoalternativo.png" />
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script type='text/javascript'  src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/jquery.js"></script>
	<script type='text/javascript'  src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/bootstrap.min.js"></script>
	<script type='text/javascript'  src="//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/js/localidades.js"></script>

    
	<script>
	function redimensiona(){
		elementos = document.getElementById("sidebar");
		resultado = window.innerHeight;
		if(elementos)
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

</head>

<body >


	<div id="content" class="site-content">
