<?php
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
define( 'DB_NAME', 'haitireportzone' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[t)7;Uf<-l~cIAP!1r?8:%elT[)ZDaDU17Wu]^~uJJQq)jZK`ndG37Dk{]~tpK1m' );
define( 'SECURE_AUTH_KEY',  '>wxq{|kp<Z&VM5@0]>n@,}in9FzGx#nz=?yrq6V{R),jH!R]L?j,m;-`<dI`z@0G' );
define( 'LOGGED_IN_KEY',    'hkf5/pR=}8vt(l:9tX/4hNKO-zlbArvi}/W84[<N+62Iu%@3in0Q-+AFm=aeV4[a' );
define( 'NONCE_KEY',        '6yn+n]P.nJL=2(`&L-E(TXw(YZiM0sfbLH=&#0.M-#1!ZL!:1tC6Qe08$92&9XzI' );
define( 'AUTH_SALT',        '$ gi)|m$^atuI T64*V.5y2)r-M,,Yc7T<,x]lC5x{f3!1Fz^Z{`aF!{f^W[3bNd' );
define( 'SECURE_AUTH_SALT', 'pPZ^C}dpvTzpMGDVL-Gxk_I J1!DFh&4K2[^z~?El#a@]$_CQmBed1p}jpy#i0!7' );
define( 'LOGGED_IN_SALT',   '~52.>)bp@T|:_/O<Y4^)GP7QX@NcEwSJ!@hMlOY+,]k>q$3Ug}?-loMaHI%);=Tm' );
define( 'NONCE_SALT',       '@QT`Es)PnWh[nyR`#zbq!R{8v#VgFe}R!![fCCn14Zj7n0xo3*nF((]:ig>Xwoc+' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
