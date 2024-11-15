<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

error_log("Entering wp-config.php with request URI: " . $_SERVER['REQUEST_URI']);
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bitnami_wordpress' );

/** Database username */
define( 'DB_USER', 'bn_wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'OWFHeTuLJk' );

/** Database hostname */
define( 'DB_HOST', 'wordpress-mariadb:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e?|pe)PEFI3?Lj[8eJ~8KNy-Ne5KpIm8H_y9US7+gD|-j,&!%E@7h}A`,)C0Va#d' );
define( 'SECURE_AUTH_KEY',  'hM ] %[_nZ(eYG(?M%t m ,FvF63ImL!MYQNrY7R9*j]%vrW$Ii[{H5e32(YyAyW' );
define( 'LOGGED_IN_KEY',    'WwT; 3ADMlQ}gZ4M+9un;{Ys:f0gnegrs% )96ehP-xCchTJySd@8)ve0W6sn}$s' );
define( 'NONCE_KEY',        ']T$Ki|}p@|SCj}C$_/3~z/v)>@sSC)U?8QDM)WW}ZO5rZ<lgOlhv3{gCqN|&z-/J' );
define( 'AUTH_SALT',        'n=P(<<.={-SFtb%i0.hBxKL:rgLb@{:o]3CYz8EoKd6dRgR7nnddP:{EOxYeVm<j' );
define( 'SECURE_AUTH_SALT', 'j?e:HM0nodPr})H9jkHR%j3#bzwPB!mM_p=iXhAO5CmZ-FHoz<k})>lLH$Vp2kI;' );
define( 'LOGGED_IN_SALT',   '@f,x3&Ya3[OJ><g<%7`wmAW}Czyysi3DC~t.-u(kG3dT-,$8@>#!~l|]R:!,..cW' );
define( 'NONCE_SALT',       '@Tv:PYt/L.G5ZmZ?N Kpk+h9#:Hx{Pi%sDxl+)d%k5LE$2C3YgYGx~^aO}_XlUSd' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', '/opt/bitnami/wordpress/wp-content/debug.log');  
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
