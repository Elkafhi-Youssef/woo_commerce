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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'P0w]u/b4m]B6iohB,4bF|LW&</HF%b%^Y`l9B+t(mg,1$n%ceGQ9pLTtKdh_Yy}A' );
define( 'SECURE_AUTH_KEY',  'x:S%rFSfIvY0>7o@.|Sq|~RfKGbQj7{-(#e)@EJ(eIVy`(Be%*(]F+.aj.[d?7`r' );
define( 'LOGGED_IN_KEY',    'o||w0t:)QU~-<WQ{+[8?Eyy!+A$YgoNyft+SV%E#i7i.Yu}5;kBvSYBf:vXZ5E]+' );
define( 'NONCE_KEY',        '7@{C*<JEC!a0LA&5UNKg/YT@>[oiP5pkshh`j[`>ZyBYw*YaWjfZzwiayT-qmMYH' );
define( 'AUTH_SALT',        'k4z- K)xzjr#p:>e F0`hGV4{qz)U*>1qz^Do4p@Y[(;>=BP}g?D/2ah]5uXc7?n' );
define( 'SECURE_AUTH_SALT', '+h>o}4*ir+SfWEoDEC[w!tQ5_gq2n/Wx^j.dzPW{e[[Vk{Bg{4Coos%ljhlr>X]-' );
define( 'LOGGED_IN_SALT',   '0%I7vPr**J( sa]Mq*?R;<*SdAJ&?f-gUQKn<.f(%OA`:;`x=zM~UzF%*/yJ2U#k' );
define( 'NONCE_SALT',       'BCVk#Z!8Cu6M0CUkx2{K&[&RA1(Mel}x]:dKa>g47^%Lm)Sb*m.-9Ey2H94/XH6]' );

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

//multisite
define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'localhost' );
define( 'PATH_CURRENT_SITE', '/wordpress/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
