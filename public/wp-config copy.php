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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Magic-Trucks' );

/** MySQL database username */
define( 'DB_USER', 'explorateur' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Ereul9Aeng' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         '$2y$10$4/WSgVeY.RTwcSBOQey.9erhqSrR6ANtTnPw.Wl4/ojIvdCsyoPTe' );
define( 'SECURE_AUTH_KEY',  '$2y$10$tc7AMQf2YMyHj42tJDoPau7cnWNILL3z2uJzH6h7CdQ3aAgJT09Om' );
define( 'LOGGED_IN_KEY',    '$2y$10$obJA6GeuVJVV3sr2TqtSF.dlqsTf6XmOeRRz3mkOxObMKZF.2L8VO' );
define( 'NONCE_KEY',        '$2y$10$HdeUJsP5OGLrekDt2sZbXOOhXOH1kGNlRghVAbSOHyGaZYk8jmNaO' );
define( 'AUTH_SALT',        '$2y$10$Au5PnuJh3dc4VKwx0d.SJ./.ZdqVsTo8lQG.urPSg6COdXNKk4Rte' );
define( 'SECURE_AUTH_SALT', '$2y$10$0LKPTOUo0MWe5D9Yf/t5aeponNPEhjORgtYMvfVNPtqoivYcbL74W' );
define( 'LOGGED_IN_SALT',   '$2y$10$p8Nqz3y22BP/N2X3Ds6GeeDCrXTLNMXgGBaYww6H3uQCUp5V31hh.' );
define( 'NONCE_SALT',       '$2y$10$E2IQpdFHl2mx.hqnfRDKeuwMVWugEBgCM2/HsGvAyBbf2A9iP00wa' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mt_';

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
define( 'WP_DEBUG', true );



define('WP_HOME', rtrim ( 'http://localhost/apotheose/magic-trucks/public', '/' ));
define('WP_SITEURL', WP_HOME . '/wp');
define('WP_CONTENT_URL', WP_HOME . '/content');
define('WP_CONTENT_DIR', __DIR__ . '/content');
define('FS_METHOD','direct');
/* That\'s all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
