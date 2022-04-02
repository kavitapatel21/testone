<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testone' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'JoTzYqBWb`/V-9|w7?PFaw?n~JelNvUpA[HdYq~=Jj_8RR[,oJUTi=Y&,k+es0I%' );
define( 'SECURE_AUTH_KEY',  '5$M2R-FIvTOO9FETwF/vW~$lv[u$Mki3R{r4A&(9UXr.Jxe(dncqPa`vtTYc1FM&' );
define( 'LOGGED_IN_KEY',    '[ -#=/cx.)WQTP!Mh_&qD{j@#XJ]m6{bi=Q5hET2?SD<|muf}^2![loaqF+yTgtY' );
define( 'NONCE_KEY',        '*E7i)C7d_r[9_?DQ]$%KF(I6_[=}WgQrbH$0hZM/J?Qs>OIIp~VhlO|kxa=Ghu*q' );
define( 'AUTH_SALT',        'hA0rIt*azq#sSsYo!=nGRM}sGyPBcq9HC}4Zpns%|L[elPXj?WgmT3rofilEL=G{' );
define( 'SECURE_AUTH_SALT', '5q=b%dlfq3y%nN,W<UjBj# >$]0)y$jAfo}qfL:Hn)TG]k6GI4FC&yI|_ITa>Iz<' );
define( 'LOGGED_IN_SALT',   'Z7xW`JVj<fB[lK+nai*@#>F<Qtb:}[LtL_,>L]yF-H]uCk8!n*k4c:~]!A?nwf#?' );
define( 'NONCE_SALT',       'bTw2l52f#/@E07;&==>zHHqF9y8$+C|XoP{Md;3Kgyfr6}JmhpmWr88TEn~TeDV?' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
