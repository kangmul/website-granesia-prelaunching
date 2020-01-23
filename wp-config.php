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
define( 'DB_NAME', 'webgranesia' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'T)|y41#QlBv17-jL1?nGhm7BHlxwEk^}fv{Jt3o+RR,sb`y:qx/FwoJp]zdPN6~%' );
define( 'SECURE_AUTH_KEY',  'UM;5U~`NgxlFG]8Avmuy-)_*JE5VUWJqwZT,DP}VzVe5X-:n,h9k*FX6Uz+vyz}w' );
define( 'LOGGED_IN_KEY',    'B:LUec%6kM($2T7ol0|Y,kgiNms$0jw]mjyq:8:a:XjVINZ*-(6*X#?1dMU#<E9O' );
define( 'NONCE_KEY',        '}:<e,kF>2,@|~+KPf`b=K hSrU {UGBldC2,j@e>xB}x|_J^a<l`L:8S*0uq@(KD' );
define( 'AUTH_SALT',        'I^+%?+!KZ!Fz~72@Nn<#W|5WoC>2BZ}.v{g(Z/=mup^TE;kLQ9BunV8goY.n+:-&' );
define( 'SECURE_AUTH_SALT', 'Lc:yj_geZy2iICm&s3M^J=7w??y}I>wN/ZfsY7>Tn2`:Z0lcE}$]2@`QqK=eRvro' );
define( 'LOGGED_IN_SALT',   'TC(7[VR7DSAO]c*_HnN*G6Hk70?Q0)P6ag@beDDojj8}`DiXOntg]tr|Emcjzzqw' );
define( 'NONCE_SALT',       'dxG(vBg8,M4f$z:DLr|dlpmw3N#NTiGaGo.X(<_`vxySCqwe?dYOv5)/B^!9JRI{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
