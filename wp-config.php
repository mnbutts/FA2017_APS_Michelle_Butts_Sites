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
define('DB_NAME', 'edesigns');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'J05=|1`Ne;91SOxS5uGWRkOHrxmi|s<e[{^5-m+u-,O, Dg!t7ag%+GsB>r*3IcA');
define('SECURE_AUTH_KEY',  '!WHqstQ5AC%y8ao2:++~He<co>)H7L&8,`5[vnZv0T)I{IoHQPwC6|_BoXwQ/.$S');
define('LOGGED_IN_KEY',    '[W$w@TB=JQ+FGj_8SIf?0m6+y=hSzMFN{>#(f+Q}7&#{LXUQh6ktj}+UK%vS3vfp');
define('NONCE_KEY',        'wEejjr!Dc>N2xucb0IDWuRoU3}L+YBn2i(G.%U~G/XdJ.y9>$c1?FsxHt<!*^kCw');
define('AUTH_SALT',        '^}|5j9RApqYyBH_FxDbfT:$73nyFHz$pS3rZuBBVxE:|Lx8@wc0=?Lb]{v6.@!7g');
define('SECURE_AUTH_SALT', 'k#{3o]esS.1sN{O`n-$>ZiPAi@Mh#xHb*&Lx)87PCYjbUXfsM~.-6 Dv|c!@uzU.');
define('LOGGED_IN_SALT',   'DaH(|_OAfk$qt+pI]AgCMSbu*&7P>=U3%!-?=t|s6?PUC,o,z5H$KuCN+WyW]@nC');
define('NONCE_SALT',       '8vm<F?2T6G/yY<t}v|r$+$gr!J$26SfQ[#/8pxRU/_bA`<:=p-&H~>-Z[2UVK|+7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
