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
define('DB_NAME', 'library');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'u}/7YM8p(/XQyy(rA_&|P6NH+,{AH:TW!R.81<C`?(ah$dgF1UC^e))}:_s6x2C#');
define('SECURE_AUTH_KEY',  '|)3N@rO=A^nc8Z%Q=%BO<f%! EFO`]$p]i%;.$j$wD`^5jOVopg~VlG^9]->W[)*');
define('LOGGED_IN_KEY',    '={2EnTu+ln`t@x8EaRtX`^99IRPTk$AN;/@_+a)N,eVATz>aUku`~qx!K/xzFjpU');
define('NONCE_KEY',        'E+ye1qPz!t8I#5V4=8`qVKk#jHNu>EP`xi{tB_,&Y5WG{iom$L_7gxBzCj@[3lRD');
define('AUTH_SALT',        '?CE7p uj88i|$^El$e(3I2BiV W(I]dbzT$)@Tg`|_b8>g+w1^.#R^v@YKmY`|-J');
define('SECURE_AUTH_SALT', 'Pf!nK2}DC5-QH@{cU|{EJdcqVgh|)xvAq-1vcj7g4`95NYq/*Sgw$2ZninO,v:52');
define('LOGGED_IN_SALT',   '{NZiP0~8eJi+L!7)J]2?,a/`2.OCo01&iOy;zm!,W^@VtLn]z@/ueKQQa#[#X,_/');
define('NONCE_SALT',       'mQHgdB7h}azH9j9O},fU+>LRb(h*.!8L*=)Z7x#:2,J;FpeJ>`cMfmxtD&,4pf|J');

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
