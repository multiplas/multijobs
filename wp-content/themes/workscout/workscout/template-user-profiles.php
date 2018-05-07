<?php
/**
 * Template Name: User Profiles Template
 *
 *
 * Template para cargar el shortocde según el rol de usuario.
 * 
 *
 * @package WordPress
 * @subpackage resumes
 * @since resumes 1.0
 */

get_header();

$datos_usuario = get_userdata(get_current_user_id());
$employer = false;
$customer = false;

foreach($datos_usuario->roles as $rol){
	if(trim($rol) == 'employer')
		$employer = true;
	if(trim($rol) == 'customer')
		$customer = true;
}

if($employer === true){
	echo do_shortcode('[ultimatemember form_id=405]');
}
else{
	echo do_shortcode('[ultimatemember form_id=240]');
}


get_footer(); ?>