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
define( 'DB_NAME', 'worldofwatches' );

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
define( 'AUTH_KEY',         'BYx#C+to>>hU9Lxl3mzC.lPeXcO:;l??uLdGZ#v8@2*@q.qKC;V|2S_[K&S,3&bT' );
define( 'SECURE_AUTH_KEY',  'a](V9M$0z+aIXeTT)([ix,-z2rc`@Cn/mCvy>fN^q}?aG<-tt ,R)}y|iCtHMLnW' );
define( 'LOGGED_IN_KEY',    'QWIU/n|`e&Ow:~#>3n qJ+-Tj_ZQE]wm^+XX8r-w^=&0 PJO`CfeD~Q1i$I6Q+A5' );
define( 'NONCE_KEY',        'Vh|+~dlQ:cyDLnd`G3xA;ON!.{l/4yZHPFvWyw8l(DvW(OTKhQ3Z$T.#^F8h|LO@' );
define( 'AUTH_SALT',        'IUL>RYeC-K},h`]e*=v.w.#|I}@sXMDGCd[{rh_-lg,.fa2H~1aV7FVH,Ym3.u{R' );
define( 'SECURE_AUTH_SALT', '!8-]f*x&${PQlpo45Ryr@]?vo86cIR$eC5WJr$o9=4/dQMM7Nh[~?G0c>|c}Id#L' );
define( 'LOGGED_IN_SALT',   'i-6w_?QKY9T-tpRO8<aJt%q^W!+Mga3)cPK.g0s[=DjO[Sf?SZPu`FY~;k*,O4;^' );
define( 'NONCE_SALT',       'G)dpD(]cH$nABuvNHH&Oq9T6B$`HwMgSZFmu2hhg(0kuulMeXxNU,/-r@&(*g(hA' );

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
