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
define( 'DB_NAME', 'Doctor' );

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
define( 'AUTH_KEY',         ' UB^t9:=@1XmF}NY PE#.Q7uE|xj5!sO?GEPwSwQbu2(>ae)fD0W}vBU>Gn=%/)m' );
define( 'SECURE_AUTH_KEY',  '2r{(NTN5!#B,1U/=i7&|!k^]kBI9hGOuaM;nQCgG:v,[/3,ZO&0F)dr#/jt6rl{M' );
define( 'LOGGED_IN_KEY',    'SPH(Ix+xTAD1)~}TuC 1QIdUUf)45%Iv69Q.iV:_Jsyy.IKiAE`8;=H4,~c=..kX' );
define( 'NONCE_KEY',        'Yu+M^UMTR`kD|Y%AQ4gG4HwwU.-tkhqI{u_G>eyL7+}F;!e|Wh??sq@W[G/W*UFa' );
define( 'AUTH_SALT',        'N$PB3!FZMPP|8/O8m@CFQrB>Y:| =sZ{(xZFEz:e-Men^Ikx./C+]fs1KWfK]csy' );
define( 'SECURE_AUTH_SALT', 'xWb@h%g0*=i-II;mMI4!j#q!E5!+ndnc6wa(2[4wOt|*%lp gr@i2W6_2_cuwF5#' );
define( 'LOGGED_IN_SALT',   '*R%6jZs$9,OT)st-*bO0:-v,>C)v+cL[x` h=lN3E%XC1]pw6L}EM>O%T7vw=SnX' );
define( 'NONCE_SALT',       'SM2hiDT`w}kxKku{W.:]J&muqSx0zZBya@Jr=xF9+jT@Z%m,mqzc(PRazC~NzR8P' );

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
