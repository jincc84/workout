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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'eowjstkdghl');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'Qj`cBu+H[}@f3z9/q~+nE#BK~1lz`v.-#/pii<Z[6($l&eEc9(,y) If-/NY h`S');
define('SECURE_AUTH_KEY',  '?GCB#wgBxM k<oC?C>ep{wRI)gr50%42QVIb1M[4y)YA`~D^sy{} !}+PyTuB =[');
define('LOGGED_IN_KEY',    'f3BJcDAy}9s.AYrZrG}C;H`NsFdxEw:b:dqtgg7FD;oObHJp(!N!-W>slEtREy|`');
define('NONCE_KEY',        'xu9aqXhm,h4#ACWSAb>HXLzt(v?{~$,=<u>#1{-|-z>O/So24n]UEUxrTl_!s1GA');
define('AUTH_SALT',        '{fjmrM+R*eDb5-#EOz^<qx;+;L~T?S4D@c4o0fhH,!+IW6`WVLCM$&?W==g]7+^2');
define('SECURE_AUTH_SALT', '7 {Jp-j@}2@IgVcHXB=:7J`*%jjLf8N-^W.V|+7+Z)[#ZfGFxFW~ubaz|oF8YCM-');
define('LOGGED_IN_SALT',   'I,q-Rcs3OKu<as,&Z{ue5F}bA!$pQgqU[MN9%]MprIL)g&/dG/ ^Oe7ca^`m`3@k');
define('NONCE_SALT',       'ql-b8BoFa.IX1,;tGz~e3UYDi)GJU/lv?~(V5mO}*8]v:O:T_b*f9nHqK_2>h/^-');

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
//define('WPLANG', 'ko_KR');

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
