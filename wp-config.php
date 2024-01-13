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
 * @link    https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Project root path
$root = dirname(__DIR__);

// Composer autoloader
require_once $root.'/../vendor/autoload.php';

// dotenv
$dotenv = new Dotenv\Dotenv($root.'/../');
$dotenv->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_SERVER'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', getenv('SITE_URL'));
define('WP_SITEURL', getenv('SITE_URL').'/wordpress');

define('DISALLOW_FILE_EDIT', true);

define('WP_AUTO_UPDATE_CORE', true);

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K/-2L>:Fjd<D=-j*KrQJi.&i{ZN!8)#k[z5UtsTl++PfOjb83h;]66cU${,ixnPc');
define('SECURE_AUTH_KEY',  '54{OhGc8+zKB>m-RAN&%z?K(sVxL-uSd{-k+tvwM*~Qtvz:  I$.=K9&kp7!RjKA');
define('LOGGED_IN_KEY',    '%kkR0yrS8*9?KUD-Q=n-: 3VPNLn[OIBCU]x?iS ,+Px=SjGl1M&@Tpt=3F6K&=T');
define('NONCE_KEY',        '=PV#M-m*=s0&ms%Y(IT/{#5Gr<C)|bF~mG[0JTE6wE+~|,?%2m+HfAM}}oE-.DpQ');
define('AUTH_SALT',        '+DOQpB-U-ix9cl NlP_=!2{FVq /<kFqUmt2>. Vb8|dkv+ Y|*|`FI^[-7~eD+X');
define('SECURE_AUTH_SALT', '!mu-w?c@2$(-2hTs3~h^M{Xw%W{c{i<LybU|-|g`r,8iAUsf~B)8~xyEk*Ss(#y4');
define('LOGGED_IN_SALT',   '0V4Tt+F6Kb$R&8j8Jc5y5jI*n.thSK;7<j%ly*<V8;u?hNuA~ymSj;h`7,.6GoXQ');
define('NONCE_SALT',       '_N+ZSf+V__1:Q@(O-$p :B19K>@D!~|92N80?A7udh AR1Cnd#ODzXqh&~f+FT|1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('DB_TABLE_PREFIX');

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
define('WP_DEBUG', filter_var(getenv('DEV_MODE'), FILTER_VALIDATE_BOOLEAN));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__).'/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH.'wp-settings.php');
