<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
/* define('DB_NAME', 'wordpress_myimmopixcom'); */
define('DB_NAME', 'myImmoPix');

/** MySQL database username */
/* define('DB_USER', 'raphael'); */
define('DB_USER', 'root');

/** MySQL database password */
/* define('DB_PASSWORD', '110582'); */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
/* define('DB_HOST', 'localhost'); */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '>itM2F3-KTh^crwi92= _5H=N/p7Z%B[`bOHv?XS|EG]s=n`,gPS8Q:4#>qs8((B');
define('SECURE_AUTH_KEY',  'Su(U%5zfW4P6-)=YJC5Gv6ora&%n9;o)ZWA<yI!SgiH:k*$QI(a/f6)w7.crc|@f');
define('LOGGED_IN_KEY',    'mb|/x/wbO+d[D5sGdjZRWHL{1<#d5bsZg-6A X$6Y,=tm=e3u]%}7@BFAO|)+vxR');
define('NONCE_KEY',        '!8F(,XvI?#RYnmPY?=8F7a?jN0n_H6L%c=P5~,v?tZ<9I:;BFU|Ln{3P,RiZ=W2?');
define('AUTH_SALT',        ';NJaj|Bn+OV-2=p,Pxfi$eR7q=KqzK)T8PtY+bCA1B[AM!PeL<y(Qly:9y;_wzuv');
define('SECURE_AUTH_SALT', '$ZV~.{7PA?NXcgmB#.y-7%@8Zx[P*$Z)uSwjBd#P;{xWNv[ML=dxoE0V<QM>IM&=');
define('LOGGED_IN_SALT',   'T)Zlr;s>B>ggS+}RHmY+=poUx$gLXAHsUK(i6HF(]x-A10+@K9pP6Sd;7ew7xZGT');
define('NONCE_SALT',       'b<+q#^d=! MCxbZ$T,+ITi49sn#OB[eS~5adlhlwqE3@J<jY=8~oE|][*,V(M-Bx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
