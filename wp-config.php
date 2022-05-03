<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'abelohost' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'Ht2IUqAl>>WJ;}Uh *SHN-aRgk#1dr:53j_h9Y_JSae.?U9 jyb7>VB+gh9XB(SC' );
define( 'SECURE_AUTH_KEY',  'xMDS#H<^OI{|MYR]<E9s!P,;a13.#RyZLcf>*bkRqV%7{t`,xW{gU>gOZsy|CUdi' );
define( 'LOGGED_IN_KEY',    'Y5eEfQ<*3YhXeqEMwT5*_<f?VOtD^7*,UbP]zdutpcN^t<Cp(ZY23&!xQ7&8 `fx' );
define( 'NONCE_KEY',        'FqN?lsAYzzs]fKno@a6v&h/MKiG&_D<l}sy6u+ug5DEV9[9Z2<YK(BWrqg^eX5L.' );
define( 'AUTH_SALT',        '0-bd;;MlTuQo&MvIgDN3y$y6*9|H]&!V:L`_m.JCZ7)YB7,T2D~Rf`pBbV[*pjrx' );
define( 'SECURE_AUTH_SALT', '9&<c}xne9AP 2;(ckCb6|U>T]]DN8HI`D-WU>dzJ|7&MA~<]<g%T{6b6]}rRmbbs' );
define( 'LOGGED_IN_SALT',   'Qe?P5hmgPwf@P~Nxhz/-J1);(g%aK)PIIJ!Q0r0_pG^.,^[.!f;l`c$hRe[I]S#P' );
define( 'NONCE_SALT',       '*e3x}&(+6XsI;t&Wn)!g3umK4{!or??+yP$xu_kIFTkl@qNn@:Vlon:FR$pKQWPu' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
