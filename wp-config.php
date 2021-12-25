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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'restodb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         ',dPzZRsqE3gMsbE`?Apc?!@jX2C,KJX]|sB+ DO+48VL|7Zsv/Z1!LD~y39 XB0M' );
define( 'SECURE_AUTH_KEY',  'iu`gXQpCuYK7AV^3{aS8}[T>yi0}Ps #_woE07ATWh}5 Q^U()wOP fWipqum2)l' );
define( 'LOGGED_IN_KEY',    'ued)K{0H+%~oYvzL<+|Ig4@nFQzMhNFzAsd:G}=)-/P9f%t9*Xk7hmi%;pw6oD#e' );
define( 'NONCE_KEY',        '~4OY3^<jRTQ>EL=+[t%(77i,kndat(#4aH711`af?vC%/Yp5>v+0:?c# ErUW+@!' );
define( 'AUTH_SALT',        ':bJ3.`ochI*&5<T)gfp_#<i+$f7%rl|,;-$QRJK062P?vr.9?80&ef/Xff;$#3Hx' );
define( 'SECURE_AUTH_SALT', '%N.>JrMg{;>a]u`4R1RxU9gtt*<kDgAOtZjeT[/=7|K}|,XNFh7oECKH Kb)3F0q' );
define( 'LOGGED_IN_SALT',   'u%#qXY)#|g03tP+qlE;TueM6H4N=:BkK3]3y|Wf~kr:;-H)&V!Lx,n|_7I|XG&@h' );
define( 'NONCE_SALT',       'bYC{|Zc9`+9{KHkYNp(!1N73hBw`xa1!hNG#g*4M,]JaMNc]oCmE+c&w*D*/ Pns' );

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
