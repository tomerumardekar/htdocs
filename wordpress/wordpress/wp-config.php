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
define( 'DB_NAME', 'my' );

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
define( 'AUTH_KEY',         'GB95sO+6#Pw9]6U9TDD?$9#m.snzY|)C-Y={3~2nxC2U): Qs[4]Oi|p*>cTNWzH' );
define( 'SECURE_AUTH_KEY',  '}@)ee?|@1#b26Q]dx1DNmxKta5h$d+EqA#x)_j{d8f{F]hzVww&T CdyK&< SS0m' );
define( 'LOGGED_IN_KEY',    'M~@g(1.j&JcxH-]ADV=}@LO=g7J:abIOwBykVnaI/L3u87^Blwll/tgi#=5$0psA' );
define( 'NONCE_KEY',        '^GWo&JM0:Lx>[6,e@!1Gs/HaQeh:x_@BAJOdE1061}5wc4-?[MP]V?P-`_.?{Ob.' );
define( 'AUTH_SALT',        ' K$OqXc~w!%uAJRu2+[+=p%PSt;q`J};G!OuvihLSjfIffn.U0wrC.dO5gYhMu2>' );
define( 'SECURE_AUTH_SALT', '5^5Av [TkFwefRv4wk_ULhE3tzVgOx<;yEW+=xIln{iMRy?`_QN}W5JD08OA^$:A' );
define( 'LOGGED_IN_SALT',   'x+z<S+P#A]Io1bpB{+CZ}4zn>*&YdFASVxec4k*Wb:-#nMfL+^<KA7~fZM5Z@NtO' );
define( 'NONCE_SALT',       '8(4oSPZ1<0)JC;k_ -f2d9!p{[#^1+B9 xJRO,kf%J:b25j,pLh`tl|S~K:axa(d' );

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
