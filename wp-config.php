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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LkT9vQkz2rwqcDSRp9s00QweMqyfGedrQYOzwK/2z90ml+OQHTAO0N0VjE3mLWapjc/AL1wW+sPI5ZvGP9B1Dw==');
define('SECURE_AUTH_KEY',  's9e7C6PMbikf0Y7wVvikCgJHE8It2z1DuRrR/hSpuAAQMASmN9CIzmS7xCD0sOa3Ju6SX7YPkzisAYUHmN5LmQ==');
define('LOGGED_IN_KEY',    '9LlRKNCk9huBGOI8OYGVET/lTFmiwoSSzMJkhFOCMgV9qO1HMdJp696XOArBgyamBJyiIXtzjv+kYXMHMYkyhg==');
define('NONCE_KEY',        '1MDzPlt+2ytNRyUYaiL7+c+DdsKL+9VLv274t9IKa1oZk0m+Nig7xMDjfN+KITB+lfJRf/n4AUluDIgZzqArEA==');
define('AUTH_SALT',        'e5BQlCSa8Sk/b74JQc6gIVUNckZcDbQFHGfsLL9S2wVdjiXOpA58ITCbydvkvGwlZfbPyAPtYrE63fCrBqtFtA==');
define('SECURE_AUTH_SALT', 'p6fNXFYF7aSOk+8nLMlim1Vx4VYGe18atQffw83LhZExIk/Jy944hKPG7TiH1g/tHY8BMD9eBckfb3q+tsZC5A==');
define('LOGGED_IN_SALT',   'k1FdivMXcfFXrveq0+walcfSHuS1MjCobCUhEia+0WtwFzcK4kYdSfRn7mlowSBA59U09G4jCXuLuVU0dngL/w==');
define('NONCE_SALT',       'FZB5RQuUwSpJpQU+/6ojDsXzp9ttxMAwtTGCldsZAam6X3jKRO8PV7n2bABfpMgaxH5b3/nGmc4xG1xRpn+hEw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
