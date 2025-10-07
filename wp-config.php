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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'magic_events' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '1Qonu*Tczi$e[]o/U)$%!p8@75Zifkb$gWE9ByZwP>~p=2aXC8!g<xhqQJG>s;%c' );
define( 'SECURE_AUTH_KEY',  ')6x8EG5~ZB--l(-iY?tX=e|#+/s;RGtxkTtF> 4piHd}t^sZCA8t:.gm>!:zYwEQ' );
define( 'LOGGED_IN_KEY',    '^D[N^%EGWZw&uv4!ma4-.aBQkv4n{M5 ;LKlAlJyrDAU@&:rSgyWk+0#9+yEL=Ja' );
define( 'NONCE_KEY',        'Sn;+bbYSTqBK.<u{qAZt?K cDu,VcY7f&[/.{-cw9w!^<ScBj-8G>)Zg52X`@rF-' );
define( 'AUTH_SALT',        '!wfws~?$%oe9]?0[CA;1cIlCKT/oAu7N}_,aKBRQ<6>(N-9 ImCT+10J!@E#VO-x' );
define( 'SECURE_AUTH_SALT', '*=RMg$qI.= +23L_+Z)vpZ~Vfzam:w(k1r]bUZCWion_P2J&oWs{K-OMTz3#5=3V' );
define( 'LOGGED_IN_SALT',   '()+mGv7Ed|J&V6(F`~wt:.^DHaZ)o;2lq%r;F*t`06kV,l:7#JVpBmx_rRsTc>zo' );
define( 'NONCE_SALT',       '2+qV@=#*=#_[nq9YOmHNN/:vyv~X9*].FiwXv.F/=8|?/d9KI$}(<^(|(JJIBBt?' );

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
