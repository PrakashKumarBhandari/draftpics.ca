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
define( 'DB_NAME', 'draftpics' );

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
define( 'AUTH_KEY',         '&W,5GO<$d=#DvyUSKO=lb=MzR<yyvnjkInnBvhx5lg!KK~7wwRyKWf3(fEwcEl3#' );
define( 'SECURE_AUTH_KEY',  ' A5cHM JEem%Bs1DXI@Sxo<$7ReRi=G+^6:D{.xa|*Fd ^|wE}>IeOo5O!71v ;a' );
define( 'LOGGED_IN_KEY',    'wJ^v&i8j0DfWP$R%eo.<Imf9[64-JCn>d[n4Yv9aB,5^ODDC3hQq/:kXR%pJo`qJ' );
define( 'NONCE_KEY',        'h|8}EgM%CGVq!v.Hp,^<u=0p[GB~?Sa||]+p(/KMNKZ~0OH|dMt6B}78s?W8rH~B' );
define( 'AUTH_SALT',        'pYB,M]4b0Mov$R]ai4YQ[2^;ebpNjuA7E&e&FjyMBpp?~}7nYI!]lh.d66,C{zVf' );
define( 'SECURE_AUTH_SALT', '_@1D#9O,,f6nTm<vTw{xAwO}1P}-z57A-PiRcOcwj|>y&T~4r1MU^TF(oE;=yX=p' );
define( 'LOGGED_IN_SALT',   '}XZfL tQ00%I7eRnp(CRF|W|(mv&g[g4EF^$xU@AAGZXyO=auh6U$*07.[qo}g=b' );
define( 'NONCE_SALT',       'v,Hw;u4l|qKT3{!_ex9{Mv:]a:NJ:eoUH fe:%bGEJPhf5Z|A_2!4*F=1i49tQ+`' );

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
