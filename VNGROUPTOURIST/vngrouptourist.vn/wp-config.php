<?php
define( 'WP_CACHE', false ); // Added by WP Rocket


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'AO!#@adsq3231');

/** MySQL database username */
define('DB_USER', '3131!3231)!(#!314');

/** MySQL database password */
define('DB_PASSWORD', 'Pb4S23cTTn321312327GZpL');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/ctDZZi+|jio74I#Vr&Ulc}HdtnPc4rue#;xz)Rmp:ipS}TWgs9407h`G7P_c~;5');
define('SECURE_AUTH_KEY',  '_=BqJj>aN?BsyxtVkg#HKvy/?nL-cC1AmW$Q3JT/73/HlH Ne]U0>w;{|S6O0Y,]');
define('LOGGED_IN_KEY',    '9~`D9rMwH>Sg6a3+;{`+_)2fvhI[}m9K?566j={AC2Z*e_H)2cGM3Q|e_|}-qeD[');
define('NONCE_KEY',        '_PXMGFnRM-cH@yI4a3J9FKTfL>6UrAK}*$V1G%SB&nr^XCBqb.]guVvsq|mJWX~B');
define('AUTH_SALT',        '|y]v<7iEhl6luW/^2H}y~--M(yd3g^^1Jlq:.r!LH|z=6M3 Tn2IweYAO6-Wrw+(');
define('SECURE_AUTH_SALT', 'UDK&+jP3/ (CFd=R+01j@fVCekF=]Gkb%4+lG@|w~:`i0{/lS^IhWS6/^H8}5%-+');
define('LOGGED_IN_SALT',   'AtdeLL<nE^Ec.T?$1*~aK8I;R3%fKt~pI?A{(c|f%e<H_bwPkUH)Q;|Ou87M;j$-');
define('NONCE_SALT',       'j3>s:Xz%9_mp&ReQ+JeJPU+ K{t8_3wsS9pSkiC8xh>^AiO~Hv;W|B|ujp !RTIF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'svn_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
