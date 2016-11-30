<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'db_vchurch');

/** MySQL database username */
define('DB_USER', 'usr_loveworldnet');

/** MySQL database password */
define('DB_PASSWORD', 'lvnet92');

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
define('AUTH_KEY',         '5y1P|vzGTFI{Pj>&ua],i(z/Uwy}@7t@`GAjW{xRffyWl-6!_aBo^PYjCJfTfYtb');
define('SECURE_AUTH_KEY',  '|}e7}<)B-W68-WcY#V|o}3dq;<R!6cT|VU@*,f#|zL[u&c,$Iv=U-x5/&9u4!/Fv');
define('LOGGED_IN_KEY',    'v5~O=~a*ImUZ_(s#S)^j>_O;efFB|72+F>{XPU6TeiEM:W4No%0a_uU#9-XbF+b&');
define('NONCE_KEY',        'cf+t=0Z>$Po}XK7lM}Pe]S1k|tVq|i>I$CFV}7BJWWw}0K43A2&lT|+Fy19YmC9>');
define('AUTH_SALT',        'R&^],(=J~k8t3P--Y^%Hz)TAvIBSO|zB]:)m:hCv=1_j&0S`@DIyO36.2BM[WRh7');
define('SECURE_AUTH_SALT', '.zDNJ^6Y +fZ>nvRn^ d*Wi01c(QYmd,>0VbJpq>>n;u:ejoM:_xcqlkb|7;Qax}');
define('LOGGED_IN_SALT',   'ZN2=|+4I3O-}xKd:)bS:/oO uA3x8u1[L*5OKe+)rE`.V,^|=R7}>d;85zN+C{&X');
define('NONCE_SALT',       '%ym,NJj3uaR{P;C|1y6vB-*`NWP|h-8xF{~M_m0hfx[x[eQ]OHIcj4tVHA}||FUz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp2_';

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
