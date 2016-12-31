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
define('DB_NAME', 'tonjoo');

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
define('AUTH_KEY',         '8WBAPxx&x]|!n(aN}*=xWPivT[].{=04x3/L//7t`bOZ/g1}MuX%FCvx>&J.+)Bk');
define('SECURE_AUTH_KEY',  '#~<&Pqz (.N6M7:NZ>dTu%0Rj+pCng>pp# ~zpu~ctz]CKm~wB)%MP?C0lQzJ.${');
define('LOGGED_IN_KEY',    'z@.]fPEKK(E.U[$p^S/woS[jUKt}1_cHlp/U&-]arj#;%bsD=.Z_O7*]PnlKam#_');
define('NONCE_KEY',        'Nr*}N:3YpY](Kb+M`s|^^(!PpxAlU+Zx00dy~&arDaYv/gHp{YXU26 htj.-g4/2');
define('AUTH_SALT',        'tN?s>52&ER2|cJ<qVnr^B[YPFo~cksn/&3cp39>6`8saM`4YkT(N0?l4*RMeE@vk');
define('SECURE_AUTH_SALT', '*7,07g4+!eE7dp#h7 dz+O^ :uX#9$Q+.A,[JZJhJLG!2M8[7BM_SOE- l/_w7TN');
define('LOGGED_IN_SALT',   '9*G*K9|?s3}Dbof0)+e>U&?39]*(`-/;%j-W >Tf Z&J g~U#lF:o?W$hjv!WkeS');
define('NONCE_SALT',       '+t$j,Y7HHM2%P5ln)Xr/C0JaA~,2 h^N@7KH8Owz(avzN;2jb_#+DciKN}nYgl7x');

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
