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
define('DB_NAME', 'wpenk');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '/nnit|i+B;Y0RRqpvs%E=>3gX-wl}L.(9[H4ie:oP+/,@]dcg$5Qr&>G>`)cnrMN');
define('SECURE_AUTH_KEY',  'o|x.XLj,C+9[:-42n*FZu07N3UBf{h9mA[E?a:}6`bK9U$.8N(<]_Tz |u3xTM%t');
define('LOGGED_IN_KEY',    '@o*POde,r0c: Nx}^HS^G 6+QeN[<|d2-}dHHv%oIHxMu>DW1Qx_:j+aHW[ls8?_');
define('NONCE_KEY',        'H*P#SZnE}?H?W7H6=~M?4~`8/j0:Qj)X`6/^0@3(7uxr!.8ef#[~-c2ZtxAU];=|');
define('AUTH_SALT',        'i!(+b.yOlkeIfODWb%[_x1R,7}j,dfAAh>jS6)K4T@@BFGq]gX7P_-+*m=fk{j*3');
define('SECURE_AUTH_SALT', 'VzAP@5hlljTs$l68<XI@t-l6`c%`Z(Y+EN^a%8@->?CI+P@|9^tM^#tcE*[S%ghZ');
define('LOGGED_IN_SALT',   '4s`DdXA_dEO?WM+6@}eLn@sIAfh*[ky*/y83&Y?5!dOnn9/|@vu-^x49-#91]5mb');
define('NONCE_SALT',       'FT#q#fh)-X>]OkqWDH>(RJ;VASIz/2Ee 6r_@yzhg|Z=1,US!ThEmhkd1rV?o%N.');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
