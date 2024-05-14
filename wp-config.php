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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cubex' );

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
define( 'AUTH_KEY',         't4r)hT2h|acji;di0zOg>[>n)=1?y{M?I?`*T3R+>^mg~uCKpTalNn5E}r/M8)W+' );
define( 'SECURE_AUTH_KEY',  'gkq]`|*~/s%T#?i-n(Ks:rbfUPKtxXd&|@R0zcg#?&r&;T3,)tA1 nIeB4XOQpDd' );
define( 'LOGGED_IN_KEY',    '/{lt2MA%}nJMgFkqzma(W6vmL$doW=w{?j;agG@W I&9hha[Z&u0#-n@9wtP`_!5' );
define( 'NONCE_KEY',        'vZH9I3xC-vT*O$]OX54d^CcgomR,e6oN. v.zho_4*~h3jmm4A@CwPB,y/q,;U;I' );
define( 'AUTH_SALT',        'YdSG!?Yf$5C4F5;tSMeFv|e8!_3]^{~o)Fj[w#SZJ3Z<rBRep]tM_d8LqKI}K-9F' );
define( 'SECURE_AUTH_SALT', '1gW0%f)ySxV=uxU!dW6A7e7nTKl($o0Jk1.^~ml,Ls2|lBf`B=<q0==f936lBG#{' );
define( 'LOGGED_IN_SALT',   ' bXjqo1*8dBpuSGNZw?@vf>OuT`:n@}.3M&n+PU?CfQ@)^C`:@cXtI={iM8K5Cy+' );
define( 'NONCE_SALT',       'mztv${VRG8)_lR)]C*NR>2GX@V`9$]7cmH.=70A;40+Y3qY8N>DdhzfqSS-Um& B' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
