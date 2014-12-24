<?php

/* 
 * This file is part of the hyyan/gwp package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * DB settings
 */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ? getenv('DB_PREFIX') : 'gwp_';

/**
 * Authentication Unique Keys and Salts
 * 
 * Change these to different unique phrases!
 * You can generate these using the 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', true);
define('DISALLOW_FILE_EDIT', true);