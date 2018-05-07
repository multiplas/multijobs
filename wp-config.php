<?php

/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'db683664347');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'rasty');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'rasty');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'nmAV/kv!HXEnSOf-5-Q0NpE,r$h=[}[./{Zog,IFOjM^`,$tcR|K%IY@4Zk@S(xC');
define('SECURE_AUTH_KEY', 'rri8K we3l>VS:4s>l!#@D5Z@AQ&blUQ4gNSRQw(ck_by$mr9Oh:Mp#|*@ZT_M18');
define('LOGGED_IN_KEY', '0,lHUo0f#&_Ev{T001(YwekKzW/h;k*dD^T#x;zB)B@JC~UzFMzkaS6puQa{h(LL');
define('NONCE_KEY', '9lUn-^klwy{y-lK*Z?1s5_dW-WKm*}KW7vF:.pji*!AN$d`t[_9bV5x9.izUY8p^');
define('AUTH_SALT', 'p%onQ6-hrYuN_9pr#JO[Rq>;PW5eV<QHQISUt8j6r[N}5J!z^7<XI+0_E>: PIIH');
define('SECURE_AUTH_SALT', '[eC7%<Sd1h(L6=r.$MaB,r9T]a@[TL7Caar8;ing*Lb$_0S4l~*$B/Uy3%YJs^Bc');
define('LOGGED_IN_SALT', '/[I##+Jn5@cdH/H2QCbsh)jP3a;8UCo2|:Y.?[Xi{sJ`eb2GjVY)`StQo;~{15@P');
define('NONCE_SALT', 'yL{Q-tj4AI*jmTe@}e5Tj]Etb*Q{ELX+Iovch^/VHvTS>c?E #pv~-23>S=TLC/v');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
//define('WP_DEBUG', false);

 // Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings 
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

Define('WP_SITEURL','http://localhost/multijobs');
Define('WP_HOME','http://localhost/multijobs');

