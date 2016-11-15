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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'Password_123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uzhf}jvHSO>vs4C@r#+*|o~=}[-CPcF@V*GaM-sKXpdl~e`8NclI&Z(#SN<30QvH');
define('SECURE_AUTH_KEY',  'q#a>pj?(,x6nua`$!U:#$i@6jnAG1uon;/+@i2~:*lIjJ-<+MB=G-bD@nR~c;r]L');
define('LOGGED_IN_KEY',    'oMaCrB~,~h~@x)$/5-M2_ag4!h(wlTK@9X^BN*n;kerW u4Mc6hmh(//z+BoQ.A_');
define('NONCE_KEY',        '[6*=kxYdz|CYb ~ER4aoYIp]qA)x?egx3Ob@=&Y37-y;eseK<3B<&IMtO]K1}?k3');
define('AUTH_SALT',        '_-Fa81kHo:GQ.~| {p+XEfUo-u[Si{`fI>e9SqsxvF9PT_}MW^v+q;C>jD^!}?9V');
define('SECURE_AUTH_SALT', 'P`Ek-oB|m!NPPkSs3xOB]eUpvdTa+|Y~<+!$8>n(cU03txD^^t0_`sx^ymo2=e]9');
define('LOGGED_IN_SALT',   '[-(bv<+#HgkTG{pBt$N7*41WSeF!OVE=&eG;4UzU`2Hvr#yN3/PuMm:-7dzV%c|x');
define('NONCE_SALT',       '+7(?zU+msw0IQ1mqkZq(-4 73.TN|Uaf@>C)D1B4R[,[K0n0|9H-klS,2=sk+*?+');


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
