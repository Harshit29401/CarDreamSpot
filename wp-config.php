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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'carrental' );

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
define( 'AUTH_KEY',         '-!$&)`UfG?ua6L]tSC|drr}5$jOs^z7/zcO9i-8!lEfX7eQe`TnxdhkfX{l2_XK@' );
define( 'SECURE_AUTH_KEY',  'tYHT|o7In5FX1QTj6trN{}i@/1b:N$FLKJOJ*L:wSd :!d67}oG@,{p<n5x[iTAk' );
define( 'LOGGED_IN_KEY',    '|S=1CeW5H:bE6,941xhle{ `Z+C$Ww+c9Xi[EEO=[mgmvz=:{e%LxB()~-u/ZJ+:' );
define( 'NONCE_KEY',        'c[]A1n._oA%u2@38b9`@~_5xM.?P6o<|?W$h};TbOhp}oHNh-dte~Hd=?R=K#OT=' );
define( 'AUTH_SALT',        'pJ|<2~0M @8inkY(9wt__eG728NI}.}WDVhw^@t}s:E19:U_[v2$#Fgv],$7W7:Q' );
define( 'SECURE_AUTH_SALT', 'IDAD)5#SgmYH/<l014M;];f5Y@Bn!EZ7OYbw-qfV?) X*m4D^_WwrC$Dy5jjm#Bc' );
define( 'LOGGED_IN_SALT',   'AL.MJ^HMb&221fx$xr4*4|@Se2`2~MsT[!k-7kh!mHNBb:M<r!e<DoU&*/[fF:i&' );
define( 'NONCE_SALT',       '<WvWjB~TRBod4PzFDlP[-~9|7Q ;w5 O0T+GnEw,Ae&Xpe(6TYz7QovVsJttBAH=' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
