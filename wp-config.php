<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'trident-mae-db' );

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

define('WP_MEMORY_LIMIT', '512M');

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
define( 'AUTH_KEY',         'cl[&&cH72b+qNP, ak<q@ie0g6ql0+aHSpox~saCMt*`eMfcT?YT%u[VPmjcefci' );
define( 'SECURE_AUTH_KEY',  'p_t.kbVteZGQ*8m!<S)2iXO3-Gv5^N=clHoG:xylqX9vlw(K2KC3mZD:iH06XBUa' );
define( 'LOGGED_IN_KEY',    '^f&Q?vxh4_D)PDu,#|aMq}^]5/nX=~=A(}OC;)L/n^jcyR3$?gfmvqE34WU9gmKZ' );
define( 'NONCE_KEY',        'TF`+yU?r<WKXf7u)MjOk9Ov)p49J7u3qWf&+RsHWMDc@`Y9R{AE8/W?ZNh8xy%Sb' );
define( 'AUTH_SALT',        '`I!<~W_tbVa>`)jZ_g`+G]S4%nR5j^Pf`,?-;9-Y?=#:[GLW_M[rRi2N<jtS2ZDg' );
define( 'SECURE_AUTH_SALT', 'R#oIraz5W}9Is@&`31:Q8y:+FBF9^Ekxw]rXehj*/3#p92(q@v)b`#FLJh)aM1)V' );
define( 'LOGGED_IN_SALT',   '(`l+QC1t`2r:$qR$eX>aV#yow)L.|6x3>a<COibVg?`KV8<#>%JR~bfw>+1w$%Z3' );
define( 'NONCE_SALT',       '~$aMpY^qi%!I:1y*,^:>37}F,C}iT`Gi_-V-sU_yCZ%1CRaXw},6rS?Y4P]_+Rad' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
