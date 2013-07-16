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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ballotho_mbt');

/** MySQL database username */
define('DB_USER', 'ballotho_mbt');

/** MySQL database password */
define('DB_PASSWORD', 'mbt2013');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '_lY%$za joUd>2X:o3P1~*(nu8k`poMOc`Hhn?CV?haN7Xow$@2a6n($ ;nE eOI');
define('SECURE_AUTH_KEY',  'M}!yB|T)Mm$Qf5O2O+=t^g^G`oOZOH)+C?O,H*?93gbkz8sn)jWf?lrw%{{C9D?$');
define('LOGGED_IN_KEY',    '={/*fKDsGmv%%-zj%S=##v5+SX/K( 87W}h[O9o~XSvD~%1o)1,{x@n<w)>pm7~[');
define('NONCE_KEY',        'hVMO+}Z3An$w&`5|}V>lyxB!TDhFJRuU^)KC0o;,YGF4p)q9yri~d;Au-;:[Fts{');
define('AUTH_SALT',        ']=me|;|72)kG#{X3@~9Pc^ART@]wQEslm#,S,[4d*ysj9-K9:Zt@):GT{K*g1T3+');
define('SECURE_AUTH_SALT', '2k/L+|D>B2>Wx1I~-c_4&ICnf/cr0B*PmV~>)AdYeN}PCobGSpr4qe _w_%0.X f');
define('LOGGED_IN_SALT',   '0=sMY7<32)^ip%D|DSB(H^wuJx[~by>O;06?Pk&1W`>=:Viv@Vz)P`5KwNY1:W>U');
define('NONCE_SALT',       'nzzt;tWKL=f(H%r1=>]r4wS<6nkO5l]l<`HbtORNF><c9DzDGCFC.:! RqZHi)Q-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mbt_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
