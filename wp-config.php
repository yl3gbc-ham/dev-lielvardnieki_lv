<?php
define( 'WP_CACHE', true );
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
define('DB_NAME', 'yl3gbc_dev2');

/** MySQL database username */
define('DB_USER', 'yl3gbc_dev2');

/** MySQL database password */
define('DB_PASSWORD', 'Uq3gbcuq3gbc!');

/** MySQL hostname */
define('DB_HOST', '195.3.145.15');

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
define('AUTH_KEY',         'NpPDto9v%HVm|b)|Piif2txmBFA[|`V@DuiOjrUeD42Cs_hn m:q/H~:$8iT:nY<');
define('SECURE_AUTH_KEY',  'MXI/DnD:Lx:Cg9[[vfOT/qijf#QWy8;jE,Nhl3sbk`]($MNNDd),>_>H$)IaB2+U');
define('LOGGED_IN_KEY',    '8+43LV5EC&J&nd9N>|suC`vm0qd;} 6+R%G_.,}<fr|`ilvMc5G0X.=`F|LXJaR&');
define('NONCE_KEY',        '+~jW7mY`ZXy.B91IUzs|xz-0k&5:[uv::AhTIoNpB_rM&G#)yLjIuoV~.-HUx_2}');
define('AUTH_SALT',        'C4{hPZmT)gy[9^fWJ0NSf>Un.4cLPHr%m!2A1X=.DtS/;Vta_%[d?~?Z4ir<^RSb');
define('SECURE_AUTH_SALT', 'IJ;.vCHcT~?q9-lxxY,/p`Nc.n?WGZ(>&?.dt rQ}Yo>s<cCCu[aC_(.pB=+ym-#');
define('LOGGED_IN_SALT',   '`M4Av9Qw^kiij+n?8umC3nA>-(7w(:EO^MJq@a^>&p?qv.Y|c=6{?tdjw]>=njDg');
define('NONCE_SALT',       'zogFJC#_/~@rbKB?>z)-+pmY;d_% rTm-V&M>=Y}$HB|-47h6&BmD)/+tf.w}NJr');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'prov_12';

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
