<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'lexicon');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'root');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';Y m_D|b>n!:W).9=Mwr+deKz1K#DG/};<X_n^Uvb@HE${GY! bVeU7Us#.,0?Bi');
define('SECURE_AUTH_KEY',  '+X+W+2pj!|Er;fHxN<(>m?/%Aq^A!$j%{Vp[a0Tx-&z8_fcf:X>oV94{XQITS2}`');
define('LOGGED_IN_KEY',    'tH7mwpz7U|#%-z;vI3sh9xkez`,||w-7T@qt!@Sp#~+13_d;4&u3L}04ukSJEl}^');
define('NONCE_KEY',        '4[!k=rAF~tla`^d>iKZ-+M*)]+<Ul]-%+ZZiR Tk<0eEt:Hg0E48zD)zvu|/UXcD');
define('AUTH_SALT',        '-)Q91_ zv^It`R+0.PWx_I*D%Tm#9YpPDSUat){+Kbo9YV(g8q@cilLO_CvMO-(H');
define('SECURE_AUTH_SALT', 'x9B39@VX`ro +~VV%j.`IDMZ&a+=HW#``D;d~(418.0lfi=<wQtG=^:/4}8dRxBc');
define('LOGGED_IN_SALT',   '-<2T=m}D@6SQ_hqP-.:KQ d0-(Bu`YZQ,ZN[h$dbC#Jg4+&0W=Zd<B[)cT_N06NN');
define('NONCE_SALT',       ',<7,<&Y-cTG-IcdElL8]`y1@/L-ElCmSa@T|u]A@l-Gh-7&b1O-v{-8,-}5k-W@|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
