<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'blogitin_avalance');

/** MySQL database username */
define('DB_USER', 'blogitin_avalanc');

/** MySQL database password */
define('DB_PASSWORD', '[cVT#9+,9SE?');

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
define('AUTH_KEY',         'l8aqK|fjf+vIl_G0Q0]h|Ee)P2C=ap-HDm1n_-kMhYPa  Qp|A456?Yid]!l|but');
define('SECURE_AUTH_KEY',  'jBD/h3beq >SbbI),r%:Pq&!KQqC)#-W)m.MVOz]5Tp?W7dhyVm*2MyU^I]!s1 H');
define('LOGGED_IN_KEY',    'zxb>b)h,[P?[AX[PJ?i~4Xq[.aNd+?A9|8d6len-HyKv]QFhlv8b=F5-RTWgjg9_');
define('NONCE_KEY',        '0yN+qE:]Imh .bARitmiyggO`-2=~G(5$wqs=z7@RB1Kj#A-V1&C[>v~P!orKJ-t');
define('AUTH_SALT',        '_@~Gqy++v|{R+lZo@ 9r{Zlb[$ q6xl%fO%mGz|Has#>:F^~wE*e<O|qO!oe]Fb3');
define('SECURE_AUTH_SALT', 'Toa{SIg3{WsDHFJmyU,3Wmq<^BB(})3`<4i9AV%i=sj*bT<;`Zy$+CPfei_MjT+5');
define('LOGGED_IN_SALT',   's0jxZt(_[`AN&ug#dS1u`gmIfMEb96QvCr>fMk&8P0XG/n!jXc@?!AQNlX0PxihB');
define('NONCE_SALT',       'Q?o`nHd1qj7n[jQyRKK^|xb|XIkCdnEc37.>a1[w+UWA1v<A-]Pl;P&2Qu<B]#X/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
